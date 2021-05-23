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

if(isset($_REQUEST['login'],$_REQUEST['fonction'],$_REQUEST['password']))
{
// récupérer login  $_REQUEST['type'],
$login = stripslashes($_REQUEST['login']);
$login = mysqli_real_escape_string($conn, $login); 
// récupérer societe
$fonction = stripslashes($_REQUEST['fonction']);
$fonction = mysqli_real_escape_string($conn, $fonction);
// récupérer le mot de passe 
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($conn, $password);

// récupérer le type (agent|admin|fournisseur|ordonnanceur )
$type = stripslashes($_REQUEST['type']);
$type = mysqli_real_escape_string($conn, $type);

      if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM agents WHERE login='$login'")) !=0 )
      {
        echo '<div class="sucess">
        "Ce Login est déjà utilisé par un autre utilisateur, veuillez en choisir un autre svp." <br>
        cliquez ici pour Retourner  <a href="gestion_agents.php">Retour</a> '  ;
      }
      else 
      {
        $query = "INSERT into `agents` (login, fonction, type,  password) VALUES ('$login', '$fonction', '$type', '$password')";

        $result = mysqli_query($conn, $query);

                  if($result)
                  {
                    header("Location: gestion_agents.php");
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
<legend> Ajouter un Agent  </legend>

<div class="form-group">
<input type="text" class="form-control" name="login" placeholder="login" required />
</div>

<div class="form-group">
<input type="text" class="form-control" name="fonction" placeholder="fonction" required />
</div>

<div class="form-group">
    <select class="form-control" name="type" id="type" required >
        <option value="" disabled selected>Type</option>
        <option value="Agent">Agent</option>
        <option value="Ordonnanceur">Ordonnanceur</option>
    </select>
</div>

<div class="form-group">
<input type="password" class="form-control" name="password" placeholder="Mot de passe" required />
</div>

<div class="form-group">
<input type="submit" name="submit" value="Ajouter un Agent" class="btn btn-primary" />
</div>

<legend>Pas maintenant? </legend>
<a href="gestion_agents.php" class ="btn btn_info" >Retournez-vous ici</a>

</fieldset>
</form>
</div>

<?php 
}
?>

</body>
</html>