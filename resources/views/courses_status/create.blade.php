<div>
    <h2>Cadastrar Status Cursos</h2>

    <a href="{{ route('courses-status.index') }}">Listar</a><br><br>

    <form action="{{ route('courses-status.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do status" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</div>
