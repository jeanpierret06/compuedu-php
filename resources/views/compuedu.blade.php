<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CompuEdu – Plataforma Educativa</title>
    <meta name="description" content="CompuEdu: plataforma educativa para la gestión de cursos y contenidos digitales.">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    {{-- CSS principal --}}
    <link rel="stylesheet" href="{{ asset('css/compuedu.css') }}">
</head>
<body>
    <!-- ======= HEADER ======= -->
    <header class="header" role="banner">
        <div class="header__container">
            <a href="{{ url('/') }}" class="header__logo-link" aria-label="Inicio CompuEdu">
                <img src="{{ asset('images/compuedu.png') }}" alt="Logo CompuEdu" class="logo" >
            </a>
            <nav class="header__nav" aria-label="Menú principal">
                <ul class="header__menu">
                    <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- ======= HERO / BANNER ======= -->
    <section class="banner" role="region" aria-label="Bienvenida">
        <div class="banner__content">
            <h1>Bienvenido a <span class="brand">CompuEdu</span></h1>
            <p>Plataforma educativa para la gestión de cursos y contenidos digitales.</p>
            <a href="{{ route('register') }}" class="btn btn-primary">Comenzar ahora</a>
        </div>
    </section>

    <!-- ======= MAIN CONTENT ======= -->
    <main class="main" id="main-content">
        <section class="features" aria-label="Características principales">
            <article class="feature-card">
                <h2>Documentación</h2>
                <p>Consulta la guía de uso y configuración para sacar el máximo provecho de CompuEdu.</p>
                <a href="#" class="btn-link">Ver más</a>
            </article>

            <article class="feature-card">
                <h2>Cursos</h2>
                <p>Explora los cursos disponibles, crea nuevos programas y gestiona inscripciones fácilmente.</p>
                <a href="#" class="btn-link">Explorar cursos</a>
            </article>

            <article class="feature-card">
                <h2>Soporte</h2>
                <p>Contacta con el equipo de CompuEdu para ayuda técnica o resolver tus dudas.</p>
                <a href="#" class="btn-link">Obtener ayuda</a>
            </article>
        </section>
    </main>

    <!-- ======= FOOTER ======= -->
    <footer class="footer" role="contentinfo">
        <div class="footer__container">
            <p>© {{ date('Y') }} <strong>CompuEdu</strong>. Todos los derechos reservados.</p>
            <nav class="footer__links" aria-label="Enlaces legales">
                <a href="#">Aviso legal</a>
                <a href="#">Política de privacidad</a>
            </nav>
        </div>
    </footer>
</body>
</html>
