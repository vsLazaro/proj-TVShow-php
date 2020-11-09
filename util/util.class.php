<?php
	class Util {
		//Método da expressão regular
		public static function testRegex($expressao, $atributo) {
			return preg_match($expressao,$atributo);
		}

		public static function testYear($year) {
			return true;
		}
	}
?>