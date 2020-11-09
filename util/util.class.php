<?php
	class Util {
		//Método para validar E-mail:
		public static function validateEmail($email) {
			return filter_var($email, FILTER_VALIDATE_EMAIL);
		}

		//Método converta para minusculo:
		public static function transformLower($variavel) {
			return strtolower($variavel);
		}

		//Retirar Espaço:
		public static function removeSpace($variavel) {
			return trim($variavel);
		}

		//Método da expressão regular
		public static function testRegex($expressao, $atributo) {
			return preg_match($expressao,$atributo);
		}

		public static function testYear($year) {
			
			$currentYear = date('Y');

			if ($year > $currentYear) {
				return false;
			} else if ($year < 1900) {
				return false;
			} else {
				return true;
			}

		}
	}
?>
