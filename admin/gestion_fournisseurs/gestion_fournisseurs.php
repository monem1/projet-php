<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: ../../login.php");
    exit(); 
  }
?>
<?php
require('../../connexion/fonction_bare_des_pages.php');
?>
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>SUIVIE FACTURES</title>
<link href="../../css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

             			<br>                
<div class="container"> 
<center>
    <h2> TOUS LES FOURNISSEURS  DE L 'APPLICATION </h2>  
</center>

<a href="../home.php"class="btn btn-dark float-right"> Home </a>
						<br><br>

<a href="chercher_fournisseur.php" class="btn btn-warning float-right">search </a> 
					<br>

<a href="ajouter_fournisseur.php" class="btn btn-primary">Ajouter Fournisseur </a>

<div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <th>ID</th>  
                <th>LOGIN</th>
                <th>SOCIETE</th>
                <th colspan = '2'>Action  </th>
            </thead>
<tbody>

<?php
// on se connecte à notre base
  include '../../connexion/config.php'; 

// on prépare une requête permettant de calculer le nombre total d'éléments qu'il faudra afficher sur nos différentes pages
$sql  = 'SELECT count(*) FROM fournisseurs';

// on exécute cette requête
$resultat = mysqli_query($conn ,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($conn));

// on récupère le nombre d'éléments à afficher
$nb_total = mysqli_fetch_array($resultat);

// on teste si ce nombre de vaut pas 0
if (($nb_total = $nb_total[0]) == 0) {
	echo 'Aucune réponse trouvée';
}
else 
{
	// sinon, on regarde si la variable $debut (le x de notre LIMIT) n'a pas déjà été déclarée, et dans ce cas, on l'initialise à 0
	if (!isset($_GET['debut'])) $_GET['debut'] = 0;
	$nb_affichage_par_page = 6;

	// Préparation de la requête avec le LIMIT
	$sql = 'SELECT * FROM fournisseurs ORDER BY idf DESC LIMIT '.$_GET['debut'].','.$nb_affichage_par_page;

	// on exécute la requête
	$req = mysqli_query($conn ,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($conn));

	// on va scanner tous les tuples un par un
	while ($data = mysqli_fetch_array($req)) 
	{
	// on affiches les résultats dans la <table
		echo'<tr>';
echo'<td >' . $data['idf'] . '</td><p>';
echo'<td>' . $data['login'] . '</td><p>';
echo'<td>' . $data['societe'] . '</td><p>';

// un autre td pour le bouton de modifier
echo '<td>';
echo '<a class="btn btn-secondary"  href="modifier_fournisseur.php?id= '  . $data['idf'] . ' " > 
      Modifier Fournisseur   </a> ';
echo '</td>';

// un autre td pour le bouton de suppression
echo'<td>';
echo'<a class="btn btn-danger" href="supprimer_fournisseur.php?id= ' . $data['idf'] . ' " >  Supprimer Fournisseur   </a>  ';
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