<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit(); 
  }
?>
<?php include '../connexion/config.php'; ?>

<!DOCTYPE html>
<html>

<?php require('../pages/header.php') ?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php require('../pages/sidebaragent.php') ;?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
			 <!-- Topbar -->
			 <?php require('../pages/navbar.php');?>
                <!-- End of Topbar -->
                <div class="container-fluid"> 
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bureau d'ordre centrale</h6>
                       <br>
                <div class="container"> 
                  <a href="ajouter_facture.php" class="btn btn-primary">Ajouter une facture</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                    <tr>
                     <th>Nboc</th>  
                     <th>Societe</th>
                     <th>Montant</th>
                     <th>Creation</th>
                     <th>Etape</th>
                     <th>Modifier</th>
                     <th>Reclamer</th>
                     <th>Passer</th>
                    </tr>
                   </thead>
                  <tbody>

<?php 
$sql = "SELECT * FROM factures   WHERE Etape LIKE 'B%' ORDER BY id DESC " ; 
$result = mysqli_query($conn ,  $sql);
mysqli_fetch_All($result ,MYSQLI_ASSOC);
foreach ( $result as $row) 
{ 
//on cree les lignes du tableau avec chaque valeur retournée
echo' <tr>';
echo'<td>' . $row['Nboc'] . '</td><p>';
echo'<td>' . $row['Societe'] . '</td><p>';
echo'<td>' . $row['Montant'] . '</td><p>';
echo'<td>' . $row['Creation'] . '</td><p>';
echo'<td>' . $row['Etape'] . '</td><p>';

echo '<td>';
echo '  <a class="btn btn-info btn-circle btn-sm"  href="modifier_facture.php?id= ' . $row['id'] . '  " >
<i class="fas fa-edit"></i></a>
</a> ';
echo '</td>';
echo '<td>';
echo '<a class="btn btn-primary btn-circle btn-sm" href="../service_ND.php?id= ' . $row['id'] . ' "  id="messagesDropdown" role="button"><i class="fas fa-envelope fa-fw"></i></a> ';
echo '</td>';
echo'<td>';
echo '  <a class="btn btn-success btn-circle btn-sm"   href="../passer_Facture.php?id= ' . $row['id'] . '  " ><i class="fas fa-check"></i></a>  ';
echo '</td>';

   
}  
?>
                  </tbody>
                  </table>
                </div>
                </div>
<?php require('../pages/footer.php');?>
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