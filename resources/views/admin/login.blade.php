    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #543800;
            font-family: 'Bebas Neue';
            font-weight: normal;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }
        label {
            color: black;
            font-size: 20px;
        }
        div {
            display: flex;
            gap: 2px;
            flex-direction: column;
        }

        input {
            padding: 3px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
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
    </style>

    <body>
        @if ($errors->any())
        <div style="color:black; font-size: 20px;">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <img src="{{ asset('img/logonostrapizza.png') }}" alt="" width="150px">
        <form method="post" action="{{ route('admin.login.post') }}">
        @csrf 
            <div>
                <label>Usuário: </label><input type="text" name="nome" required placeholder="Nome">
            </div>
            <div>
                <label>Senha: </label><input type="password" name="senha" required placeholder="Senha">
            </div>
            <button type="submit">Entrar</button>
        </form>
    </body>

    </html>