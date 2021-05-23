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


if (isset( $_REQUEST['Ordonnanceur'] ))
{ 

   
  $ordonnanceur = stripslashes($_REQUEST['Ordonnanceur']);
  $ordonnanceur = mysqli_real_escape_string($conn, $ordonnanceur);
   
  }          

else

{
?>




<br>
<br>
<div class="container">


<form  action="afficher_Facture_ordonnanceur.php" method="post">


<center>
<fieldset>
    <legend> LES  FACTURES  A  SIGNER  </legend> 
    


<div class="form-group"> 
<input type="text"class="form-control" name="Ordonnanceur"placeholder="Ordonnanceur"required />
 
</div>
  
                         <br><br>
  
<div class="form-group">
    <input type="submit" name="submit" 
  value="CHERCHER "  class="btn btn-primary" />
</div>
 
    <p class="box-register"> 
  <a href="logout.php" class ="btn btn_info" >Quittez</a></p>

</fieldset>
</form>
</div>
<?php } ?>
</body>
</html>



