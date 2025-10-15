@extends('layouts.admin')

@section('content')
    <h2>Editar Turma</h2>

    @can('index-course-batch')
        <a href="{{ route('course_batches.index', ['course' => $courseBatch->id]) }}">Turmas</a><br>
    @endcan

    @can('show-course-batch')
        <a href="{{ route('course_batches.show', ['courseBatch' => $courseBatch->id]) }}">Visualizar</a><br>
    @endcan

    <br>
    <x-alert />

    <form action="{{ route('course_batches.update', ['courseBatch' => $courseBatch->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome da turma"
            value="{{ old('name', $courseBatch->name) }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
