<div>
    <h2>Cadastrar Aula</h2>

    <a href="{{ route('lessons.index') }}">Listar</a><br><br>

    <form action="{{ route('lessons.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome da aula" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</div>
