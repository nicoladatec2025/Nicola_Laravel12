@extends('layouts.admin')

@section('content')
    <h2>Detalhes do Usuário</h2>

    <a href="{{ route('users.index') }}">Listar</a><br>
    <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a><br>
    <a href="{{ route('users.edit_password', ['user' => $user->id]) }}">Editar Senha</a><br><br>

    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    E-mail: {{ $user->email }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
