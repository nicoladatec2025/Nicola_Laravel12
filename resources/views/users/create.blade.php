<div>
    <h2>Cadastrar Usuário</h2>

    <a href="{{ route('users.index') }}">Listar</a><br><br>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do usuário" required><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" id="email" placeholder="E-mail do usuário" required><br><br>

        <label>Senha: </label>
        <input type="password" name="password" id="password" placeholder="Senha do usuário" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</div>
