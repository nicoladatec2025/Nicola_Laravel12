@extends('layouts.admin')

@section('content')
    <h2>Editar Senha</h2>

    <a href="{{ route('users.index') }}">Listar</a><br>
    <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a><br><br>

    <x-alert />

    <form action="{{ route('users.update_password', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')        

        <label>Senha: </label>
        <input type="password" name="password" id="password" placeholder="Senha do usuário" value="{{ old('password') }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
