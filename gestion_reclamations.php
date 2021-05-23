<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit(); 
  }
?>
<?php
require('../connexion/fonction_bare_des_pages.php');
?>

<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>SUIVIE  FACTURES</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" >  
</head>


<body>

                                <br/>
<div class="container"> 
<center>
  <h2> TOUS LES FACTURES ENREGISTRER  DANS L 'APPLICATION </h2> </center>
  
<a href="home.php" class="btn btn-dark float-right"> Home  </a>

								<br><br>

<a href="chercher_facture.php" class="btn btn-warning float-right">search </a> 
		

<div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
               <th>Nboc</th>
                <th>Societe</th>
                <th>Montant</th>
                <th>Creation</th>
                <th>Etape</th>
                <th>Ordonnanceur</th>  
                <th colspan = '3'>Action  </th>
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
	$sql = 'SELECT * FROM factures ORDER BY id DESC LIMIT '.$_GET['debut'].','.$nb_affichage_par_page;

	// on exécute la requête
	$req = mysqli_query($conn ,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());

	// on va scanner tous les tuples un par un
	while ($data = mysqli_fetch_array($req)) 
	{
		// on affiches les résultats dans la <table>
		
echo'<tr>';
//echo' <td>' . $row['id'] . '</td><p>';
echo'<td>' . $data['Nboc'] . '</td><p>';
echo'<td>' . $data['Societe'] . '</td><p>';
echo'<td>' . $data['Montant'] . '</td><p>';
echo'<td>' . $data['Creation'] . '</td><p>';
echo'<td>' . $data['Etape'] . '</td><p>';


echo'<td>' . $data['Ordonnanceur'] . '</td><p>';

echo '<td>';
echo '<a class="btn btn-warning" href="../service_ND.php?id= ' . $data['id'] . ' "> RECLAMER </a> ';
echo '</td>';

echo'<td>';
echo '  <a class="btn btn-success"   href="../passer_Facture.php?id= ' . $data['id'] . '  " >REAFFECTER  </a>  ';
echo '</td>';


echo '<td>';
echo '  <a class="btn btn-danger"  href="supprimer_Facture.php?id= ' . $data['id'] . '  " > SUPPRIMER </a> ';
echo '</td>';
echo '</td>';
echo '</tr>';
	}

	// on libère l'espace mémoire alloué pour cette requête
	mysqli_free_result ($req);
	echo '</table>';

	// on affiche enfin notre barre
	echo ''.barre_navigation($nb_total, $nb_affichage_par_page, $_GET['debut'], 3).'';
}
// on libère l'espace mémoire alloué pour cette requête
mysqli_free_result ($resultat);
// on ferme la connexion à la base de données.
mysqli_close ($conn);
echo '</table>';
?>

</body>
</html>