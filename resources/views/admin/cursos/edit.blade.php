@extends('layouts.admin')

@section('title','Editar Curso')

@section('content')
@include('admin.cursos._form', [
    'action' => route('admin.cursos.update', $curso),
    'method' => 'PUT',
    'curso' => $curso
])
<x-alert />
@endsection
