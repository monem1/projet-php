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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>suivie factures</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
			 <!-- Topbar -->
			 <?php require('pages/navbar.php');?>
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