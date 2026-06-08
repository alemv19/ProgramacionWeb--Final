<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña — Glow & Style</title>
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
        --verde:       #7a9e7e;
        --verde-dark:  #5f7f63;
        --verde-soft:  #dce8dd;
        --fondo:       #f2e5da;
        --borde:       #cfdccf;
        --texto:       #3f4d42;
        --texto-sub:   #6f7d72;
    }

    body {
        font-family: 'Nunito', sans-serif;
        background: var(--fondo);
        min-height: 100vh;
        display: flex;
        align-items: stretch;
    }

    .panel-left {
        width: 45%;
        background: linear-gradient(135deg, #7a9e7e, #5f7f63);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 48px;
        position: relative;
        overflow: hidden;
    }

    .panel-left::before {
        content: '';
        position: absolute;
        top: -80px;
        right: -80px;
        width: 320px;
        height: 320px;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
    }

    .panel-left::after {
        content: '';
        position: absolute;
        bottom: -60px;
        left: -60px;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: rgba(255,255,255,.05);
    }

    .panel-left .logo {
        width: 72px;
        height: 72px;
        background: #ffffff;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: var(--verde);
        margin-bottom: 24px;
        position: relative;
        z-index: 1;
        box-shadow: 0 8px 20px rgba(0,0,0,.08);
    }

    .panel-left h1 {
        color: #fff;
        font-size: 28px;
        font-weight: 800;
        text-align: center;
        position: relative;
        z-index: 1;
        margin-bottom: 10px;
    }

    .panel-left p {
        color: rgba(255,255,255,.85);
        font-size: 14px;
        text-align: center;
        position: relative;
        z-index: 1;
        line-height: 1.7;
        max-width: 280px;
    }

    .feature-list {
        margin-top: 36px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        position: relative;
        z-index: 1;
        width: 100%;
        max-width: 300px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
        color: rgba(255,255,255,.9);
        font-size: 13px;
        font-weight: 600;
    }

    .feature-item .fi-icon {
        width: 32px;
        height: 32px;
        background: rgba(255,255,255,.15);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 13px;
        flex-shrink: 0;
    }

    .panel-right {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px 32px;
    }

    .form-card {
        width: 100%;
        max-width: 420px;
        background: #ffffff;
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,.06);
    }

    .form-card h2 {
        font-size: 24px;
        font-weight: 800;
        color: var(--verde-dark);
        margin-bottom: 6px;
    }

    .form-card .subtitle {
        font-size: 14px;
        color: var(--texto-sub);
        margin-bottom: 32px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: var(--texto);
        margin-bottom: 6px;
    }

    .input-wrap {
        position: relative;
    }

    .input-wrap i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--verde);
        font-size: 14px;
    }

    .input-wrap input {
        width: 100%;
        padding: 11px 14px 11px 40px;
        border: 1.5px solid var(--borde);
        border-radius: 10px;
        font-size: 14px;
        font-family: 'Nunito', sans-serif;
        color: var(--texto);
        background: #fff;
        outline: none;
        transition: all .2s;
    }

    .input-wrap input:focus {
        border-color: var(--verde);
        box-shadow: 0 0 0 4px rgba(122,158,126,.15);
    }

    .input-wrap input.is-invalid {
        border-color: #ef4444;
    }

    .error-msg {
        font-size: 12px;
        color: #ef4444;
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .btn-submit {
        width: 100%;
        padding: 13px;
        background: var(--verde);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;
        font-family: 'Nunito', sans-serif;
        cursor: pointer;
        transition: all .2s;
        margin-top: 8px;
    }

    .btn-submit:hover {
        background: var(--verde-dark);
    }

    .btn-submit:active {
        transform: scale(.98);
    }

    .form-footer {
        text-align: center;
        margin-top: 22px;
        font-size: 14px;
        color: var(--texto-sub);
    }

    .form-footer a {
        color: var(--verde);
        font-weight: 700;
        text-decoration: none;
    }

    .form-footer a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .panel-left {
            display: none;
        }
    }
</style>
</head>
<body>

<div class="panel-left">
    <div class="logo"><i class="fas fa-store"></i></div>
    <h1>Glow & Style</h1>
    <p>Resalta lo mejor de ti, porque te lo mereces</p>
    <div class="feature-list">
        <div class="feature-item">
            <div class="fi-icon"><i class="fas fa-key"></i></div>
            Crea una nueva contraseña segura
        </div>
        <div class="feature-item">
            <div class="fi-icon"><i class="fas fa-lock"></i></div>
            Mínimo 8 caracteres
        </div>
        <div class="feature-item">
            <div class="fi-icon"><i class="fas fa-shield-alt"></i></div>
            Sistema seguro y confiable
        </div>
    </div>
</div>

<div class="panel-right">
    <div class="form-card">
        <h2>Restablecer contraseña</h2>
        <p class="subtitle">Ingresa tu nueva contraseña para recuperar el acceso a tu cuenta.</p>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <div class="input-wrap">
                    <i class="fas fa-envelope"></i>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="correo@ejemplo.com"
                        value="{{ old('email', $request->email) }}"
                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                        autocomplete="email"
                    >
                </div>
                @error('email')
                    <div class="error-msg"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Nueva contraseña</label>
                <div class="input-wrap">
                    <i class="fas fa-lock"></i>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                        autocomplete="new-password"
                    >
                </div>
                @error('password')
                    <div class="error-msg"><i class="fas fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar contraseña</label>
                <div class="input-wrap">
                    <i class="fas fa-lock"></i>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="••••••••"
                        autocomplete="new-password"
                    >
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-check"></i> Restablecer contraseña
            </button>
        </form>

        <div class="form-footer">
            ¿Recordaste tu contraseña? <a href="{{ route('login') }}">Iniciar sesión</a>
        </div>
    </div>
</div>

</body>
</html>