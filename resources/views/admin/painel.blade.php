<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel admin</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

    body {
        background-color: #543800;
        font-family: 'Bebas Neue';
        font-weight: normal;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    section {
        display: flex;
        gap: 5px;
        flex-direction: column;
        background-color: white;
        padding: 10px;
        border-radius: 10px;
        min-width: 400px;
        justify-content: center;
        text-align: center;
    }

    h1 {
        margin: 0;
    }

    button {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
        background-color: #543800;
        color: white;
        cursor: pointer;
    }

    @media screen and (max-width: 600px) {
        section {
            min-width: 90%;
        }

    }
</style>

<body>
    <img src="{{ asset('img/logonostrapizza.png') }}" alt="" width="125px">
    <section>
        <h1>Painel admin</h1>
        <button>Cadastrar pizza</button>
        <button>Cadastrar bordas</button>
        <button>Cadastrar bebidas</button>
        <button>Excluir e editar</button>
    </section>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button>
            Deslogar
        </button>
    </form>



</body>

</html>