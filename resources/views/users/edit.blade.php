@extends('layouts.admin')

@section('content')
    <h2>Editar Usuário</h2>

    <a href="{{ route('users.index') }}">Listar</a><br>
    <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a><br><br>

    <x-alert />

    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do usuário" value="{{ old('name', $user->name) }}"
            required><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" id="email" placeholder="E-mail do usuário"
            value="{{ old('email', $user->email) }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
