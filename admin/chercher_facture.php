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

  require('../connexion/config.php');
  
if (isset($_GET['search'])) 
{  
      $requete_user = $_GET['search'];
      $sql = "SELECT * FROM factures WHERE Societe LIKE '%$requete_user%'";
      $result = mysqli_query($conn, $sql);

        if ($row =mysqli_fetch_array($result)) 
        {
       
        echo "
            <div class='container'>
            <div class='row'>
            <div class='table-responsive'>
        <table class='table table-hover table-bordered'>
            <thead>
                <th>ID</th>  
                <th>Nboc</th>
                <th>Societe</th>
                <th>Montant</th>
                <th>Creation</th>
                <th>Etape</th>
                <th>Ordonnanaceur</th>
                 <th colspan = '3'>Action  </th> 
            </thead>  "  ;
          echo'<tr>';
          echo'<td >' . $row['id'] . '</td><p>';
          echo'<td>' . $row['Nboc'] . '</td><p>';
          echo'<td>' . $row['Societe'] . '</td><p>';
          echo'<td>' . $row['Montant'] . '</td><p>';
          echo'<td >' . $row['Creation'] . '</td><p>';
          echo'<td>' . $row['Etape'] . '</td><p>';
          echo'<td>' . $row['Ordonnanceur'] . '</td><p>';

echo '<td>';
echo '<a class="btn btn-warning" href="../service_ND.php?id= ' . $row['id'] . ' "> RECLAMER </a> ';
echo '</td>';

echo'<td>';
echo '  <a class="btn btn-success"   href="../passer_Facture.php?id= ' . $row['id'] . '  " >REAFFECTER  </a>  ';
echo '</td>';


echo '<td>';
echo '  <a class="btn btn-danger"  href="../supprimer_Facture.php?id= ' . $row['id'] . '  " > SUPPRIMER </a> ';
echo '</td>';

          echo'</tr>';
        } 
        else
        {
          echo " 
      <div id='main-content'>
      <div class='container'>
        <div class='row'>
          <div class='col-sm-4 col-sm-offset-3'>
              <div class='panel panel-default'>
               <div class='panel-heading'>
                <h3 style='text-align:center;' class='panel-title'><b>resultal trouver pour <em style='color:#001a33'>$requete_user</em>  </b></h3>
            
              </div>
            <div class='panel-body'>
                 <p><i style='color:orange;' class='fa fa-frown-o fa-2x' aria-hidden='true'></i>
 Notre système ne reconnais pas => <em style='color:#001a33; font-size:30px;'>$requete_user</em>  </b></>
                <hr> 
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>";
     }

}


?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SUIVIE FACTURES</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" >  
  </head>

  <body >
                               <br>                
<div class="container">
         
<center>
    <h2> CHERCHER UNE FACTURE  DANS L'APPLICATION </h2> 
</center>               
 
                
<a href="home.php" class="btn btn-dark float-right"> Home </a>
                           <br><br>
                                   
<form action="chercher_facture.php" method="GET" >

<div class="input-group">
<input name = "search" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon"  required />


<button name="search" type="button" class="btn btn-outline-primary">search</button>
     
</div>
 </form> 
</div>




</body>
</html>













