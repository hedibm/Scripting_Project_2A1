<?php


require '../config.php';

class PromotionManage
{
	
	public function ajoutPromotion($promotion)
	{
			$db = config::getConnexion();
		$req = "INSERT INTO promotion (codePromo, pourcentage) VALUES (:code, :pourcentage)";
	
		$sql = $db->prepare($req);
			$sql->bindvalue(":code",$promotion->get_code());
			$sql->bindvalue(":pourcentage", $promotion->get_pourcentage());
		


			if ($sql->execute())
				echo "ok";
			else echo "gg";

	}



	 public function afficherPromotion()
    {
    	$db=config::getConnexion();
    	$req="SELECT * FROM promotion;";
    	$sql=$db->query($req);
    	return $sql;
    }
    



    	function supprimerPromotion($code)
    {
		$sql="DELETE FROM promotion where codePromo= :code";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':code',$code);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}



   	    function modifierPromotion($promotion,$code)
   	 {
		$sql="UPDATE promotion SET codePromo=:codee, pourcentage=:pourcentage WHERE codePromo='$code'";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	
        $req=$db->prepare($sql);
		$codee=$promotion->get_code();
        $pourcentage=$promotion->get_pourcentage();
     

		$datas = array(':codee'=>$codee, ':code'=>$code, ':pourcentage'=>$pourcentage);
		$req->bindValue(':codee',$codee);
		//$req->bindValue(':code',$code);
		$req->bindValue(':pourcentage',$pourcentage);


		
		
            if($req->execute())
            {
               echo "<meta http-equiv=\"refresh\";URL=ListeDesPromotions.php\">";
                 
            }
			
       else
       {
       echo "<meta http-equiv=\"refresh\";URL=ListeDesPromotions.php\">";
       }
		
	}



		function recupererPromotion($code)
	{
		$db=config::getConnexion();
    	$req="SELECT * FROM promotion WHERE codePromo= '$code'";
    	$sql=$db->query($req);
    	
    	return $sql;
    	//return $sql;
	}
 

}


 ?>