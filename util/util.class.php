<?php
	class Util {
		//Método da expressão regular

		public function testRegex($expressao, $atributo){

			return preg_match($expressao,$atributo);

		}
	}

?>
