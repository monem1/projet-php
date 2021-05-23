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
    header('Location: ../login.php');
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
$fonction = '';
$type = '';
$password = '';


if (isset($_POST['update'] ))
{
$id = $_POST['id'] ;
$login = $_POST['login'];
$fonction = $_POST['fonction'];
$type = $_POST['type'];
$password = md5($_POST['password']);

//updating the table type='$type'
$result = mysqli_query($conn, "UPDATE agents SET login='$login', fonction='$fonction'  , type='$type' , password= ' $password'    WHERE id=$id");    
header("Location: gestion_agents.php");  

}

?>



<?php
$id = $_GET['id'];
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM agents WHERE id=$id");

while($row = mysqli_fetch_array($result , MYSQLI_ASSOC ))
{
$login = $row['login'];
$fonction = $row['fonction'];
$type = $row['type'];
$password = $row['password'];
}
?>
                        <br><br>

<div class="container">
<form  action="modifier_agent.php" method="post">

<center>
<fieldset>
    <legend> Modifier l' Agent  <?php echo $login ; ?> </legend>

<div class="form-group">
<input type="text" class="form-control" name="login" value="<?php echo $login ; ?> " placeholder="login" required  />
</div>

<div class="form-group">  
<input type="text" class="form-control" name="fonction"  value="<?php echo $fonction ; ?> "placeholder="societe" required />
</div>
 
 <div class="form-group"> 
<input type="password" class="form-control" name="password" placeholder="Mot de passe" required />
</div>

<div class="form-group"> 
<input type="hidden" name="id" value=<?php echo $_GET['id'];?>   > 
<input type="submit" name="update" value="Modifier l 'Agent" class="btn btn-secondary" />
</div>

<legend>Pas maintenant?  </legend>
<a href="gestion_agents.php" class ="btn btn_info">Retournez-vous ici</a>

</fieldset>
</form>
</div>

</body>
</html>