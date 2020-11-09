<?php
	class Util {
		//Método da expressão regular
		public static function testRegex($expressao, $atributo) {
			return preg_match($expressao,$atributo);
		}

		public static function testYear($year) {
			//Laz faz a lógica mágica com o date :P 
			return true;
		}
	}
?>