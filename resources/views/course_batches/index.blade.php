@extends('layouts.admin')

@section('content')
    <h2>Listar as Turmas</h2>

    <a href="{{ route('course_batches.create') }}">Cadastrar</a><br><br>

    <x-alert />

    {{-- Imprimir os registros --}}
    @forelse ($coursesBatches as $courseBatch)
        ID: {{ $courseBatch->id }}<br>
        Nome: {{ $courseBatch->name }}<br>
        <a href="{{ route('course_batches.show', ['courseBatch' => $courseBatch->id]) }}">Visualizar</a><br>
        <a href="{{ route('course_batches.edit', ['courseBatch' => $courseBatch->id]) }}">Editar</a><br>

        <form action="{{ route('course_batches.destroy', ['courseBatch' => $courseBatch->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>

        </form>
        <hr>
    @empty
        Nenhum registro encontrado!
    @endforelse

    {{ $coursesBatches->links() }}
@endsection
