<style>
    @import url('https://fonts.googleapis.com/css2?family=Galada&family=Italianno&family=Josefin+Slab&display=swap');

    * {
        font-family: 'Josefin Slab', serif;
        margin: 0;
    }

    .rodape {
        margin-top: 7%;
        display: flex;
        background-color: #00643C;
        width: 100%;
        height: 100px;
        border-radius: 70px 70px 0 0;
        padding-top: 10px;
        flex-direction: column;
        justify-content: flex-end;
    }

    .rodape #contato,
    #direitos {
        display: flex;
        justify-content: center;
    }

    .rodape #direitos {
        align-items: flex-end;
    }

    .rodape #contato {
        justify-content: center;
        flex-direction: row;
    }

    .rodape img {
        width: 2em;
        height: 2em;
        margin: 0 0px 0 10px;
    }


    .rodape p {
        font-size: 1.4em;
        margin: 0 10px 0 10px;
    }

    
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="rodape">
        <div id="contato">
            <img src="img/whatsbranco.png" alt="">
            <p>(41) 9 9624-3287</p>
            <img src="img/instabranco.png" alt="">
            <p>@coffesgarden</p>
        </div>
        <div id="direitos">
            <p>Todos os direitos reservados a coffesgarden@gmail.com</p>
        </div>
    </section>

</body>

</html>