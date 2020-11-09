<?php
    class Serie {
        private $idserie;
        private $name;
        private $realeaseyear;
        private $episodes;
        private $seasons;

        public function __construct(){

        }

        public function getIdserie() {
            return $this->idserie;
        }

        public function setIdserie($idserie) {
            $this->idserie = $idserie;
            return $this;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
            return $this;
        }

        public function getRealeaseyear() {
            return $this->realeaseyear;
        }

        public function setRealeaseyear($realeaseyear) {
            $this->realeaseyear = $realeaseyear;
            return $this;
        }

        public function getEpisodes() {
            return $this->episodes;
        }

        public function setEpisodes($episodes) {
            $this->episodes = $episodes;
            return $this;
        }

        public function getSeasons() {
            return $this->seasons;
        }

        public function setSeasons($seasons) {
            $this->seasons = $seasons;
            return $this;
        }


        public function __toString() {
          return "<br>Código: ".$this->idserie.
                 "<br>Nome: ".$this->name.
                 "<br>Episodios: ".$this->$episodes.
                 "<br>Temporadas: ".$this->$seasons;
        }



    }



?>
