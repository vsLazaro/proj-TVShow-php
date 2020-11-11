<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CamisNew e Lázaro">
    <title>Minhas Séries</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            <h2>Buscar Série</h2>
            <?php
            include '../dao/seriedao.class.php';
            include '../model/serie.class.php';

            $serieDAO = new SerieDAO();
            $series = $serieDAO->readSeries();

            ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome da Série</th>
                        <th>Ano Lançamento</th>
                        <th>Episódios</th>
                        <th>Temporadas</th>
                        <th>Diretor</th>
                        <th>Editar/Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($series as $serie) {
                        $idSerie = $serie->getIdSerie();
                        echo "<tr>";
                        echo "<td>" . $serie->getIdSerie() . "</td>";
                        echo "<td>" . $serie->getName() . "</td>";
                        echo "<td>" . $serie->getReleaseYear() . "</td>";
                        echo "<td>" . $serie->getEpisodes() . "</td>";
                        echo "<td>" . $serie->getSeasons() . "</td>";
                        echo "<td>" . $serie->getDirector() . "</td>";
                        echo "<td>
                              <a href='../controller/serie.controller.php?op=alterar&idserie=$idSerie'>
                                <i class='material-icons'>create</i>
                              </a>&nbsp;&nbsp;
                              <a href='../controller/serie.controller.php?op=deletar&idserie=$idSerie'>
                                <i class='material-icons'>delete</i>
                              </a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </section>
    </main>
</body>

</html>
