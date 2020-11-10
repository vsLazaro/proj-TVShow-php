<?php
session_start();
?>
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
            <h2>Alterar Série</h2>
            <?php
            //se houver uma sessão series:
            if (isset($_SESSION['series'])) {
                //inclui se ainda não foi incluido
                include_once('../model/serie.class.php');
                //criar uma variável array p busca que ele retorna:
                $series = array();
                //pegar o resultado que está na variável
                $series = unserialize($_SESSION['series']);
                // $thisSerie = $series[0];
                $thisSerie = $series[0];
            } else {
                echo "deu ruim";
            }
            ?>
            <form action="../controller/serie.controller.php?op=confirmaalteracao" method="post">
                <div>
                    <input type="number" name="idserie" value="<?php echo $thisSerie->getIdSerie() ?>" readonly>
                </div>
                <div>
                    <input type="text" name="name" placeholder="Nome da série" value="<?php echo $thisSerie->getName() ?>" class="">
                    <label for="name">Nome</label>
                </div>
                <div>
                    <input type="year" name="releaseyear" placeholder="Ano de Lançamento" value="<?php echo $thisSerie->getReleaseYear() ?>" class="">
                    <label for="releaseYear">Ano de Lançamento</label>
                </div>
                <div>
                    <input type="number" name="episodes" placeholder="Número de Episódios" value="<?php echo $thisSerie->getEpisodes() ?>" class="">
                    <label for="episodes">Número de Episódios</label>
                </div>
                <div>
                    <input type="text" name="seasons" placeholder="Número de temporadas" value="<?php echo $thisSerie->getSeasons() ?>" class="">
                    <label for="seasons">Número de Temporadas</label>
                </div>
                <div>
                    <input type="text" name="director" placeholder="Diretor" value="<?php echo $thisSerie->getDirector() ?>" class="">
                    <label for="director">Diretor</label>
                </div>
                <div>
                    <input type="email" name="email" placeholder="E-mail" class="">
                    <label>Por favor insira o seu e-mail, para que possamos confirmar pra você que a série foi cadastrada </label>
                </div>
                <!--fim da sessão -->
                <?php
                unset($_SESSION['series']);
                ?>
                <button type="reset" name="limpa" value="Limpar" class="button orange">Limpar!</button>
                <button type="submit" name="altera" value="Alterar" class="button green">Alterar!</button>
            </form>
        </section>
    </main>
</body>

</html>