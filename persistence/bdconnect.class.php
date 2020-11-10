<?php
  class ConexaoBanco extends PDO {

      private static $instance = null;

      public function __construct($dsn,$user,$pass) {
          parent::__construct($dsn,$user,$pass);
      }

      public static function getInstance() {
          if(!isset(self::$instance)) {
              try {
                  self::$instance = new ConexaoBanco("mysql:dbname=oraza;host=mysql.oraza.com.br","oraza","13042001L");
              } catch(PDOException $error) {
                  echo "Erro ao conectar. ".$error;
              }
          }
          return self::$instance;
      }
  }
?>
