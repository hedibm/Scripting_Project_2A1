
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


        <!-- Sweet Alert css -->
        <link href="assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>


    </head>

   <script type="text/javascript">
       
     //Ajax
    /*    $('#ajax-alert').click(function () {
            swal({
                title: 'Numero Telephone',
                input: 'Numero telephone',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                preConfirm: function (email) {
                    return new Promise(function (resolve, reject) {
                        setTimeout(function () {
                            if (email === 'taken@example.com') {
                                reject('This email is already taken.')
                            } else {
                                resolve()
                            }
                        }, 2000)
                    })
                },
                allowOutsideClick: false
            }).then(function (email) {
                swal({
                    type: 'success',
                    title: 'Ajax request finished!',
                    html: 'Submitted email: ' + email
                })
            })
        });*/



   </script>

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
                                <h4 class="page-title">Liste des offres</h4>
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
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b></b></h4> 

                                    <?php
                                         

                                        require '../core/offremanage.php';
                                       
                                        $off= new OffreManage();
                                        $liste=$off->afficherOffre();

                                    ?>
                                    
                                                                    
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>
                                        <tr>
                                            <th>ID_Offre</th>
                                            <th>Nom d'Offre</th>
                                            <th>ID_Produit</th>
                                            <th>Pourcentage de la remise</th>

                                        </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                    foreach ($liste as $val) 
                                    {?>
                                        <tr>
                                            
                                            <td> <?php echo $val['idOffre']?> </td>
                                            <td> <?php echo $val['nom']?> </td>
                                            <td> <?php echo $val['produit_id']?> </td>
                                            <td> <?php echo $val['pourcentage']?> </td>



                                             <td> 
                                                <form method="POST" action="apismsphp.php">
                                           
                                             <button  class="btn btn-icon waves-effect waves-light btn-success m-b-5" id="ajax-alert" > <i class="fa fa-envelope-o m-r-5"></i>  SMS </button> 

                                             <input type="hidden" name="idoffre"   value="<?php echo $val['idOffre']?>" >

                                                 </form>

                                            </td>


                                            <td>

                                            <form method="GET" action="ViewOffres.php">

                                                <button  class="btn btn-secondary waves-effect m-b-5">  <i class="fa fa-rocket m-r-5"></i>  view </button>

                                                <input type="hidden" name="idoffre"   value="<?php echo $val['idOffre']?>">
                                                
                                            </form>
                                           
                                            </td>




                                            <td>
                                             <a href="ModifierOffre.php?id=<?php echo $val['idOffre'] ; ?>">
                                                    
                                            <button  class="btn btn-icon waves-effect waves-light btn-warning m-b-5">  <i class="fa fa-wrench"></i>  </button>

                                            </td>
                                                   

                                               <?php  echo "<td><a href=supprimerOffre.php?idOffre=".$val['idOffre']."><button type='button' class='btn btn-icon waves-effect waves-light btn-danger m-b-5'><i class='fa fa-remove'></i></button></td>"; ?>

                                       
                                        </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    

                                 </div>
                            </div>
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