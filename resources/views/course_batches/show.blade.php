@extends('layouts.admin')

@section('content')
    <h2>Detalhes da Turma</h2>

    <a href="{{ route('course_batches.index') }}">Listar</a><br>
    <a href="{{ route('course_batches.edit', ['courseBatch' => $courseBatch->id]) }}">Editar</a><br>

    <form action="{{ route('course_batches.destroy', ['courseBatch' => $courseBatch->id]) }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

    </form><br><br>

    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $courseBatch->id }}<br>
    Nome: {{ $courseBatch->name }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($courseBatch->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($courseBatch->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
