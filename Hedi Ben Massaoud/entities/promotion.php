<?php

class Promotion
{
		private $code;
		private $pourcentage;
		

		public function __construct($code, $pourcentage)
		{
			$this->code = $code;
			$this->pourcentage = $pourcentage;
			
		
		}

		public function get_code()
		{
			return $this->code;
		}

		public function set_code($code)
		{
			$this->code = $code;
		}

		public function get_pourcentage()
		{
			return $this->pourcentage;
		}

		public function set_pourcentage($pourcentage)
		{
			$this->pourcentage = $pourcentage;
		}



}




?>