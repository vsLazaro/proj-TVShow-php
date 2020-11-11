<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CamisNew e Lázaro">
    <title>Minhas Séries</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <header class="center">
        <h1>Minhas Séries</h1>
        <nav>
            <ul>
                <li><a href="../home">Home</a></li>
                <li><a href="../series">Buscar</a></li>
                <li><a href="../cadastrar">Cadastrar série</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="container">
            <h2>Cadastrar Série</h2>
            <form action="../controller/serie.controller.php?op=cadastrar" method="post" name="cadastro-serie">
                <div>
                    <input type="text" name="name" placeholder="Nome da série" class="" pattern="[A-Za-zÀ-Úà-ú ]{2,50}" required>
                </div>
                <div>
                    <input type="year" name="releaseyear" placeholder="Ano de Lançamento" class="" required>
                </div>
                <div>
                    <input type="number" name="episodes" placeholder="Número de Episódios" class="" required pattern="[0-9]{1,4}">
                </div>
                <div>
                    <input type="text" name="seasons" placeholder="Número de temporadas" class="" required pattern="[0-9]{1,2}">
                </div>
                <div>
                    <input type="text" name="director" placeholder="Diretor" class="" required pattern="[A-Za-zÀ-Úà-ú ]{2,30}">
                </div>
                <div>
                    <input type="email" name="email" placeholder="E-mail" class="" required>
                    <label>Por favor insira o seu e-mail, para que possamos confirmar pra você que a série foi cadastrada </label>
                </div>
                <div>
                    <div class="g-recaptcha" data-sitekey="6LdJkOEZAAAAAGYkwByYq7F-6a9Ga6pqxwVY_JYx"></div>
                </div>
                <button type="submit" class="button teal">Enviar!</button>
            </form>
        </section>
    </main>
</body>
</html>
