@extends('layouts.admin')

@section('content')
   <div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Editar Preço</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tabela_precos.update', $preco->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="item" class="form-label">Item</label>
                    <input
                        type="text"
                        name="item"
                        id="item"
                        class="form-control"
                        value="{{ old('item', $preco->item) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input
                        type="number"
                        step="0.01"
                        name="valor"
                        id="valor"
                        class="form-control"
                        value="{{ old('valor', $preco->valor) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea
                        name="descricao"
                        id="descricao"
                        class="form-control"
                        rows="3"
                        required
                    >{{ old('descricao', $preco->descricao) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('tabela_precos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
