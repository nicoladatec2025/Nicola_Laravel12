@extends('layouts.admin')

@section('content')
    <h2>Detalhes da Turma</h2>

    <a href="{{ route('course_batches.index') }}">Listar</a><br>
    <a href="{{ route('course_batches.edit', ['courseBatch' => $courseBatch->id]) }}">Editar</a><br><br>

    <x-alert />

    {{-- Imprimir o registro --}}
    ID: {{ $courseBatch->id }}<br>
    Nome: {{ $courseBatch->name }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($courseBatch->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($courseBatch->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
