<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Str;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show', 'byCategory', 'byUser', 'search']),
            new Middleware('userIsWriter', only: ['create', 'store', 'edit', 'update', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 12);
        $search = $request->input('search');
        $categoryId = $request->input('category');

        $query = Article::where('is_accepted', true);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('subtitle', 'LIKE', "%{$search}%")
                  ->orWhere('body', 'LIKE', "%{$search}%")
                  ->orWhereHas('tags', fn($q) => $q->where('name', 'LIKE', "%{$search}%"))
                  ->orWhereHas('user', fn($q) => $q->where('first_name', 'LIKE', "%{$search}%")
                      ->orWhere('last_name', 'LIKE', "%{$search}%")
                      ->orWhere('username', 'LIKE', "%{$search}%"));
            });
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $articles = $query->orderBy('created_at', 'desc')->paginate($perPage)->withQueryString();
        $categories = Category::orderBy('name')->get();
        return view('article.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::orderBy('name')->get();
        return view('article.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|min:5|unique:articles',
            'subtitle' => 'required|min:5',
            'body'     => 'required|min:10',
            'image'    => 'image',
            'category' => 'required',
        ]);

        $article = Article::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'subtitle'    => $request->subtitle,
            'body'        => $request->body,
            'category_id' => $request->category,
            'user_id'     => Auth::user()->id,
            'is_accepted' => null, // in attesa di revisione
        ]);

        if ($request->hasFile('image')) {
            $article->update([
                'image' => $request->file('image')->store('articles', 'public'),
            ]);
        }

        $article->tags()->sync($request->input('tags', []));

        return redirect(route('homepage'))->with('message', 'Articolo inviato per la revisione');
    }

    public function show(Article $article)
    {
        if (!$article->is_accepted && !(Auth::check() && (Auth::user()->is_admin || Auth::user()->is_revisor || Auth::user()->id === $article->user_id))) {
            abort(404);
        }
        return view('article.show', compact('article'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-category', compact('articles', 'category'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query', '');
        if (!$query) {
            return redirect(route('article.index'));
        }
        $articles = Article::where('is_accepted', true)
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('subtitle', 'LIKE', "%{$query}%")
                  ->orWhere('body', 'LIKE', "%{$query}%")
                  ->orWhereHas('tags', fn($q) => $q->where('name', 'LIKE', "%{$query}%"));
            })
            ->orderBy('created_at', 'desc')
            ->get();
        return view('article.search-index', compact('articles', 'query'));
    }

    public function byUser(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-user', compact('articles', 'user'));
    }

    public function edit(Article $article)
    {
        if (Auth::user()->id !== $article->user_id) {
            return redirect(route('homepage'))->with('error', 'Non sei autorizzato a modificare questo articolo.');
        }
        if ($article->is_accepted === null) {
            return redirect(route('writer.dashboard'))->with('error', 'Non puoi modificare un articolo in attesa di revisione.');
        }
        $categories = Category::all();
        $tags = Tag::orderBy('name')->get();
        return view('article.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        if (Auth::user()->id !== $article->user_id) {
            return redirect(route('homepage'))->with('error', 'Non sei autorizzato a modificare questo articolo.');
        }
        if ($article->is_accepted === null) {
            return redirect(route('writer.dashboard'))->with('error', 'Non puoi modificare un articolo in attesa di revisione.');
        }

        $request->validate([
            'title'    => 'required|min:5|unique:articles,title,' . $article->id,
            'subtitle' => 'required|min:5',
            'body'     => 'required|min:10',
            'image'    => 'image',
            'category' => 'required',
        ]);

        $article->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'subtitle'    => $request->subtitle,
            'body'        => $request->body,
            'category_id' => $request->category,
            'is_accepted' => null,
            'revisor_id'  => null,
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $article->update([
                'image' => $request->file('image')->store('articles', 'public'),
            ]);
        }

        $article->tags()->sync($request->input('tags', []));

        return redirect(route('writer.dashboard'))->with('message', 'Articolo aggiornato e rimandato in revisione.');
    }

    public function destroy(Article $article)
    {
        if (Auth::user()->id !== $article->user_id) {
            return redirect(route('homepage'))->with('error', 'Non sei autorizzato a eliminare questo articolo.');
        }

        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect(route('writer.dashboard'))->with('message', 'Articolo eliminato con successo.');
    }
}
