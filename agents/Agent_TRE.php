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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>GESTION MEMEBRES</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

                             <br/>
                    <div class="container">

<div class="row">  <h2>Bureau De TRESORERIE</h2>   </div>

  <a href="../logout.php"     class="btn btn-dark float-right"> DECONNEXION    </a>
   
<div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                
               <th>Nboc</th>
                <th>Societe</th>
                <th>Montant</th>
                <th>Creation</th>
                <th>Etape</th>
                <th>Ordonnanceur</th>  
             
                <th colspan = '2'>Action  </th>
            </thead>
                
     

            <tbody>
<?php 

$sql = "SELECT * FROM factures   WHERE Etape LIKE'%O' ORDER BY id DESC " ; 

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
echo '<a class="btn btn-warning" href="../reclamation_Facture.php?id= ' . $row['id'] . ' "> RECLAMER </a> ';
echo '</td>';

echo'<td>';
echo '  <a class="btn btn-success"   href="../passer_Facture.php?id= ' . $row['id'] . '  " >PASSER  </a>  ';
echo '</td>';



   
}  



?>

            </tbody>

        </table>
</div>


                                        </div>

</body>
</html>