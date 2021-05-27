<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
?>
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

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
      
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
			 
                <!-- End of Topbar -->
<?php
require('connexion/config.php');


 $etape = '';


if (isset($_POST['update'] ))
{

    $id = $_POST['id'] ;
    $Etape = $_POST['Etape'];

          if($_SESSION["login"]=="BOC")
          {
                  if  ($Etape  == "TRI" )
                //updating the table  
                  { 
                  $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape' WHERE id=$id");
                  header("Location: agents/Agent_BOC.php");
                  }   
                  else
                  {
                  header("Location: alert_passer.php");
                  exit();
                  }
          }

          if($_SESSION["login"]=="TRI")
          {

                if ($Etape  == "BOC" or $Etape  ==  "ORD" or $Etape  ==  "CONT" )
                //updating the table  
                {
                  $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");

                header("Location: agents/Agent_TRI.php");
                }

                else

                {

                  header("Location: alert_passer.php");
                
                // exit();
                }

          }


          if($_SESSION["login"]=="APPRO_BDC")
          {
                if  ($Etape  == "ORD" or $Etape  ==  "CONT" )
                //updating the table  
                {

                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");

                header("Location: agents/Agent_APPRO.php");

                }

                else

                {
                header("Location: alert_passer.php");
                 exit();
                }

          }



          if($_SESSION["login"]=="CON")
          {
                if  ($Etape  == "TRI"  or $Etape  ==  "ORD" or $Etape  ==  "APPRO_BDC"or $Etape  ==  "COMP")
                //updating the table  
                {
                    $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");

                header("Location: agents/Agent_CON.php");
                // exit();

                }
                else
                {
                                header("Location: alert_passer.php");
                }

          }


          if($_SESSION["login"]=="COM")
          {
                if  ($Etape  == "CONT"  or $Etape  ==  "TRESO" )
                //updating the table  
                {
                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");

                header("Location: agents/Agent_COM.php");
                }
                
                else
                
                {  
                header("Location: alert_passer.php");
                }
                // exit();
              
          }


          if($_SESSION["login"]=="TRE")
          {
                if  ($Etape  == "COMP"  or $Etape  ==  "PDG" )
                //updating the table  
                {
                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");

                header("Location: agents/Agent_TRE.php");
                }
                else
                {  
                header("Location: alert_passer.php");
                }
                // exit();

          }

          if($_SESSION["login"]=="ADMIN")
          {
           
                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape'
                WHERE id=$id");

                header("Location: admin/gestion_factures.php");
          }

             if($_SESSION["login"]=="INFO")
          {
                if  ($Etape  == "TRI"  or  $Etape  == "CONT")
                //updating the table  
                {

                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape' WHERE id=$id");
                header("Location: chercher_Facture_ordonnanceur.php");
                
                }

                else
                { 
                header("Location: alert_passer.php");
                exit();
                }

          }

           if($_SESSION["login"]=="APPRO_ORD")
          {
                if  ($Etape  == "TRI"  or  $Etape  == "APPRO_BDC")
                //updating the table  
                {

                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape' WHERE id=$id");

                header("Location: chercher_Facture_ordonnanceur.php");
                
                }
                else
                {
                
                    header("Location: alert_passer.php");
                exit();
                }

          }


          if($_SESSION["login"]=="DA")
          {
                if  ($Etape  == "TRI"  or  $Etape  == "CONT" or  $Etape  == "APPRO_BDC")
                //updating the table  
                {

                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape' WHERE id=$id");

                header("Location: chercher_Facture_ordonnanceur.php");
                
                }
                else
                {
                
                    header("Location: alert_passer.php");
                exit();
                }

          }


          if($_SESSION["login"]=="PRE")
          {
                if  ($Etape  == "TRI"  or  $Etape  == "CONT" )
                //updating the table  
                {

                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape' WHERE id=$id");

                header("Location: chercher_Facture_ordonnanceur.php");
                
                }
                else
                {
                
                    header("Location: alert_passer.php");
                exit();
                }

          }
        
        if($_SESSION["login"]=="JURI")
          {
                if  ($Etape  == "TRI"  or  $Etape  == "CONT" )
                //updating the table  
                {

                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape' WHERE id=$id");

                header("Location: chercher_Facture_ordonnanceur.php");
                
                }
                else
                {
                
                    header("Location: alert_passer.php");
                exit();
                }

          }

          if($_SESSION["login"]=="BAT")
          {
                if  ($Etape  == "TRI"  or  $Etape  == "CONT" )
                //updating the table  
                {

                $result = mysqli_query($conn, "UPDATE factures SET  Etape= '$Etape' WHERE id=$id");

                header("Location: chercher_Facture_ordonnanceur.php");
                
                }
                else
                {
                
                    header("Location: alert_passer.php");
                exit();
                }

          }                
                    
}

          

?>
<?php

      $id = $_GET['id'];
 
      //selecting data associated with this particular id
      $result = mysqli_query($conn, "SELECT * FROM factures WHERE id=$id");
 
    while($row = mysqli_fetch_array($result , MYSQLI_ASSOC ))
{

 $etape = $row['Etape'];
    
}

?>


<br><br>

<div class="container">


<form  action="passer_Facture.php" method="post">

<center>
<fieldset>
    <legend> AFFECTATION DES FACTURES  </legend>


<div class="form-group">
      <select class="form-control" name="Etape"    id="etape" >

          <option value="BOC">Bureau d'Ordre Centrle</option>  
        <option value="TRI">Bureau de TRI</option> 
            <option value="ORD">ORDONNANCEURS</option>
              
        <option value="APPRO_BDC">APPRO_BDC</option>    
           <option value="CONT">Bureau de Controle</option>  
           <option value="COMP">Bureau de Comptabilité</option> 
           <option value="TRESO">Bureau de Trésorerie</option>
           <option value="PDG">Signature PDG</option>
      </select>
  </div>  

  
<div class="form-group">
  <input type="hidden" name="id" value=<?php echo $_GET['id'];?>    > 
    <input type="submit" name="update" value="Passer Etape" class="btn btn-primary" />
</div> 

</fieldset>
</form>
</div>

</body>
</html>