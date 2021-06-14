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
                <h6 class="m-0 font-weight-bold text-primary">Direction Régional de Tunis</h6>
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
                     <th>Ordonnanceur</th>
                    
                     <th>Reclamer</th>
                     <th>Passer</th>
                    </tr>
                   </thead>
                  <tbody>

<?php 
$sql = "SELECT * FROM factures WHERE Ordonnanceur='DRTTU' AND Etape LIKE 'O%'  ORDER BY id DESC " ;

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
echo'<td>' . $row['Ordonnanceur'] . '</td><p>';




echo '<td>';
echo '<a class="btn btn-primary btn-circle btn-sm"" href="../agents/reclamtion.php?id= ' . $row['id'] . ' "  id="messagesDropdown" role="button"><i class="fas fa-envelope fa-fw"></i></a> ';
echo '</td>';

echo'<td>';
echo '  <a class="btn btn-success btn-circle btn-sm"   href="../passer_Facture.php?id= ' . $row['id'] . '  " ><i class="fas fa-check"></i></a>  ';
echo '</td>';



echo '</tr>';
   
}  

?>

            </tbody>

        </table>
</div>
<?php require('../pages/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php require('../pages/formlogout.php') ?>
</body>
</html>