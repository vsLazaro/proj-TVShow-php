<?php
    require '../persistence/bdconnect.class.php';

    class SerieDAO {
        private $conexao = null;

        public function __construct() {
            $this->conexao = ConexaoBanco::getInstance();
        }

        public function __destruct() { }
        //Função para cadatrar no banco:

        public function createSeries($serie) {
            try {
                $stat = $this->conexao->prepare("INSERT INTO `series`(`idserie`, `name`, `releaseyear`, `episodes`, `seasons`, `director`) VALUES(NULL,?,?,?,?,?)");
                $stat->bindValue(1,$serie->getName());
        	    $stat->bindValue(2,$serie->getReleaseYear());
        	    $stat->bindValue(3,$serie->getEpisodes());
    		    $stat->bindValue(4,$serie->getSeasons());
    		    $stat->bindValue(5,$serie->getDirector());
                $stat->execute();

                return "Série Cadastrada";
            } catch(PDOException $error) {
                return "Erro ao cadastrar série. ".$error;
            }

        }

        public function readSeries() {
            try {
                $stat = $this->conexao->query("SELECT * FROM series");
                $array = array();
                $array = $stat->fetchAll(PDO::FETCH_CLASS,'Series');
                $this->conexao = null;
                return $array;
            } catch(PDOException $error) {
                return "Erro ao buscar série. ".$error;
            }
        }

        public function deleteSeries($idSerie){
            try {
                $stat = $this->conexao->prepare("DELETE FROM series WHERE idserie=?");
                $stat->bindValue(1,$idSerie);
                $stat->execute();

                $this->conexao = null;
                return "Série deletada!";
            } catch (PDOException $error) {
                return "Erro ao deletar serie. ".$error;
            }
        }

        public function search($query) {
            try {
                $stat = $this->conexao->query("SELECT * FROM series ".$query);
                $array = $stat->fetchAll(PDO::FETCH_CLASS,'Series');
                $this->conexao = null;
                return $array;
            } catch (PDOException $error) {
                return "Erro ao buscar serie. ".$error;
            }
        }//fim da função buscar

        //Função para alterar contato:
        public function updateSerie($serie) {
            try {
                $stat = $this->conexao->prepare("UPDATE serie SET name = ?, releseyear = ?, episodes = ?, seasons = ?, director = ? WHERE idserie = ?");

                $stat->bindValue(1,$serie->getName());
        	    $stat->bindValue(2,$serie->getReleaseYear());
        	    $stat->bindValue(3,$serie->getEpisodes());
    		    $stat->bindValue(4,$serie->getSeasons());
    		    $stat->bindValue(5,$serie->getDirector());
                $stat->bindValue(6,$serie->getIdSerie());
                $stat->execute();
                $this->conexao = null;

                return "Atualizado com sucesso";
            } catch (PDOException $error) {
                return "Erro ao alterar série. ".$error;
            }
        }
    }

?>
