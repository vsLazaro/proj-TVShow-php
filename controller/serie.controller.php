<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> Lista de series </title>
        <meta name="author" content="Lázaro e Camila">
        <meta name="description" content="Projeto final, php, bd, front">
        <meta name="keywords" content="PHP, HTML, BD, CSS, JS">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <header>
                <h1>Series</h1>
            </header>
            <nav>
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../view/buscarcontatos.php">Visualizar Series</a></li>
                </ul>
            </nav>

            <section>

                <h1> Series </h1>

                <?php
                    session_start();

                    include '../model/serie.class.php';

                    include '../util/util.class.php';

                    include '../dao/seriedao.class.php';

                    $util = new Util();

                    switch($_GET['op']) {

                        case 'cadastrar':
                            $name = $_POST['txtname'];

                            $realeaseyear = $_POST['nrealeaseyear'];

                            $episodes = $_POST['namountepisode'];

                            $seasons = $_POST['namountseason'];

                            if(empty($name) || empty($realeaseyear) || empty($episodes) || empty($seasons)) {

                                echo 'Preencha os campos.';

                            } else if(!$util->testRegex('/^[A-Za-zÀ-Úà-ú ]{2,30}$/',$name)) {

                                echo 'Nome fora do padrão';

                            } else if(!$util->testRegex('/^[0-9]{8,20}$/',$realeaseyear)) {

                                echo 'Telefone fora do padrão';

                            } else if(!$util->testRegex('/^[0-9]{8,20}$/',$episodes)) {

                                echo 'E-mail fora de padrão';

                            } else if(!$util->testRegex('/^[0-9]{8,20}$/',$seasons)) {

                                echo 'E-mail fora de padrão';

                            } else {

                            $serie = new Serie();

                            $serie->setName($name);

                            $serie->setRealeaseyear($realeaseyear);

                            $serie->setAmountepisode($episodes);

                            $serie->setAmountseason($seasons);


                            //Aqui enviamos para o BANCO:

                            $serieDAO = new SerieDAO();

                            $SerieDAO->createSeries($serie);


                            header('location:../view/confirmacadastro.html');

                            }

                        break;

                        case 'deletar':
                            $serieDAO = new SerieDAO();

                            $serieDAO->deleteSeries($_REQUEST['idserie']);

                            header('location:../view/buscarcontatos.php');

                        break;

                        case 'alterar':

                            $idserie = $_REQUEST['idserie'];

                            $query = 'WHERE idserie = '.$idserie;

                    //criamos um objeto para acessar as funções do DAO:

                            $serieDAO = new SerieDAO();

                    //criamos uma variável para pegar o resultado da busca:

                            $series = array();

                    //Atribuimos o resultado na busca na variável:

                            $series = $SerieDAO->search($query);

                    //como iremos passar o resultado da busca com segurança:

                    //SESSION com a função SERIALIZE - onde guarda uma string com respostas:

                            $_SESSION['series']=serialize($series);

                    //direciono para a página que terá o alterar:

                            header("location:../view/alterarcontato.php");

                        break;

                        case 'confirmaralteracao':

                            $serie = new Serie();

                            $serie->setIdserie($_POST['txtidcontato']);

                            $serie->nome = $_POST['txtnome'];

                            $serie->telefone = $_POST['txttelefone'];

                            $serie->email = $_POST['txtemail'];

                            $serie->mensagem = $_POST['txtmensagem'];


                            $SerieDAO = new SerieDAO();


                            $SerieDAO->updateSerie($serie);



                            header('location:../view/buscarcontatos.php');

                        break;

                        default:

                            echo "Errou o nome do case!!!";

                        }

                ?>
            </section>
        </main>
    </body>
</html>
