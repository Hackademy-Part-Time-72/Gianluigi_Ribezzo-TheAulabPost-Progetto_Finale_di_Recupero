<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold fs-2 text-brand" href="{{ route('homepage') }}">
            The Aulab Post
        </a>
        
        <div class="d-flex align-items-center d-lg-none">
            <div id="themeToggleMobile" class="theme-toggle-btn me-2">
                <i class="bi bi-sun-fill text-warning d-none" id="themeIconSunMobile"></i>
                <i class="bi bi-moon-stars-fill text-primary" id="themeIconMoonMobile"></i>
                <span class="theme-tooltip" id="themeTooltipMobile"></span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('article.index') }}">Tutti gli articoli</a>
                </li>
                @auth
                    @if(!Auth::user()->is_admin && !Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ route('careers') }}">Lavora con noi</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="{{ route('careers') }}">Lavora con noi</a>
                    </li>
                @endauth
            </ul>
            
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center flex-lg-row">
                @auth
                    @if(Auth::user()->is_writer)
                    <li class="nav-item me-lg-3">
                        <a href="{{ route('article.create') }}" class="btn btn-brand btn-sm px-3">
                            <i class="bi bi-plus-circle me-1"></i> Pubblica articolo
                        </a>
                    </li>
                    @endif
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('register') }}" class="btn btn-brand btn-sm px-3 text-nowrap">Registrati</a>
                    </li>
                @else
                    {{-- Desktop: dropdown --}}
                    <li class="nav-item dropdown d-none d-lg-flex align-items-center">
                        <a class="nav-link dropdown-toggle fw-medium text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                            @if(Auth::user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="bi bi-shield-lock me-2"></i>Dashboard Admin</a></li>
                            @elseif(Auth::user()->is_revisor)
                                <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}"><i class="bi bi-eye me-2"></i>Dashboard Revisore</a></li>
                            @elseif(Auth::user()->is_writer)
                                <li><a class="dropdown-item" href="{{ route('writer.dashboard') }}"><i class="bi bi-pencil-square me-2"></i>La mia Dashboard</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Esci
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Mobile: voci inline --}}
                    <li class="d-lg-none mt-1">
                        <hr class="opacity-25 my-1">
                        <span class="navbar-text fw-semibold text-capitalize">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </span>
                    </li>
                    @if(Auth::user()->is_admin)
                        <li class="nav-item d-lg-none">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-shield-lock me-2"></i>Dashboard Admin</a>
                        </li>
                    @elseif(Auth::user()->is_revisor)
                        <li class="nav-item d-lg-none">
                            <a class="nav-link" href="{{ route('revisor.dashboard') }}"><i class="bi bi-eye me-2"></i>Dashboard Revisore</a>
                        </li>
                    @elseif(Auth::user()->is_writer)
                        <li class="nav-item d-lg-none">
                            <a class="nav-link" href="{{ route('writer.dashboard') }}"><i class="bi bi-pencil-square me-2"></i>La mia Dashboard</a>
                        </li>
                    @endif
                    <li class="nav-item d-lg-none">
                        <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right me-2"></i>Esci
                        </a>
                    </li>
                @endguest
            </ul>
            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth

            <div class="d-none d-lg-flex align-items-center ms-lg-3">
                <div id="themeToggle" class="theme-toggle-btn">
                    <i class="bi bi-sun-fill text-warning d-none" id="themeIconSun"></i>
                    <i class="bi bi-moon-stars-fill text-primary" id="themeIconMoon"></i>
                    <span class="theme-tooltip" id="themeTooltip"></span>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    .theme-toggle-btn {
        position: relative;
        cursor: pointer;
    }
    .theme-tooltip {
        position: absolute;
        top: calc(100% + 10px);
        left: 50%;
        transform: translateX(-50%);
        background: var(--bs-body-bg);
        border: 1px solid var(--bs-border-color);
        color: var(--bs-body-color);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.72rem;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,.15);
        z-index: 9999;
    }
    .theme-tooltip::after {
        content: '';
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        border: 5px solid transparent;
        border-bottom-color: var(--bs-border-color);
    }
    .theme-toggle-btn:hover .theme-tooltip {
        opacity: 1;
    }
</style>

<script>
    let getStoredTheme = () => localStorage.getItem('theme')
    let setStoredTheme = theme => localStorage.setItem('theme', theme)
    let getPreferredTheme = () => {
        let storedTheme = getStoredTheme()
        if (storedTheme) return storedTheme
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
    }

    let updateTooltips = theme => {
        const label = theme === 'dark' ? 'Passa alla modalità chiara' : 'Passa alla modalità scura'
        document.querySelectorAll('.theme-tooltip').forEach(el => el.textContent = label)
    }

    let setTheme = theme => {
        document.documentElement.setAttribute('data-bs-theme', theme)
        updateThemeIcons(theme)
        updateTooltips(theme)
    }

    let updateThemeIcons = theme => {
        let suns = [document.getElementById('themeIconSun'), document.getElementById('themeIconSunMobile')]
        let moons = [document.getElementById('themeIconMoon'), document.getElementById('themeIconMoonMobile')]
        
        if (theme === 'dark') {
            suns.forEach(s => s?.classList.remove('d-none'))
            moons.forEach(m => m?.classList.add('d-none'))
        } else {
            suns.forEach(s => s?.classList.add('d-none'))
            moons.forEach(m => m?.classList.remove('d-none'))
        }
    }

    let currentTheme = getPreferredTheme()
    setTheme(currentTheme)

    let toggleTheme = () => {
        let activeTheme = document.documentElement.getAttribute('data-bs-theme')
        let newTheme = activeTheme === 'dark' ? 'light' : 'dark'
        setStoredTheme(newTheme)
        setTheme(newTheme)
    }

    document.getElementById('themeToggle')?.addEventListener('click', toggleTheme)
    document.getElementById('themeToggleMobile')?.addEventListener('click', toggleTheme)


    // Chiudi navbar allo scroll (solo se lo scroll supera 40px dal punto di apertura)
    let scrollYOnOpen = null;
    let navbarCollapse = document.getElementById('navbarSupportedContent');

    navbarCollapse.addEventListener('show.bs.collapse', () => {
        scrollYOnOpen = window.scrollY;
    });
    navbarCollapse.addEventListener('hide.bs.collapse', () => {
        scrollYOnOpen = null;
    });

    window.addEventListener('scroll', () => {
        if (scrollYOnOpen === null) return;
        if (Math.abs(window.scrollY - scrollYOnOpen) > 40) {
            document.querySelector('.navbar-toggler').click();
        }
    });
</script>
