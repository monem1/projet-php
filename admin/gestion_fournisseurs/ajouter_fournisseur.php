<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["login"])){
    header("Location: ../../login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>

<head>
  <title>SUIVIE FACTURES</title>
<link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
require('../../connexion/config.php');

if(isset($_REQUEST['login'],$_REQUEST['societe'],$_REQUEST['password']))
{
// récupérer login  $_REQUEST['type'],
$login = stripslashes($_REQUEST['login']);
$login = mysqli_real_escape_string($conn, $login); 
// récupérer societe
$societe = stripslashes($_REQUEST['societe']);
$societe = mysqli_real_escape_string($conn, $societe);
// récupérer le mot de passe 
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($conn, $password);

      if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM fournisseurs WHERE login='$login'")) !=0 )
      {
        echo '<div class="sucess">
        "Ce Login est déjà utilisé par un autre utilisateur, veuillez en choisir un autre svp." <br>
        cliquez ici pour Retourner  <a href="gestion_fournisseurs.php">Retour</a> '  ;
      } 
      else 
      {
        $query = "INSERT into `fournisseurs` (login, societe,  password) VALUES ('$login', '$societe', '$password ')";

        $result = mysqli_query($conn, $query);
                  if($result)
                  {
                    header("Location: gestion_fournisseurs.php");
                  }
      } 
}
else
{

?>

							<br><br>

<div class="container">
<form  action="" method="post">

<center>
<fieldset>
<legend> Ajouter un fournisseur  </legend>

    
<div class="form-group">
<input type="text" class="form-control" name="login" placeholder="login" required />
</div>

<div class="form-group">
<input type="text" class="form-control" name="societe" placeholder="societe" required />
</div>

<div class="form-group">  
<input type="password" class="form-control" name="password" placeholder="Mot de passe" required />
</div>

<div class="form-group">
<input type="submit" name="submit" value="Ajouter un Fournisseur" class="btn btn-primary" />
</div>

<legend>Pas maintenant?</legend>
<a href="gestion_fournisseurs.php" class ="btn btn_info">Retournez-vous ici</a>

</fieldset>
</form>
</div>

<?php 
}
?>

</body>
</html>