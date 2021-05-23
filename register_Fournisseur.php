
<!DOCTYPE html>
<html>
<head>
  <title>SUIVIE  DES FACTURES </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php 
session_start();
include('connexion/config.php');


if ( isset($_REQUEST['login'], $_REQUEST['societe'], $_REQUEST['password'])  )
{
// récupérer login 
$login = stripslashes($_REQUEST['login']);
$login = mysqli_real_escape_string($conn, $login); 
// récupérer societe 
$societe = stripslashes($_REQUEST['societe']);
$societe = mysqli_real_escape_string($conn, $societe);
// récupérer  mot de passe 
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($conn, $password);


      if( isset($_POST['submit']))
      {
		  $sql = "insert into fournisseurs(login,societe,password) values('$login', '$societe','$password')";
		  $res=$conn->query($sql);
		  
      $sql1="select idf from fournisseurs where login='$login'";
      $result=$conn->query($sql1);

                if($result)
                {
                echo "<div class='sucess'>
                <h3>Vous êtes nouveau Fournisseur inscrit avec succès.</h3>
                <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
                </div>";
                }

      $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
      $_SESSION['login']=$login;
      $_SESSION['type']='Fournisseur';
		  $_SESSION['id']=$row['idf'];
      }


}

else

{

?>


<body>

<br><br>

<div class="container">
<form class="box" action="" method="post" name="login">


<center>
<fieldset>
    <legend> S'inscrire Fournisseur  </legend>


<div class="form-group">
<input type="text"   class="form-control" name="login"  placeholder="login" required />
</div>

<div class="form-group">
<input type="text"   class="form-control" name="societe" placeholder="societe" required />
</div>

<div class="form-group">
<input type="password" class="form-control" name="password" placeholder="Mot de passe"required />
</div>

<div class="form-group">
<input type="submit"  class="btn btn-primary" name="submit" value="S'inscrire"  />
</div>

<br>

<legend>Déjà inscrit? </legend>
<a href="login.php" class ="btn btn_info" >Connectez-vous ici</a></p>

</fieldset>
</form>
</div>
<?php 
} 
?>

</body>
</html>



 