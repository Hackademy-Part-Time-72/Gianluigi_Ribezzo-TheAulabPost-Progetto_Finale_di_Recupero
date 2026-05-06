<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequests   = User::where('role', 'requested_admin')->get();
        $revisorRequests = User::where('role', 'requested_revisor')->get();
        $writerRequests  = User::where('role', 'requested_writer')->get();
        $tags            = Tag::orderBy('name')->get();
        $categories      = Category::orderBy('name')->get();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests', 'tags', 'categories'));
    }

    public function approveAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', 'Utente promosso ad Amministratore.');
    }

    public function approveRevisor(User $user)
    {
        $user->role = 'revisor';
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', 'Utente promosso a Revisore.');
    }

    public function approveWriter(User $user)
    {
        $user->role = 'writer';
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', 'Utente promosso a Redattore.');
    }

    public function storeTag(Request $request)
    {
        $request->validate(['name' => 'required|string|max:50|unique:tags,name']);
        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Tag creato con successo.');
    }

    public function destroyTag(Tag $tag)
    {
        $tag->delete();
        return redirect(route('admin.dashboard'))->with('message', 'Tag eliminato.');
    }

    public function destroyCategory(Category $category)
    {
        if ($category->articles()->count() > 0) {
            return redirect(route('admin.dashboard'))->with('error', 'Impossibile eliminare una categoria con articoli associati.');
        }
        $category->delete();
        return redirect(route('admin.dashboard'))->with('message', 'Categoria eliminata.');
    }
}
