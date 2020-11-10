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
            <h2>Buscar Série</h2>
            <?php
                include '../dao/seriedao.class.php';
                include '../model/serie.class.php';

                $serieDAO = new SerieDAO();
                $series = $serieDAO->readSeries();

                $dados = implode("<br>",$series);
                echo $dados;

            ?>
            <!--Criando a estrutura de tabela para mostrar os dados: -->
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
                        echo "<tr>";
                        echo "<td>" . $serie->idSerie . "</td>";
                        echo "<td>" . $serie->name . "</td>";
                        echo "<td>" . $serie->releaseYear . "</td>";
                        echo "<td>" . $serie->episodes . "</td>";
                        echo "<td>" . $serie->seasons . "</td>";
                        echo "<td>" . $serie->director . "</td>";
                        echo "<td>
                              <a href='#'>
                                <img src='../img/edita.png' alt='Icone Edição'>
                              </a>&nbsp;&nbsp;
                              <a href='../controller/serie.controller.php?op=deletar&idserie=$serie->idSerie'>
                                <img src='../img/exclui.png' alt='Icone Excluir'>
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