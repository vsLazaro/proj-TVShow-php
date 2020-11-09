<?php
    class Serie {
        private $idserie;
        private $name;
        private $realeaseyear;
        private $episodes;
        private $seasons;

        public function __construct(){ } 

        public function __destruct(){ } 

        public function getIdserie() {
            return $this->idserie;
        }

        public function setIdserie($idserie) {
            $this->idserie = $idserie;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getRealeaseyear() {
            return $this->realeaseyear;
        }

        public function setRealeaseyear($realeaseyear) {
            $this->realeaseyear = $realeaseyear;
        }

        public function getEpisodes() {
            return $this->episodes;
        }

        public function setEpisodes($episodes) {
            $this->episodes = $episodes;
        }

        public function getSeasons() {
            return $this->seasons;
        }

        public function setSeasons($seasons) {
            $this->seasons = $seasons;
        }


        public function __toString() {
          return "<br>Código: ".$this->idserie.
                 "<br>Nome: ".$this->name.
                 "<br>Número de Episódios: ".$this->episodes.
                 "<br>Email: ".$this->seasons;
        }



    }



?>
