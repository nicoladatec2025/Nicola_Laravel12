@extends('layouts.site')

@section('content')
    {{-- Container principal com um fundo gradiente e configurações de flexbox para centralização --}}
    <div
        class="bg-gradient-to-r from-blue-900 to-indigo-600 min-h-screen flex flex-col justify-center items-center text-white">



            <div class="bg-white text-black p-6 rounded-lg shadow-lg w-100% text-center">
                 <span class="logo-nav">
                 <!--   LOGO NAVBAR -->
                <img src="{{ asset('images/logo-define-1000x500_v3.png') }}" >
            </span>
            </div>

        {{-- Seção de cabeçalho centralizada --}}
        <header class="text-center">

            {{-- Título principal do aplicação --}}
            <h1 class="text-3xl font-bold mb-6">{{ $homeSection->main_title }}</h1>

            {{-- Descrição do aplicação --}}
            <p class="text-lg mb-10">
                {{ $homeSection->main_description }}
            </p>


        </header>

        {{-- Seção com informações adicionais sobre o aplicativo --}}
        <section class="mt-12 flex flex-col md:flex-row justify-center items-center space-y-6 md:space-y-0 md:space-x-6">

            {{-- Descrição do primeiro recurso --}}
            <div class="bg-white text-black p-6 rounded-lg shadow-lg w-72 text-center">
                <h3 class="font-bold text-xl mb-4">{{ $homeSection->feature_one_title }}</h3>
                <p>
                    {{ $homeSection->feature_one_description }}
                </p>
            </div>

            <div class="bg-white text-black p-6 rounded-lg shadow-lg w-72 text-center">
                <h3 class="font-bold text-xl mb-4">{{ $homeSection->feature_two_title }}</h3>
                <p>{{ $homeSection->feature_two_description }}</p>
            </div>

            <div class="bg-white text-black p-6 rounded-lg shadow-lg w-72 text-center">
                <h3 class="font-bold text-xl mb-4">{{ $homeSection->feature_three_title }}</h3>
                <p>{{ $homeSection->feature_three_description }}</p>
            </div>

        </section>



    </div>
@endsection
