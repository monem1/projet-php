 <?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>suivie factures</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php require('pages/sidebaragent.php') ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
			 <!-- Topbar -->
			 <?php require('pages/navbarpasser.php');?>
       <div class="container-fluid">
<?php
require('connexion/config.php');

     $ordonnanceur = '';

  if (isset($_POST['update'] ))
  {
    $id = $_POST['id'] ;
     $ordonnanceur = $_POST['Ordonnanceur'];
        //updating the table
        $result = mysqli_query($conn, "UPDATE factures SET 
          Ordonnanceur='$ordonnanceur' WHERE id=$id");
         header("Location: agents/Agent_TRI.php");
}



?>
<?php

      $id = $_GET['id'];
 
      //selecting data associated with this particular id
      $result = mysqli_query($conn, "SELECT * FROM factures WHERE id=$id");
 
    while($row = mysqli_fetch_array($result , MYSQLI_ASSOC ))
{
     $ordonnanceur = $row['Ordonnanceur'];   
}

?>
<?php

$ordo  = mysqli_query($conn , "SELECT fonction From agents WHERE type LIKE 'O%' ORDER BY fonction")
?>
<form class="user" method="POST">
  <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <h1 class="box-title">Vos ordonnancement</h1> 
         <label class="btn btn-primary">Ordonnanceur </label>
         <div class="form-group">
           <select class="form-control " name="Ordonnanceur" id="type" required >
             <option disabled selected >*******</option>
             <?php
               while ($d = mysqli_fetch_array($ordo , MYSQLI_ASSOC ))
                { 
             ?>
              <option><?php echo '<td>'. $d['fonction'] . '</td>' ; ?>   </option>
              <?php } ?>  
            </select>
         </div>
       <div class="form-group">
         <input type="hidden" name="id" value=<?php echo $_GET['id'];?>    > 
        </div>
        <div class="form-group">
          <input type="submit"   class="btn btn-primary btn-user btn-block" name="update"   value="Envoyez la Facture " >
          <legend>Pas maintenant?</legend> 
          <a href="agents/Agent_TRI.php" class ="btn btn_info" >Retournez-vous ici</a>
        </div>
</form>
</div>
            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            <?php require('pages/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>