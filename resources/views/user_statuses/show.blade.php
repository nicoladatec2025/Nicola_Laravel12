@extends('layouts.admin')

@section('content')
    <h2>Detalhes do Status Usuário</h2>

    <a href="{{ route('user_statuses.index') }}">Listar</a><br>
    <a href="{{ route('user_statuses.edit', ['userStatus' => $userStatus->id]) }}">Editar</a><br><br>

    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $userStatus->id }}<br>
    Nome: {{ $userStatus->name }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($userStatus->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($userStatus->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
