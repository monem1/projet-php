 <?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
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

     $ordonnanceur = '';

  if (isset($_POST['update'] ))
  {

    $id = $_POST['id'] ;

     $ordonnanceur = $_POST['Ordonnanceur'];
 
        //updating the table
        $result = mysqli_query($conn, "UPDATE factures SET 
          Ordonnanceur='$ordonnanceur' WHERE id=$id");

         header("Location: agents/Agent_TRI.php");
}



?>
<?php

      $id = $_GET['id'];
 
      //selecting data associated with this particular id
      $result = mysqli_query($conn, "SELECT * FROM factures WHERE id=$id");
 
    while($row = mysqli_fetch_array($result , MYSQLI_ASSOC ))
{
     $ordonnanceur = $row['Ordonnanceur'];   
}

?>
<?php

$ordo  = mysqli_query($conn , "SELECT fonction From agents WHERE type LIKE 'O%' ORDER BY fonction")
?>





<br>
<br>
<div class="container">

<form  action="" method="post">
    
 <center>
<fieldset>
    <legend> VERS  ORDONNANCEMENT  </legend> 

</center>
 
  <br>

<label class="control-label" style="text-align: left;">ORDONNANCEUR </label>

<div class="form-group"> 
   <select  class="form-control" name="Ordonnanceur">

     <option>*******</option>
    <?php
      while ($d = mysqli_fetch_array($ordo , MYSQLI_ASSOC ))
       { 
    ?>
     <option><?php echo '<td>'. $d['fonction'] . '</td>' ; ?>   </option>
     <?php } ?>

      
  </select>
</div>


  
 
<br>
  
<center>
  <div class="form-group">
  <input  type="hidden" name="id" value=<?php echo $_GET['id'];?>    > 

    <input  type="submit" name="update" value="Envoyez la Facture" class="btn btn-primary" />

</div>

    <legend>Pas maintenant?</legend> 
  <a href="agents/Agent_TRI.php" class ="btn btn_info" >Retournez-vous ici</a>
</center>


</fieldset>
</form>
</div>

</body>
</html>