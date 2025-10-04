@extends('layouts.admin')

@section('content')
    <h2>Detalhes do Curso</h2>

    <a href="{{ route('courses.index') }}">Listar</a><br>
    <a href="{{ route('courses.edit', ['course' => $course->id]) }}">Editar</a><br>

    <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

    </form><br><br>

    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $course->id }}<br>
    Nome: {{ $course->name }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
