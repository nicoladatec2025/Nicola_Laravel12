@extends('layouts.admin')

@section('content')
    <h2>Editar Usuário</h2>

    @can('index-user')
        <a href="{{ route('users.index') }}">Listar</a><br>
    @endcan

    @can('show-user')
        <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a><br>
    @endcan

    <br>
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

        @can('edit-roles-user')
            <label>Papel: </label>
            @forelse ($roles as $role)
                @if ($role != 'Super Admin' || Auth::user()->hasRole('Super Admin'))
                    <input type="checkbox" name="roles[]" id="role_{{ Str::slug($role) }}" value="{{ $role }}"
                        {{ in_array($role, old('roles', $userRoles)) ? 'checked' : '' }}>
                    <label for="role_{{ Str::slug($role) }}">{{ $role }}</label>
                @endif
            @empty
                <p>Nenhum papel disponível.</p>
            @endforelse
            <br><br>
        @endcan

        <button type="submit">Salvar</button>
    </form>
@endsection
