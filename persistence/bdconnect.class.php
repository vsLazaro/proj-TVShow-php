<?php
  class ConexaoBanco extends PDO {

      private static $instance = null;

      public function __construct($dsn,$user,$pass) {

          parent::__construct($dsn,$user,$pass);
      }

      public static function getInstance() {
          if(!isset(self::$instance)) {
              try {
                  self::$instance = new ConexaoBanco("mysql:dbname=projfinal;host=localhost","root","");
              } catch(PDOException $error) {
                  echo "Erro ao conectar. ".$error;
              }
          }
          return self::$instance;
      }
  }
?>
