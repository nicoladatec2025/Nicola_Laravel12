<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site - Nicola Da Tec</title>

         <script>
        // Executar logo no início, antes de carregar o CSS e evitar o piscar na tela
        (function() {

            // Verificar se o usuário já definiu um tema na localStorage
            const theme = localStorage.getItem('theme');

            // Verificar se o sistema do usuário está configurado para o tema escuro
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            // Se o usuário escolheu o tema 'dark' ou se não há tema definido e o sistema prefere o modo escuro, aplica o tema escuro
            if (theme === 'dark' || (!theme && prefersDark)) {
                // Adicionar a classe 'dark' ao elemento raiz (html), ativando o modo escuro no site
                document.documentElement.classList.add('dark');
            }else {
                // Caso contrário, remove a classe 'dark' e aplica o tema claro
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dashboard">

<div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">


        <button id="toggleSidebar" class="menu-button">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>


            <a href="{{ route('home') }}" class="sidebar-link">
                     <!-- Ícone home (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span>Início</span>
                        </a>

             <div class="relative dropdown-button-border">
                    <!-- Ícone moon (Heroicons) -->
                    <button id="themeToggle" class="dropdown-button">
                        <svg id="iconMoon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                        </svg>
                        <!-- Ícone sun (Heroicons) -->
                        <svg id="iconSun" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                    </button>
                </div>

                        <a class="sidebar-link" href="{{ route('login') }}">Login

                        <svg fill="none" class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  stroke-width="1.5"
                        stroke="currentColor" >
                            <path fill-rule="evenodd" clip-rule="evenodd" />
                        </svg>
                    </a>

        </div>
    </nav>

    <div class="flex">

        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar">
            <div class="sidebar-container">
                <button id="closeSidebar" class="sidebar-close-button">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="sidebar-header" >

            <span class="logo-nav">
                 <!--   LOGO NAVBAR -->
                <img src="{{ asset('images/logo-define-1000x500_v3.png') }}" >
            </span>

                </div>
                <nav class="sidebar-nav">


                    <a href="{{ route('home') }}" class="sidebar-link">
                     <!-- Ícone home (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span>Início</span>
                        </a>

                         <a href="{{ route('site.about') }}" class="sidebar-link">
                     <!-- Ícone home (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span>Sobre</span>
                        </a>


                        <a  class="sidebar-link">
                        <!-- Ícone arrow-right-circle (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>Outras</span>
                        </a>
                    </a>
                </nav>
            </div>
        </aside>


        <!-- Conteúdo Principal -->
        <main class="main-content">
            @yield('content')

        </main>

    </div>
</div>


       <!-- Footer -->
               <div class="footer">

                      <a href="{{ route('home') }}" class="sidebar-link">
                     <!-- Ícone home (Heroicons) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span>Início</span>
                        </a>


                <button id="userDropdownButton" class="dropdown-button">
                        <a class="sidebar-link" href="{{ route('login') }}">Login</a>

                        <svg fill="none" class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  stroke-width="1.5"
                        stroke="currentColor" >
                            <path fill-rule="evenodd" clip-rule="evenodd" />
                        </svg>
                    </button>

                 </div>


  <div class="">
            {{-- Seção do rodapé --}}
        <footer class="mt-16 text-center footer-copy">
            {{-- Exibe o ano atual e o nome do aplicativo --}}
            <p>&copy; 2025 - {{ date('Y') }} | Tecnologias de Informação | Inovação e Formação - {{ config('app.name') }}. Todos os direitos reservados.</p>
        </footer>
 </div>

    </body>



</html>



