<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
require('connexion/config.php');



if (isset( $_REQUEST['Societe'] ))
{  
  $societe = stripslashes($_REQUEST['Societe']);
  $societe = mysqli_real_escape_string($conn, $societe);
  
} 
  
else


{
?>



<br>
<br>
<div class="container">

<form  action="afficher_Facture_fournisseur.php" method="post">
 
<center>
<fieldset>
    <legend> ETAT DE VOS FACTURES  </legend> 
 </center>   

<br>
<label class="control-label" style="text-align: left;">ENTREZ NOM SOCIETE </label>
 

  <br>

<div class="form-group"> 
<input type="text"class="form-control" name="Societe"placeholder="societe"required />
</div> 

  
                 <br><br>
  
<center>
<div class="form-group">  
    <input type="submit" name="submit" 
  value="CHERCHER " class="btn btn-primary" />
</div>
</center>
 
</fieldset>
</form>
</div>

<?php } ?>
</body>
</html>



