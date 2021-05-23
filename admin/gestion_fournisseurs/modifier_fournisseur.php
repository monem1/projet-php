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
if(!isset($_SESSION['login'])) 
{
    header('Location: ../../login.php');
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

$login = '';
$societe = '';
$password = '';

if (isset($_POST['update'] ))
{
$id = $_POST['idf'] ;
$login = $_POST['login'];
$societe = $_POST['societe'];
$password = md5($_POST['password']);
 
//updating the table  type='$type'
$result = mysqli_query($conn, "UPDATE fournisseurs SET login='$login', societe='$societe', password=' $password' WHERE idf=$id");
header("Location: gestion_fournisseurs.php");
}


?>

<?php

$id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM fournisseurs WHERE idf=$id");
 
while($row = mysqli_fetch_array($result , MYSQLI_ASSOC ))
{
$login = $row['login'];
$societe = $row['societe'];
$password = $row['password'];
}

?>
                            <br><br>
<div class="container">
<form  action="modifier_fournisseur.php" method="post">

<center>
<fieldset>
<legend> Modifier le Fournisseur <?php echo $login ; ?> </legend>

<div class="form-group">
<input type="text" class="form-control" name="login" value="<?php echo $login ; ?> " placeholder="login" required  />
</div>

<div class="form-group">
<input type="text" class="form-control" name="societe"  value="<?php echo $societe ; ?> "placeholder="societe" required />
</div>
 
<div class="form-group">
<input type="password" class="form-control" name="password" placeholder="Mot de passe" required />
</div>

<div class="form-group">
<input type="hidden" name="id" value=<?php echo $_GET['id'];?>   > 
<input type="submit" name="update" value="Modifier le fournisseur" class="btn btn-secondary" />
</div>


<legend>Pas maintenant? </legend>
<a href="gestion_fournisseurs.php" class ="btn btn_info">Retournez-vous ici</a>


</fieldset>
</form>
</div>

</body>
</html>