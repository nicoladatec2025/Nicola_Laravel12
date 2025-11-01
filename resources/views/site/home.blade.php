@extends('layouts.site')

@section('content')
    {{-- Container principal com um fundo gradiente e configurações de flexbox para centralização --}}

    <div
        class="bg-gradient-to-r bg-gradient-to-r from-blue-700 to-blue-500 justify-center items-center text-white">


               <span class="h-75 w-100%"><img class="  " src="{{ asset('images/cara-do-site.png') }}" > </span><br><br>


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
            <div class="bg-gradient-to-r from-blue-700 to-blue-500  text-white p-6 rounded-lg shadow-lg w-72 text-center">
                <h3 class="font-bold text-xl mb-4">{{ $homeSection->feature_one_title }}</h3>
                <p>
                    {{ $homeSection->feature_one_description }}
                </p>
            </div>

            <div class="bg-gradient-to-r from-blue-700 to-blue-500  text-white p-6 rounded-lg shadow-lg w-72 text-center">
                <h3 class="font-bold text-xl mb-4">{{ $homeSection->feature_two_title }}</h3>
                <p>{{ $homeSection->feature_two_description }}</p>
            </div>

            <div class=" bg-gradient-to-r from-blue-700 to-blue-500  text-white p-6 rounded-lg shadow-lg w-72 text-center">
                <h2 class="font-bold text-white mb-4">{{ $homeSection->feature_three_title }}</h3>
                <p>{{ $homeSection->feature_three_description }}</p>
            </div>

        </section>



    </div>
@endsection
