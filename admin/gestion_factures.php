<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit(); 
  }
?>
<?php
require('../connexion/fonction_bare_des_pages.php');
?>
<!DOCTYPE html>
<html>
<?php require('../pages/header.php');?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php require('../pages/sidebar.php') ;?>
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
                <h6 class="m-0 font-weight-bold text-primary">liste des factures</h6>
				<div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                    <th>Nboc</th>
                    <th>Societe</th>
                    <th>Montant</th>
                    <th>Creation</th>
                    <th>Etape</th>
                    <th>Ordonnanceur</th>  
                    <th>Reclamer</th>
                    <th>Passer</th>
                    <th>Supprimer</th>
                   </thead>
                  <tbody>             
<?php
// on se connecte à notre base
  include '../connexion/config.php'; 

// on prépare une requête permettant de calculer le nombre total d'éléments qu'il faudra afficher sur nos différentes pages
$sql  = 'SELECT count(*) FROM factures';

// on exécute cette requête
$resultat = mysqli_query($conn ,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($conn));

// on récupère le nombre d'éléments à afficher
$nb_total = mysqli_fetch_array($resultat);

// on teste si ce nombre de vaut pas 0
if (($nb_total = $nb_total[0]) == 0) 
{
	echo 'Aucune réponse trouvée';
}
else 
{
	// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas déjà été déclarée, et dans ce cas, on l'initialise à 0
	if (!isset($_GET['debut'])) $_GET['debut'] = 0;

	$nb_affichage_par_page = 6;

	// Préparation de la requête avec le LIMIT
	$sql = 'SELECT * FROM factures';

	// on exécute la requête
	$req = mysqli_query($conn ,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());

	// on va scanner tous les tuples un par un
	while ($data = mysqli_fetch_array($req)) 
	{
		// on affiches les résultats dans la <table>
echo'<tr>';
echo'<td>' . $data['Nboc'] . '</td><p>';
echo'<td>' . $data['Societe'] . '</td><p>';
echo'<td>' . $data['Montant'] . '</td><p>';
echo'<td>' . $data['Creation'] . '</td><p>';
echo'<td>' . $data['Etape'] . '</td><p>';

echo'<td>' . $data['Ordonnanceur'] . '</td><p>';

echo '<td>';
echo '<a class="" href="../service_ND.php?id= ' . $data['id'] . ' "  id="messagesDropdown" role="button"><i class="fas fa-envelope fa-fw"></i></a> ';
echo '</td>';
echo'<td>';
echo '<a class="btn btn-success btn-circle btn-sm" href="../passer_Facture.php?id= ' . $data['id'] . '  ">
<i class="fas fa-check"></i>';
echo '</td>';
echo '<td>';
echo '  <a class="btn btn-danger btn-circle btn-sm"  href="supprimer_Facture.php?id= ' . $data['id'] . '  " >
<i class="fas fa-trash"></i></a> ';
echo '</td>';
echo '</td>';
echo '</tr>';
	}

	// on libère l'espace mémoire alloué pour cette requête
	mysqli_free_result ($req);
	echo '</table>';
}
// on libère l'espace mémoire alloué pour cette requête
mysqli_free_result ($resultat);
// on ferme la connexion à la base de données.
mysqli_close ($conn);
echo '</table>';
?>
 <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    </tbody>
    </table>
</div>
</div> 
</div>
</div> 
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

 <!-- Footer -->
 <?php require('../pages/footer.php')?>
            <!-- End of Footer -->
         </div>

</body>
</html>