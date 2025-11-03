<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NicolaDaTec')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 2rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        nav a:hover, nav a.active {
            background-color: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }

        /* Main Content */
        main {
            min-height: calc(100vh - 400px);
            padding: 2rem 0;
        }

        /* Footer */
        footer {
            background-color: #1a1a1a;
            color: #ccc;
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            color: white;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .footer-menu {
            list-style: none;
        }

        .footer-menu li {
            margin-bottom: 0;
        }

        .footer-menu a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-menu a:hover {
            color: #2a5298;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #2a5298;
            color: white;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background-color: #1e3c72;
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #333;
            color: #888;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                gap: 1rem;
            }

            .header-content {
                flex-direction: column;
                gap: 1rem;
            }


            .slider {

      width: 5px;
       height: 2px;

    }

    .slides img {
      width: 5px;
      height: 2px;

        }

        }
    </style>

     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">




            <span class="logo-nav s">
                 <!--   LOGO NAVBAR -->
             <a href="{{ route('inicio') }}"><img src="{{ asset('images/logo-define-1000x500_v3.png') }}" ></a>
            </span>




                <nav>
                    <ul>
                        <li><a href="{{ route('inicio') }}" class="{{ request()->routeIs('inicio') ? 'active' : '' }}">Início</a></li>
                        <li><a href="{{ route('sobre') }}" class="{{ request()->routeIs('sobre') ? 'active' : '' }}">Sobre-Nós</a></li>
                        <li><a href="{{ route('servicos') }}" class="{{ request()->routeIs('servicos') ? 'active' : '' }}">Serviços</a></li>
                        <li><a href="{{ route('cursos') }}" class="{{ request()->routeIs('cursos') ? 'active' : '' }}">Cursos</a></li>
                        <li><a href="{{ route('contacto') }}" class="{{ request()->routeIs('contacto') ? 'active' : '' }}">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main >
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Sobre Nós</h3>
                    <p>Somos um projecto empresarial dedicada a fornecer soluções tecnológicas e formação de excelência para nossos clientes.</p>
                </div>

                <div class="footer-section">
                    <h3>Menu</h3>
                    <ul class="footer-menu">
                        <li><a href="{{ route('inicio') }}">Início</a></li>
                        <li><a href="{{ route('sobre') }}">Sobre-Nós</a></li>
                        <li><a href="{{ route('servicos') }}">Serviços</a></li>
                        <li><a href="{{ route('cursos') }}">Cursos</a></li>
                        <li><a href="{{ route('contacto') }}">Contacto</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Contacto</h3>
                    <p>Email: nicoladatec@gmail.com</p>
                    <p>Telefone: +244 938 033 192</p>
                    <p>Luanda, Angola</p>
                </div>

                <div class="footer-section">
                    <h3>Redes Sociais</h3>
                    <div class="social-links">
                        <a href="#" title="Facebook">ⓕ</a>
                        <a href="#" title="Instagram">🅾</a>
                        <a href="#" title="LinkedIn">[in]</a>
                    </div>
                </div>
            </div>

            <div class="copyright">
           <p>&copy; 2025 - {{ date('Y') }} | Tecnologias e Formação | {{ config('app.name') }}. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
