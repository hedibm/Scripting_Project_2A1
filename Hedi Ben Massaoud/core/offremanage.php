<?php


require '../config.php';

class OffreManage
{
	
	public function ajoutOffre($offre)
	{
			$db = config::getConnexion();
		$req = "INSERT INTO offre(nom,produit_id,pourcentage)VALUES(:nom,:produit_id,:pourcentage)";

		$sql = $db->prepare($req);
			$sql->bindvalue(":nom",$offre->get_nom());
			$sql->bindvalue(":produit_id",$offre->get_produit_id());
			$sql->bindvalue(":pourcentage",$offre->get_pourcentage());
			

   				if ($sql->execute())
					echo "ok";
					else echo "gg";

    }


	public function afficherOffre()
    {
    	$db=config::getConnexion();
    	$req="SELECT * FROM offre;";
    	$sql=$db->query($req);
    	return $sql;
    }





    	function supprimerOffre()
    {
		$sql="DELETE FROM offre where idOffre= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$_GET['idOffre']);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

function modifierOffre($offre,$id)
   	 {
		$sql="UPDATE offre SET  nom=:nom, produit_id=:produit_id, pourcentage=:pourcentage WHERE idOffre=$id";
		
		$db = config::getConnexion();
	
	
        $req=$db->prepare($sql);


		$nom=$offre->get_nom();
		$produit_id=$offre->get_produit_id();
        $pourcentage=$offre->get_pourcentage();
        

        
     //   $req->bindValue(':idd',$id);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':produit_id',$produit_id);
		$req->bindValue(':pourcentage',$pourcentage);
		

		
		
            if($req->execute())
            {
               echo "<meta http-equiv=\"refresh\";URL=ListeDesOffres.php\">";
                 
            }
			
       else
       {
       echo "<meta http-equiv=\"refresh\";URL=ListeDesOffres.php\">";
       }
		
	}



		function recupererOffre($id)
	{
		$db=config::getConnexion();
    	$req="SELECT * FROM offre WHERE idOffre= '$id'";
    	$sql=$db->query($req);
    	
    	return $sql;
    	//return $sql;
	}


        function recupererProduit($id)
    {
        $db=config::getConnexion();
        $req="SELECT * FROM produit p , images p1 where p.produit_id=p1.produit_id and p.produit_id= '$id' LIMIT 1";
        $sql=$db->query($req);
        
        return $sql;
        //return $sql;
    }





}

	?>