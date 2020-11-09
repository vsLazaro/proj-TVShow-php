<?php
    session_start();
    require '../util/util.class.php';
    require_once '../model/PHPMailerAutoload.php';
    include '../model/serie.class.php';
    include '../dao/seriedao.class.php';

    switch($_GET['op']) {
        case 'cadastrar':
            $name = $_POST['name'];
            $email = $_POST['email'];
            $releaseyear = $_POST['releaseYear'];
            $episodes = $_POST['episodes'];
            $seasons = $_POST['seasons'];
            $director = $_POST['director'];
            if(empty($name) || empty($releaseyear) || empty($episodes) || empty($seasons) || empty($director) || empty($email)) {
                return 'Preencha os campos.';
            } else if(! Util::testRegex('/^[A-Za-zÀ-Úà-ú ]{2,50}$/',$name)) {
                return 'Nome da série fora do padrão';
            } else if(! Util::validateEmail(Util::removeSpace(Util::transformLower($email)))) {
                return 'Email fora do padrão';
            } else if(! Util::testRegex('/^[A-Za-zÀ-Úà-ú ]{2,30}$/',$director)) {
                return 'Nome do diretor fora do padrão';
            } else if(! Util::testYear($releaseyear)) {
                return 'Não é ano válido';
            } else if(! Util::testRegex('/^[0-9]{1,4}$/',$episodes)) {
                return 'Não é um número de episódios válido';
            } else if(! Util::testRegex('/^[0-9]{1,2}$/',$seasons)) {
                return 'Não é um número de temporadas válido';
            } else {
                $serie = new Serie();
                $serie->setName($name);
                $serie->setReleaseyear($releaseyear);
                $serie->setEpisodes($episodes);
                $serie->setSeasons($seasons);
                $serie->setDirector($director);
                //Aqui enviamos para o BANCO:
                $serieDAO = new SerieDAO();
                $SerieDAO->createSeries($serie);

                $mail = new PHPMailer();
                $mail->IsSMTP(); // Define que a mensagem será SMTP
                $mail->Host = "smtp.oraza.com.br"; // Seu endereço de host SMTP
                $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
                $mail->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
                $mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
                $mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
                $mail->Username = 'contato@oraza.com.br'; // Conta de email existente e ativa em seu domínio
                $mail->Password = 'king2020'; // Senha da sua conta de email

                // Dados Remetente
                $mail->Sender = "contato@oraza.com.br"; // Conta de email existente e ativa em seu domínio
                $mail->From = "contato@oraza.com.br"; // Sua conta de email que será remetente da mensagem
                $mail->FromName = "contato@gmail.com.br"; // Nome da conta de email

                // Definindo Destinatário
                $mail->AddAddress( $email, 'Nome'); // Define qual conta de email receberá a mensagem

                $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
                $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
                // DEFINIÇÃO DA MENSAGEM
                $mail->Subject  = "Série Cadastrada com sucesso"; // Assunto da mensagem
                $mail->Body .= " Nome da serie: ".$name."
               "; // Texto da mensagem
                $mail->Body .= " Seu E-mail: ".$email."
               "; // Texto da mensagem
                $mail->Body .= " Ano lançamento: ".$releaseyear."
               "; // Texto da mensagem
                $mail->Body .= " Número de episódios: ".$episodes."
               "; // Texto da mensagem
                $mail->Body .= " Número de temporadas: ".$seasons."
               "; // Texto da mensagem
                $mail->Body .= " Nome do diretor: ".$director."
               "; // Texto da mensagem
                // ENVIO DO EMAIL
                $enviado = $mail->Send();
                // Limpa os destinatários e os anexos
                $mail->ClearAllRecipients();
                header('location:../view/confirmacadastro.html');
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
            $serie = new Serie();
            $serie->idSerie = $_POST['idserie'];
            $serie->name = $_POST['name'];
            $serie->email = $_POST['email'];
            $serie->releaseYear = $_POST['releaseYear'];
            $serie->episodes = $_POST['episodes'];
            $serie->seasons = $_POST['seasons'];
            $serie->director = $_POST['director'];
            $SerieDAO = new SerieDAO();
            $SerieDAO->updateSerie($serie);
            header('location:../view/buscarserie.php');
        break;
        default:
            echo "Errou o nome do case!!!";
        }
?>
