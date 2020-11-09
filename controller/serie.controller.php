<?php
    session_start();
    require '../util/util.class.php';
    require_once '../util/PHPMailerAutoload.php';
    include '../model/serie.class.php';
    include '../dao/seriedao.class.php';

    switch($_GET['op']) {
        case 'cadastrar':
            $newSerie = seriesAtribuition();

            if( $newSerie == null) {
                header('location:../view/erro.php');
            } else {
                //Aqui enviamos para o BANCO:
                $serieDAO = new SerieDAO();
                echo $serieDAO->createSeries($newSerie);
                $email = $_POST['email'];

                sendConfirmationEmail(
                    $newSerie->getName(), 
                    $newSerie->getReleaseYear(), 
                    $newSerie->getEpisodes(), 
                    $newSerie->getSeasons(), 
                    $newSerie->getDirector(), 
                    $email);

                    echo $newSerie;
                // header('location:../view/confirmacadastro.html');
            }
        break;

        case 'deletar':
            $serieDAO = new SerieDAO();
            $serieDAO->deleteSeries($_REQUEST['idserie']);
            header('location:../view/buscarserie.php');
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
            header("location:../view/alterarserie.php");
        break;

        case 'confirmaralteracao':
            $serie = seriesAtribuition();
            $serie->idSerie = $_POST['idserie'];

            $SerieDAO = new SerieDAO();
            $SerieDAO->updateSerie($serie);
            
            header('location:../view/buscarserie.php');
        break;
        default:
            echo "Errou o nome do case!!!";
    }

    function verificaSerie($name, $releaseyear, $episodes, $seasons, $director, $email) {
        if(empty($name) || empty($releaseyear) || empty($episodes) || empty($seasons) || empty($director) || empty($email)) {
            return 'Preencha os campos.';
        } else if(! Util::testRegex('/^[A-Za-zÀ-Úà-ú ]{2,50}$/',$name)) {
            return 'Nome da série fora do padrão';
        } else if(! Util::validateEmail(Util::removeSpace(Util::transformLower($email)))) {
            return 'Email fora do padrão';
        } else if(! Util::testRegex('/^[A-Za-zÀ-Úà-ú ]{2,30}$/',$director)) {
            return 'Nome do diretor fora do padrão';
        // } else if(! Util::testYear($releaseyear)) {
        //     return 'Não é ano válido';
        } else if(! Util::testRegex('/^[0-9]{1,4}$/',$episodes)) {
            return 'Não é um número de episódios válido';
        } else if(! Util::testRegex('/^[0-9]{1,2}$/',$seasons)) {
            return 'Não é um número de temporadas válido';
        } else {
            return 'true';
        }
    }

    function seriesAtribuition() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $releaseyear = $_POST['releaseyear'];
        $episodes = $_POST['episodes'];
        $seasons = $_POST['seasons'];
        $director = $_POST['director'];

        $serie = new Serie();

        $verification = verificaSerie($name, $releaseyear, $episodes, $seasons, $director, $email);
        if ($verification != 'true') {
            echo $verification;
            $serie = null;
        } else {
            $serie->setName($name);
            $serie->setReleaseyear($releaseyear);
            $serie->setEpisodes($episodes);
            $serie->setSeasons($seasons);
            $serie->setDirector($director);
        }
        return $serie;
    }

    function sendConfirmationEmail($name, $releaseyear, $episodes, $seasons, $director, $email) {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // Define que a mensagem será SMTP
        $mail->Host = "smtp.oraza.com.br"; // Seu endereço de host SMTP
        $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
        $mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
        $mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
        $mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
        $mail->Username = 'contato@oraza.com.br'; // Conta de email existente e ativa em seu domínio
        $mail->Password = '13042001L'; // Senha da sua conta de email

        // Dados Remetente
        $mail->Sender = "contato@oraza.com.br"; // Conta de email existente e ativa em seu domínio
        $mail->From = "contato@oraza.com.br"; // Sua conta de email que será remetente da mensagem
        $mail->FromName = "Contato Oraza"; // Nome da conta de email

        // Definindo Destinatário
        $mail->AddAddress($email, 'Nome'); // Define qual conta de email receberá a mensagem

        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
        $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
        // DEFINIÇÃO DA MENSAGEM
        $mail->Subject  = "Série Cadastrada com sucesso"; // Assunto da mensagem
        $mail->Body .= " Nome da serie: " . $name . "
                "; // Texto da mensagem
        $mail->Body .= " <br>Seu E-mail: " . $email . "
                "; // Texto da mensagem
        $mail->Body .= " <br>Ano lançamento: " . $releaseyear . "
                "; // Texto da mensagem
        $mail->Body .= " <br>Número de episódios: " . $episodes . "
                "; // Texto da mensagem
        $mail->Body .= " <br>Número de temporadas: " . $seasons . "
                "; // Texto da mensagem
        $mail->Body .= " <br>Nome do diretor: " . $director . "
                "; // Texto da mensagem
        $mail->Body .= " <br>Obrigada por cadastrar uma série 
                "; // Texto da mensagem
        // ENVIO DO EMAIL
        $enviado = $mail->Send();
        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
    }
?>
