<?php
    require '../persistence/bdconnect.class.php';

    class SerieDAO {
        private $conexao = null;

        public function __construct() {

            $this->conexao = ConexaoBanco::getInstance();

        }

        public function __destruct() {

        }


        //Função para cadatrar no banco:

        public function createSeries($serie) {

            try {

                $stat = $this->conexao->prepare("INSERT INTO contato (idserie,name,realeaseyear,episodes,seasons) VALUES(NULL,?,?,?,?)") ;

                $stat->bindValue(1,$serie->getName());

        	    $stat->bindValue(2,$serie->getRealeaseyear());

        	    $stat->bindValue(3,$serie->getEpisode());

    		    $stat->bindValue(4,$serie->getSeasons());

                $stat->execute();

          } catch(PDOException $error) {

              echo "Erro ao cadastrar Contato. ".$error;

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

                echo "Erro ao buscar contatos. ".$error;

            }

        }

        public function deleteSeries($idserie){
            try {
                $stat = $this->conexao->prepare("DELETE FROM contato WHERE idserie=?");

                $stat->bindValue(1,$idserie);

                $stat->execute();

                $this->conexao = null;

            } catch (PDOException $error) {

                echo "Erro ao deletar contato. ".$error;

            }

        }


        public function search($query) {
            try {
                $stat = $this->conexao->query("SELECT * FROM series ".$query);

                $array = $stat->fetchAll(PDO::FETCH_CLASS,'Series');

                $this->conexao = null;

                return $array;

            } catch (PDOException $error) {

                echo "Erro ao buscar contato. ".$error;

            }

        }//fim da função buscarb



        //Função para alterar contato:

        public function updateSerie($serie) {
            try {
                $stat = $this->conexao->prepare("UPDATE serie SET name = ?, realeaseyear = ?, episodes = ?, seasons = ? WHERE idserie = ?");

                $stat->bindValue(1,$serie->getName());

        	    $stat->bindValue(2,$serie->getRealeaseyear());

        	    $stat->bindValue(3,$serie->getEpisodes());

    		    $stat->bindValue(4,$serie->getSeasons());

                $stat->bindValue(5,$serie->getIdserie());

                $stat->execute();

                $this->conexao = null;

            } catch (PDOException $error) {

                echo "Erro ao alterar contato. ".$error;

            }

        }



    }



?>
