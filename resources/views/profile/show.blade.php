@extends('layouts.admin')

@section('content')
    <h2>Perfil</h2>

    <a href="{{ route('profile.edit') }}">Editar</a><br>
    <a href="{{ route('profile.edit_password') }}">Editar Senha</a><br><br>

    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    E-mail: {{ $user->email }}<br>
    Status: {{ $user->userStatus->name }}<br>
@endsection
