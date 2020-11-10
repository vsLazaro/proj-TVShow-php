<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CamisNew e Lázaro">
    <title>Minhas Séries</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <header class="center">
        <h1>Minhas Séries</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="./buscarseries.php">Buscar</a></li>
                <li><a href="./cadastrarserie.php">Cadastrar série</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="container">
            <h2>Cadastrar Série</h2>
            <form action="../controller/serie.controller.php?op=cadastrar" method="post" name="cadastro-serie">
                <div>
                    <input type="text" name="name" placeholder="Nome da série" class="">
                </div>
                <div>
                    <input type="year" name="releaseyear" placeholder="Ano de Lançamento" class="">
                </div>
                <div>
                    <input type="number" name="episodes" placeholder="Número de Episódios" class="">
                </div>
                <div>
                    <input type="text" name="seasons" placeholder="Número de temporadas" class="">
                </div>
                <div>
                    <input type="text" name="director" placeholder="Diretor" class="">
                </div>
                <div>
                    <input type="email" name="email" placeholder="E-mail" class="">
                    <label>Por favor insira o seu e-mail, para que possamos confirmar pra você que a série foi cadastrada </label>
                </div>
                <button type="submit" class="button teal">Enviar!</button>
            </form>
        </section>
    </main>
</body>
</html>