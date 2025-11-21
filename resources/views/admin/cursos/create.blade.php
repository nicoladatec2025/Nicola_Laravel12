@extends('layouts.admin')

@section('title','Novo Curso')

@section('content')
@include('admin.cursos._form', ['action' => route('admin.cursos.store'), 'method' => 'POST'])
<x-alert />
@endsection
