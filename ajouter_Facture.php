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

if (isset($_REQUEST['Nboc'], $_REQUEST['Societe'], $_REQUEST['Montant'],      $_REQUEST['Creation'],  $_REQUEST['Etape']  )  )
{ 

  $Nboc = stripslashes($_REQUEST['Nboc']);
  $nNboc = mysqli_real_escape_string($conn, $Nboc); 
  $Societe = stripslashes($_REQUEST['Societe']);
  $Societe = mysqli_real_escape_string($conn, $Societe);
  $Montant = stripslashes($_REQUEST['Montant']);
  $Montant = mysqli_real_escape_string($conn, $Montant);

 
   $Creation = isset($_POST['Creation']) ?    
   $_POST['Creation'] : date('Y-m-d');
  $Etape = stripslashes($_REQUEST['Etape']);
  $Etape = mysqli_real_escape_string($conn, $Etape);

 

  if(mysqli_num_rows  (mysqli_query(  $conn,"SELECT * FROM factures  WHERE Nboc='$Nboc'   " ))!=0 
    )
  


  {
          echo  '
          <div class="sucess">
          "Ce Numero de Facture BOC    est déjà assignéé à une autre facture, veuillez en choisir un autre svp."
            <br>
            cliquez ici pour Retourner
             <a href="ajouter_Facture.php">Retour</a>   '  ;        
  } 
  else 
     
   {   

        $sql = "INSERT INTO factures 
        (Nboc,Societe, Montant, Creation, Etape   ) 

        values('$Nboc', '$Societe', '$Montant', '$Creation', '$Etape'   )";
            $res = mysqli_query($conn, $sql);

            if($res==true)
            {
                 header('location: agents/Agent_BOC.php');
            }

 }

 

}

else

{
?>


<?php
$societes  = mysqli_query($conn , 'SELECT societe From fournisseurs ORDER BY societe') 
?>


                        <br>

<div class="container">

<form  action="" method="post">

<center>
<fieldset>
    <legend> Enregistrement Facture  </legend>

    
<div class="form-group">
<input type="text" class="form-control" name="Nboc" placeholder="Nboc" required />
</div>

</center>
 
<label class="control-label" style="text-align: left;">Societe </label>

<div class="form-group">
  <select  class="form-control" name="Societe">
    <?php
      while ($d = mysqli_fetch_array($societes , MYSQLI_ASSOC ))
       { 
    ?>
   
     <option><?php echo '<td>'. $d['societe'] . '</td>' ; ?>   </option>
     <?php } ?> 
  </select>
</div>

<br>

<div class="form-group">
<input type="text" class="form-control" name="Montant" placeholder="Montant" required />
</div>  
  
<label class="box-title">Creation</label> 

<div class="form-group">  
<input type="datetime-local" name="Creation"  class="form-control"  value="  <?=date('Y-m-d')?>     " >
</div>
 
<label class="box-title">Etape</label>
<div class="form-group">
  <select class="form-control" name="Etape">
          <option value="BOC" required >Bureau d'Ordre Centrale</option> 
  </select>
</div>

 <br> 


<center>
<div class="form-group">
    <input type="submit" name="submit" 
  value="ENREGISTRER LA FACTURE" class="btn btn-primary" />
</div>
  
      <legend>Pas maintenant? </legend>
  <a href="agents/Agent_BOC.php" class ="btn btn_info">Retournez-vous ici</a>  
</center>
</fieldset>
</form>
</div>

<?php } ?>
</body>
</html>



