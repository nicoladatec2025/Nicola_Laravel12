<div>
    <h2>Cadastrar o Curso</h2>

    <a href="{{ route('courses.index') }}">Listar</a><br><br>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</div>
