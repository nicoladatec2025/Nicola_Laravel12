<div>
    <h2>Cadastrar Turma</h2>

    <a href="{{ route('courses-batches.index') }}">Listar</a><br><br>

    <form action="{{ route('courses-batches.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome da turma" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</div>
