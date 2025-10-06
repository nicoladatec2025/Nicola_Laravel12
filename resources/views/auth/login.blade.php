@extends('layouts.login')

@section('content')
    <h3>Área Restrita</h3>

    <x-alert />

    <form action="#" method="POST">
        @csrf
        @method('POST')

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Digite o e-mail de usuário" value="{{ old('email') }}">
        <br><br>

        <label for="password">Senha</label>
        <input type="password" name="password" id="password" placeholder="Digite a senha" value="{{ old('password') }}">
        <br><br>

        <button type="submit">Acessar</button><br><br>

    </form>

    <a href="#">Esqueceu a senha?</a><br>
    Precisa de uma de conta? <a href="#">Increver-se!</a><br><br>
@endsection
