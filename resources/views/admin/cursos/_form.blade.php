@php($curso = $curso ?? null)

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="bg-white rounded-lg border border-gray-200 p-6 max-w-3xl">
    @csrf
    @if($method !== 'POST') @method($method) @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700 mb-1">Título</label>
            <input name="titulo" value="{{ old('titulo', $curso->titulo ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded" required>        </div>
        <div>

            <label class="block text-gray-700 mb-1">Preço (Kz)</label>
            <input type="number" step="0.01" name="preco" value="{{ old('preco', $curso->preco ?? 0) }}" class="w-full px-3 py-2 border border-gray-300 rounded" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Nível</label>
            <select name="nivel" class="w-full px-3 py-2 border border-gray-300 rounded">
                @foreach(['iniciante','intermediário','avançado'] as $niv)
                    <option value="{{ $niv }}" @selected(old('nivel', $curso->nivel ?? '') === $niv)>{{ ucfirst($niv) }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-gray-700 mb-1">Categoria</label>
            <input name="categoria" value="{{ old('categoria', $curso->categoria ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded" required>
        </div>
    </div>



    <div class="mt-4">
        <label class="block text-gray-700 mb-1">Descrição</label>
        <textarea name="descricao" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded">{{ old('descricao', $curso->descricao ?? '') }}</textarea>
    </div>

    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700 mb-1">Carga horária (horas)</label>
            <input type="number" name="carga_horaria" value="{{ old('carga_horaria', $curso->carga_horaria ?? 0) }}" class="w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <div class="flex items-center gap-3">
            <input type="checkbox" name="ativo" value="1" @checked(old('ativo', $curso->ativo ?? true))>
            <span class="text-gray-700">Ativo</span>
        </div>
    </div>

    <div class="mt-4">
        <label class="block text-gray-700 mb-1">Imagem do curso</label>
        <input type="file" name="imagem" class="w-full px-3 py-2 border border-gray-300 rounded bg-white">

        @if($curso?->imagem_url)
            <img src="{{ $curso->imagem_url }}" class="mt-3 h-28 rounded border border-gray-200 object-cover" alt="Preview">
        @endif
    </div>

    <div class="mt-6 flex items-center justify-end gap-3">
        <a href="{{ route('admin.cursos.index') }}" class="px-4 py-2 rounded border border-gray-300 text-gray-700 hover:bg-gray-50">Cancelar</a>
        <button class="bg-blue-700 text-white px-5 py-2 rounded hover:bg-blue-800">Guardar</button>
    </div>
</form>
