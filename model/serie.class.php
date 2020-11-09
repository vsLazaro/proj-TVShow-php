<?php
    class Serie {
        private $idSerie;
        private $name;
        private $email;
        private $releaseYear;
        private $episodes;
        private $seasons;
        private $director;

        public function __construct(){ }
        public function __destruct(){ }

        public function getIdSerie() {
            return $this->idSerie;
        }

        public function setIdSerie($idSerie) {
            $this->idSerie = $idSerie;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getReleaseYear() {
            return $this->releaseYear;
        }

        public function setReleaseYear($releaseYear) {
            $this->releseYear = $releaseYear;
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
          return "<br>Código: ".$this->idSerie.
                 "<br>Nome: ".$this->name.
                 "<br>E-mail: ".$this->email.
                 "<br>Ano Lançamento: ".$this->releaseYear.
                 "<br>Episodios: ".$this->episodes.
                 "<br>Temporadas: ".$this->seasons;
                 "<br>Diretor: ".$this->director;
        }
    }
?>
