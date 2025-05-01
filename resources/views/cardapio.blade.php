<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nostrapizza</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #543800;
    }

    main {
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h1,
    h2,
    h3 {
        font-family: 'Bebas Neue';
        font-weight: normal;
    }

    section.pizza {
        font-family: 'Bebas Neue';
        font-weight: normal;
        display: flex;
        flex-direction: column;
        color: black;
        background-color: white;
        margin-bottom: 20px;
        width: 90%;
        padding: 15px;
        border-radius: 10px;
    }


    section.pizza div {
        display: flex;
        gap: 10px;
    }

    section.pizza h3 {
        color: gold;
        text-shadow:
            -1px -1px 0 black,
            1px -1px 0 black,
            -1px 1px 0 black,
            1px 1px 0 black;
    }

    section.pizza p {
        color: black;
        font-size: 18px;
    }

    section.borda {
        font-family: 'Bebas Neue';
        font-weight: normal;
        display: flex;
        gap: 10px;
        color: black;
        background-color: white;
        margin-bottom: 10px;
        width: 90%;
        padding: 15px;
        border-radius: 10px;
    }

    section.borda h3 {
        color: gold;
        text-shadow:
            -1px -1px 0 black,
            1px -1px 0 black,
            -1px 1px 0 black,
            1px 1px 0 black;
    }


    section.bebida {
        font-family: 'Bebas Neue';
        font-weight: normal;
        display: flex;
        gap: 10px;
        color: black;
        background-color: white;
        margin-bottom: 10px;
        width: 90%;
        padding: 15px;
        border-radius: 10px;
    }

    section.bebida h3 {
        color: gold;
        text-shadow:
            -1px -1px 0 black,
            1px -1px 0 black,
            -1px 1px 0 black,
            1px 1px 0 black;
    }

    footer {
        border-top-right-radius: 25px;
        border-top-left-radius: 25px;
        background-color: brown;
        display: flex;
        justify-content: space-between;
        padding: 15px;
    }

    @media screen and (max-width: 665px) {
        footer {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

<body>
    <main>
        <img src="{{ asset('img/logonostrapizza.png') }}" alt="" width="150px">
        <h1>PIZZAS</h1>
        @foreach ($pizzas as $pizza)
        <section class="pizza">
            <h3>{{ $pizza->nome }}</h3>
            <p>{{ $pizza->ingredientes }}</p>
            <div>
                <h3> G - R$ {{$pizza->preçog}} </h3>
                <h3> M - R$ {{$pizza->preçom}} </h3>
                <h3> P - R$ {{$pizza->preçop}} </h3>
            </div>
        </section>
        @endforeach

        <h1>BORDAS</h1>
        @foreach ($borda as $borda)
        <section class="borda">
            <h3>{{ $borda->nome }}</h3>
            <h3>R$ {{ $borda->preçog }}</h3>
        </section>
        @endforeach

        <h1>bebidas</h1>
        @foreach ($bebidas as $bebida)
        <section class="bebida">
            <h3>{{ $bebida->nome }}</h3>
            <h3>R$ {{ $borda->preçog }}</h3>
        </section>
        @endforeach
    </main>
    <footer>

            <div>
                <h2>Funcionamento de Terça a Domingo</h2>
                <h3>Endereço: R. das Américas, 3585</h3>

            </div>
            <div>
                <h2>18:30 às 23:30</h2>
                <h3>telefone: (17) 3423-3209</h3>
            </div>
            <div class="redes-sociais">
                <a href="https://www.instagram.com/nostrapizzavotu/" target="_blank"><img src="{{ asset('img/instagramlogo.png') }}" alt="Instagram" width="50px"></a>
                <a href="https://wa.me/17996134040" target="_blank"><img src="{{ asset('img/whatssaplogo.png') }}" alt="Whatssap" width="50px"></a>
                <a href="https://pt-br.facebook.com/PizzariaNostraPizza/" target="_blank"><img src="{{ asset('img/logofacebook.png') }}" alt="Facebook" width="50px"></a>
            </div>
    </footer>
</body>

</html>