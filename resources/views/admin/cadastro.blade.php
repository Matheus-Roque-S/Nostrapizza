<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Item do Cardápio</title>
    <script>
        function atualizarCampos() {
            const categoria = document.getElementById('categoria').value;
            const campoPequeno = document.getElementById('campo-preco_p');
            const campoMedio = document.getElementById('campo-preco_m');
            const labelPrecoG = document.getElementById('label-preco_g');
            const ingredientes_input = document.getElementsByClassName('ingredientes-input');

            if (categoria === 'pizza') {
                campoPequeno.style.display = 'flex';
                campoMedio.style.display = 'flex';
                ingredientes_input[0].style.display = 'block';
                ingredientes_input[1].style.display = 'block';
                labelPrecoG.textContent = 'Preço Grande:';
            } else {
                campoPequeno.style.display = 'none';
                campoMedio.style.display = 'none';
                ingredientes_input[0].style.display = 'none';
                ingredientes_input[1].style.display = 'none';
                labelPrecoG.textContent = 'Preço:';
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            document.getElementById('categoria').addEventListener('change', atualizarCampos);
            atualizarCampos();
        });
    </script>

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

    * {
        margin: 0;
        padding: 0;
    }

    h2 {
        color: black;
        text-shadow:
            -1px -1px 0 whitesmoke,
            1px -1px 0 whitesmoke,
            -1px 1px 0 whitesmoke,
            1px 1px 0 whitesmoke;
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
        gap: 5px;
    }

    form {
        display: flex;
        flex-direction: column;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        gap: 2px;
        width: 220px;
    }

    form div {
        display: flex;
        flex-direction: column;
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

    label {
        color: black;
        font-size: 18px;
    }

    textarea {
        resize: none;
        height: 60px;
    }

    p {
        display: flex;
        gap: 5px;
        font-size: 20px;
        text-shadow:
            -1px -1px 0 whitesmoke,
            1px -1px 0 whitesmoke,
            -1px 1px 0 whitesmoke,
            1px 1px 0 whitesmoke;
    }

    a {
        color: black;
        text-shadow:
            -1px -1px 0 gold,
            1px -1px 0 gold,
            -1px 1px 0 gold,
            1px 1px 0 gold;
        font-size: 20px;
    }
</style>

<body>
    <h2>Cadastro de produto</h2>

    @if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.store') }}">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label class="ingredientes-input">Ingredientes:</label>
        <textarea class="ingredientes-input" name="ingredientes"></textarea>

        <label>Categoria:</label>
        <select name="categoria" id="categoria" required>
            <option value="pizza">Pizza</option>
            <option value="borda">Borda</option>
            <option value="bebidas">Bebidas</option>
        </select>

        <div id="campo-preco_p">
            <label>Preço Pequeno:</label>
            <input type="number" step="0.01" name="preco_p">
        </div>

        <div id="campo-preco_m">
            <label>Preço Médio:</label>
            <input type="number" step="0.01" name="preco_m">
        </div>

        <label id="label-preco_g">Preço Grande:</label>
        <input type="number" step="0.01" name="preco_g">

        <button type="submit">Cadastrar</button>
    </form>
    <a href="{{ route('admin.index') }}">

        <button>
            Painel
        </button>
    </a>

</body>

</html>