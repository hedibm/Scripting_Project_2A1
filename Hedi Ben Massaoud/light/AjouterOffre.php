 <?php  include 'session.php'; ?>
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


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>Admin<span>to</span></span><i class="mdi mdi-layers"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">

                        <!-- Page title -->
                        <ul class="nav navbar-nav list-inline navbar-left">
                            <li class="list-inline-item">
                                <button class="button-menu-mobile open-left">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li class="list-inline-item">
                                <h4 class="page-title">Ajouter Une Offre </h4>
                            </li>
                        </ul>

                        <nav class="navbar-custom">

                            <ul class="list-unstyled topbar-right-menu float-right mb-0">

                                <li>
                                    <!-- Notification -->
                                    <div class="notification-box">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a href="javascript:void(0);" class="right-bar-toggle">
                                                    <i class="mdi mdi-bell-outline noti-icon"></i>
                                                </a>
                                                <div class="noti-dot">
                                                    <span class="dot"></span>
                                                    <span class="pulse"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Notification bar -->
                                </li>

                                <li class="hide-phone">
                                    <form class="app-search">
                                        <input type="text" placeholder="Search..."
                                               class="form-control">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>

                            </ul>
                        </nav>
                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
                        <?php  include 'left-bar.php'; ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">


                         <div class="row">
                            <div class="col-12">
                                <div class="card-box">

                                   <h4 class="m-t-0 header-title"><b></b></h4>
                                     


                                            <div class="p-20">

                                                <script type="text/javascript">
                                                    


                                                   function queDesLettres(champ) {
                                                      if(!/^[a-zA-Z]+$/.test(champ.value)) {
                                                        alert("C'est pas que des lettres !");
                                                        //champ.focus();
                                                        return false;
                                                      }
                                                      return true;
                                                    }
                                                    function queDesChiffres(champ) {
                                                      if(!/^[0-9]+$/.test(champ.value)) {
                                                        alert("C'est pas que des chiffres !");
                                                        //champ.focus();
                                                        return false;
                                                      }
                                                      return true;
                                                    }
                                                    function verifForm(formulaire) {
                                                      var ok = true;
                                                      ok = ok && queDesLettres(formulaire.prenom);
                                                      ok = ok && queDesLettres(formulaire.nom);
                                                      ok = ok && queDesChiffres(formulaire.secu);
                                                      return ok;
                                                        }

                                                </script>
                                      

                                      <form name="formulaire"  method="POST" action="ajouteroffree.php" ">

                                       

                                
                                                <div class="form-group row">
                                                     <label class="col-2 col-form-label">Nom d'offre</label>
                                                        <div class="col-5">
                                                            <input required type="text" class="form-control" placeholder="Nom d'offre"
                                                               name="nom" onblur="queDesLettres(this);" >
                                                             
                                                        </div>
                                                </div>


                                                <div class="form-group row">
                                                        <label class="col-2 col-form-label">ID_Produit </label>
                                                     <div class="col-5">




                                                  <?php 
                                                   require '../config.php';
                                                                
                                                    $bdd=config::getConnexion();
                                                    $q=$bdd->prepare("select produit_id , produit_nom from produit ");
                                                    $q->execute();
                                                    $listeproduit=$q->fetchAll();
                                                   ?>

                              <select  required name="produit_id" class="form-control">
                                      
                                      <option value=""> --Selectionner un produit--</option>

                                        <?PHP
                                    foreach($listeproduit as $row){
                                        ?>
                                        <option  value="<?PHP echo $row['produit_id']; ?>"> <?PHP echo $row['produit_nom'] ; ?>
                                        </option>
                                        <?PHP } ?>
                              </select>

                                                 </div>
                                                          
                                                          
                                                </div>



                                                <div class="form-group row">
                                                        <label class="col-2 col-form-label">Pourcentage de la remise </label>
                                                        <div class="col-5">
                                                            <input min="5" max="75" required type="number" class="form-control" placeholder="pourcentage de la remise"
                                                            name="pourcentage"  > 

                                                        </div>          
                                                </div>


                                                 
                                            

                                                   <p align="center">
                                           
                                                    <button  type="submit"  name="Ajouter" class="btn btn-primary btn-bordred waves-effect w-md waves-light m-b-5">Ajouter offre</button>

                                              </form>
                        
                                
                                             </div>

                                    <!-- end row -->



                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2016 - 2018 © Adminto. Coderthemes.com
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <?php include 'notification-bar.php' ?>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


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
        <script src="assets/js/notification.js"></script>

    </body>
</html>