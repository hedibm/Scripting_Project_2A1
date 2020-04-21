<?php

class Offre
{
		private $nom;
		private $produit_id;
		private $pourcentage;

		public function __construct($nom, $produit_id,$pourcentage)
		{
			$this->nom = $nom;
			$this->produit_id = $produit_id;
			$this->pourcentage = $pourcentage;
		
		}

		public function get_nom()
		{
			return $this->nom;
		}

		public function set_nom($nom)
		{
			$this->nom = $nom;
		}

		public function get_produit_id()
		{
			return $this->produit_id;
		}

		public function set_produit_id($produit_id)
		{
			$this->produit_id = $produit_id;
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