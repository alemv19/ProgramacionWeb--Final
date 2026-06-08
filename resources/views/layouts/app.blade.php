<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Glow & Style' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    *, *::before, *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --verde:       #5d7a63;
        --verde-dark:  #4c6a52;
        --verde-light: #dceee0;

        --rosa:        #c98f8f;
        --rosa-dark:   #b57b7b;

        --beige:       #f2e5da;
        --beige-soft:  #faf6f2;
        --beige-border:#e7ddd4;

        --texto:       #4f4a45;
        --texto-sub:   #8f8a84;

        --blanco:      #ffffff;

        --radio:       14px;
        --sombra:      0 4px 15px rgba(93,122,99,.10);
    }

    body {
        font-family: 'Nunito', sans-serif;
        background: var(--beige);
        color: var(--texto);
        min-height: 100vh;
    }

    /* ── NAVBAR ───────────────────────────── */

    .navbar {
        background: var(--verde);
        padding: 0 24px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 3px 12px rgba(0,0,0,.10);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
    }

    .navbar-brand .logo-icon {
        width: 40px;
        height: 40px;
        background: var(--rosa);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 18px;
    }

    .navbar-brand .brand-text {
        color: #fff;
        font-weight: 800;
        font-size: 18px;
        line-height: 1.1;
    }

    .navbar-brand .brand-sub {
        color: rgba(255,255,255,.70);
        font-size: 11px;
    }

    /* ── BUSCADOR ─────────────────────────── */

    .navbar-search {
        flex: 1;
        max-width: 420px;
        margin: 0 24px;
    }

    .navbar-search form {
        display: flex;
        background: rgba(255,255,255,.15);
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,.20);
    }

    .navbar-search input {
        flex: 1;
        background: transparent;
        border: none;
        padding: 10px 14px;
        color: #fff;
        font-size: 13px;
        font-family: 'Nunito', sans-serif;
        outline: none;
    }

    .navbar-search input::placeholder {
        color: rgba(255,255,255,.60);
    }

    .navbar-search button {
        background: none;
        border: none;
        padding: 0 14px;
        color: rgba(255,255,255,.75);
        cursor: pointer;
        font-size: 14px;
    }

    .navbar-search button:hover {
        color: #fff;
    }

    /* ── BOTONES NAV ───────────────────────── */

    .navbar-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .nav-btn {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 9px 14px;
        border-radius: 12px;
        color: rgba(255,255,255,.90);
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: .25s;
        background: transparent;
        border: none;
        cursor: pointer;
        font-family: 'Nunito', sans-serif;
    }

    .nav-btn:hover {
        background: rgba(255,255,255,.12);
    }

    .nav-btn.active {
        background: rgba(255,255,255,.15);
    }

    .nav-btn .badge {
        background: var(--rosa);
        color: #fff;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .nav-btn-primary {
        background: var(--rosa);
        color: #fff !important;
    }

    .nav-btn-primary:hover {
        background: var(--rosa-dark) !important;
    }

    /* ── SIDEBAR ───────────────────────────── */

    .layout-admin {
        display: flex;
        min-height: calc(100vh - 70px);
    }

    .sidebar {
        width: 240px;
        background: var(--verde);
        padding: 20px 12px;
        flex-shrink: 0;
    }

    .sidebar-section {
        font-size: 10px;
        font-weight: 700;
        color: rgba(255,255,255,.55);
        letter-spacing: .08em;
        text-transform: uppercase;
        padding: 0 10px;
        margin: 16px 0 8px;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 11px 14px;
        border-radius: 12px;
        color: rgba(255,255,255,.80);
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: .25s;
    }

    .sidebar-link:hover {
        background: rgba(255,255,255,.12);
        color: #fff;
    }

    .sidebar-link.active {
        background: var(--rosa);
        color: #fff;
    }

    .sidebar-link i {
        width: 16px;
        text-align: center;
    }

    /* ── CONTENIDO ─────────────────────────── */

    .main-content {
        flex: 1;
        padding: 30px;
        overflow-x: auto;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    /* ── ALERTAS ───────────────────────────── */

    .alert {
        padding: 14px 18px;
        border-radius: 14px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-success {
        background: #dceee0;
        color: var(--verde-dark);
        border-left: 4px solid var(--verde);
    }

    .alert-error {
        background: #fde2e2;
        color: #b04a4a;
        border-left: 4px solid #d9534f;
    }

    .alert-warning {
        background: #f7efe2;
        color: #b58c57;
        border-left: 4px solid #d4a95a;
    }

    /* ── FOOTER ────────────────────────────── */

    footer {
        background: var(--verde);
        color: rgba(255,255,255,.70);
        text-align: center;
        padding: 18px;
        font-size: 12px;
        margin-top: auto;
    }
</style>
    @stack('styles')
</head>
<body>

{{-- NAVBAR solo si el usuario está autenticado --}}
@auth
<nav class="navbar">
    {{-- Marca --}}
    <a href="{{ auth()->user()->rol === 'admin' ? route('admin.dashboard') : route('catalogo') }}" class="navbar-brand">
        <div class="logo-icon"><i class="fas fa-store"></i></div>
        <div>
            <div class="brand-text">Glow & Style</div>
            <div class="brand-sub">Resalta lo mejor de ti, porque te lo mereces</div>
        </div>
    </a>

    {{-- Buscador (solo para clientes) --}}
    @if(auth()->user()->rol !== 'admin')
    <div class="navbar-search">
        <form action="{{ route('catalogo') }}" method="GET">
            <input type="text" name="buscar" placeholder="Buscar productos..." value="{{ request('buscar') }}">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    @endif

    {{-- Acciones --}}
    <div class="navbar-actions">
        @if(auth()->user()->rol === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="nav-btn {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>
            <a href="{{ route('admin.productos.index') }}" class="nav-btn {{ request()->routeIs('admin.productos*') ? 'active' : '' }}">
                <i class="fas fa-boxes"></i> Productos
            </a>
            <a href="{{ route('admin.reportes') }}" class="nav-btn {{ request()->routeIs('admin.reportes') ? 'active' : '' }}">
                <i class="fas fa-file-chart-line"></i> Reportes
            </a>
        @else
            <a href="{{ route('catalogo') }}" class="nav-btn {{ request()->routeIs('catalogo') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Inicio
            </a>
            <a href="{{ route('perfil') }}" class="nav-btn {{ request()->routeIs('perfil') ? 'active' : '' }}">
                <i class="fas fa-user"></i> {{ auth()->user()->name }}
            </a>
            <a href="{{ route('carrito') }}" class="nav-btn {{ request()->routeIs('carrito') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart"></i> Carrito
            </a>
        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-btn nav-btn-primary">
                <i class="fas fa-sign-out-alt"></i> Salir
            </button>
        </form>
    </div>
</nav>
@endauth

{{-- Alertas globales --}}
@if(session('success'))
    <div style="max-width:1200px;margin:16px auto;padding:0 20px">
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
    </div>
@endif
@if(session('error'))
    <div style="max-width:1200px;margin:16px auto;padding:0 20px">
        <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
    </div>
@endif

{{-- Contenido principal --}}
@yield('content')

<footer>
    &copy; {{ date('Y') }} Glow & Style &mdash; Sistema de Gestión
</footer>

@stack('scripts')
</body>
</html>