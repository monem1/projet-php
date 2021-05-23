<?php
include('connexion/config.php');
session_start();


function test_input($data) 
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}


$login = $password =''; 
$b = true;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
        if(isset($_POST['login']))
		$login=test_input($_POST['login']);
		else $b=false;

        if(isset($_POST['password']))
		$password=test_input($_POST['password']);
		else $b=false;

        if(isset($_POST['type']))
		$type=test_input($_POST['type']);
	    else $b=false;
						
///////////////////////////////////////////////////
$tablename='';$id='';

                if($type=='Agent')
                {
                $id='ida';
                $tablename='agents';
                }
                else if($type=='Fournisseur')
                {
                $id='idf';
                $tablename='fournisseurs';
                }
//////////////////////////////////////////////////

$q="select $id,password from $tablename where login='$login'";
//echo $q;
            $result=$conn->query($q);
            if($result==true)
            {
            $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
            }
            else
            {
			header('Location: login.php');
            }
///////////////////////////////////////////////////

    if($row['password']== $password)
    {
        $_SESSION['login']=$login;
        $_SESSION['type']=$type;
            
            if($id=='ida' && $b==true)
            {
                $_SESSION['id']=$row['ida'];

                    switch ($_SESSION['login']) 
                    {
                    case 'ADMIN':
                    header('location: admin/home.php'); 
                    break;
      
                    case 'BOC':
                    header('location: agents/Agent_BOC.php'); 
                    break;

                    case 'TRI':
                    header('location: agents/Agent_TRI.php'); 
                    break;

                    case 'APPRO_BDC':
              		header('location: agents/Agent_APPRO_BDC.php'); 
              		break;

              		case 'CON':
              		header('location: agents/Agent_CON.php'); 
              		break;

              		case 'COM':
              		header('location: agents/Agent_COM.php'); 
              		break;

              		case 'TRE':
              		header('location: agents/Agent_TRE.php'); 
              		break;

                    default:
            header('location:chercher_Facture_ordonnanceur.php');
                    break;  
                    }

            }
////////////////////////////////////////////////////////////////

            if($id=='idf' && $b==true)
            {
                $_SESSION['id']=$row['idf'];
                header('Location: chercher_Facture_fournisseur.php');
            }

///////////////////////////////////////////////////////
        }

        else
        {
             $message = "Login ou  mot de passe  incorrect.";
        }

//////////////////////////////////////////////////////





}
?>







<!DOCTYPE html>
<html>

<head>
  <title>SUIVIE  DES FACTURES </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--<link rel="stylesheet" href="style.css" /> -->

</head>

<body>
	

<br><br>

<div class="container">

<form class="box" action="" method="post" name="login">

<center>
<fieldset>
    <legend> Connexion  </legend>

<div class="form-group">
<input type="text"     class="form-control" name="login"    placeholder="login"  required>
</div>


<div class="form-group">
<input type="password" class="form-control" name="password" placeholder="Mot de passe"  required>
</di>

<br>

<div class="form-group">
    <select class="form-control" name="type" id="type" required >
        <option value="" disabled selected>Type</option>
       
        <option value="Agent">Agent</option>
        <option value="Fournisseur">Fournisseur</option>
    </select>
</div> 

<div class="form-group">
    <input type="submit"   class="btn btn-primary"name="submit"   value="Connexion " >
</div>

<br>
  
<legend> Vous êtes nouveau  ici?  </legend>


<a href="register_Agent.php" class ="btn btn_info" >S'inscrire / Agent</a>

<br>

<a href="register_Fournisseur.php" class ="btn btn_info">S'inscrire / Fournisseur</a>


</center>

<?php 
if (! empty($message)) 
{ 
?>

<p class="errorMessage"><?php echo $message; ?></p>

<?php
} 
?>


 </fieldset>
</form>


</div>

</body>
</html>


