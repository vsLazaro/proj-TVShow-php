<?php
    class Serie {
        private $idserie;
        private $name;
        private $releaseyear;
        private $episodes;
        private $seasons;
        private $director;

        public function __construct(){ }
        public function __destruct(){ }

        public function getIdSerie() {
            return $this->idserie;
        }

        public function setIdSerie($idserie) {
            $this->idserie = $idserie;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getReleaseYear() {
            return $this->releaseyear;
        }

        public function setReleaseYear($releaseyear) {
            $this->releaseyear = $releaseyear;
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

        public function getDirector() {
            return $this->director;
        }

        public function setDirector($director) {
            $this->director = $director;
        }

        public function __toString() {
          return "<br>Código: ".$this->idserie.
                 "<br>Nome: ".$this->name.
                 "<br>Ano Lançamento: ".$this->releaseyear.
                 "<br>Episodios: ".$this->episodes.
                 "<br>Temporadas: ".$this->seasons.
                 "<br>Diretor: ".$this->director;
        }
    }
?>
