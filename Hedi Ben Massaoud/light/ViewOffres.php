
 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Adminto - Responsive Admin Dashboard Template</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>

    <body>

<form method="post" action="envoyer-mail1.php">

        <div ></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="ex-page-content text-center">

                                      <?php
                                         

                                        require '../core/offremanage.php';
                                        $off= new OffreManage();
                                        if (isset($_POST['idoffre']))
                                            $idoffre=$_POST['idoffre'];
                                        else if (isset($_GET['idoffre']))
                                            $idoffre=$_GET['idoffre'];
                                        else
                                            die();
                                        $liste=$off->recupererOffre($idoffre);





                                    ?>
                                    

                                     <?php
                                    foreach ($liste as $val) 
                                    $idproduit=$val['produit_id'];
                                   $list=$off->recupererProduit($idproduit);
                                    {
                                        foreach ($list as $row) 

                                        {

                                        ?>
                <div><img src="https://image.ibb.co/h0KWOc/ida2.png" width="150" height="169"></div>

                <h3 class="text-uppercase font-600">Offre Spéciale</h3>
                <div class="text-error" size= 5px> <?php echo $val['nom']?> </div>
                <h3 class="text-uppercase font-600">Vous avez une réduction de </h3>
                <div class="logo" size= 5px> <?php echo $val['pourcentage']?>% </div>
                <h3 class="text-uppercase font-600">sur chaque commade du produit </h3>
                <div class="text-error" size= 5px> <?php echo $row['produit_nom']?></div>
         
                   

                
                

                      <?php

                    $db = config::getConnexion();
                    $req = $db->query("SELECT email from client ");
                    $donnees = $req->fetchAll();
                    $to='';
                    foreach ($donnees as $key => $value) {
                        $to.=$value['email'].",";

                    
                    
                    /*$header='Content-type: text/html; charset=iso-8859-1 From :contact.zaytatn@gmail.com';
                    mail($to, 'IDA-OPTIQUE|Newsletter', '$string',$header);*/?>

                          
           
                            <input type="hidden" name="lien" value="<?php echo 'http://localhost/code/light/ViewOffres.php?idoffre='.$_GET['idoffre'] ?>">
                            <input type="hidden" name="destination" value="<?php echo $to ?>">
                            <input type="hidden" name="link" value="http://localhost/code/light/ListeDesOffres.php">
                            <input type="hidden" name="objet" value="IDA-OPTIQUE|Newsletter">

                        <?php } ?>
                            
                           <button value="confirmer" id="confirmer">Envoyer</button>


                 <?php }} ?>

            </div>
        </div>
        <!-- end wrapper page -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	</form>
	</body>
</html>