<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<?php require('../pages/header.php') ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require('../pages/sidebaragent.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require('../pages/navbar.php'); ?>
                <!-- End of Topbar -->
                <div class="container-fluid">
                <?php
                require('../connexion/config.php');

                if (isset($_POST['add'])) {

                    $Nboc = $_POST['Nboc'];
                    $Societe = $_POST['Societe'];
                    $Montant = $_POST['Montant'];
                    if(!preg_match("%^[F0-9/]+$%",$Nboc)) { die ("<a href='ajouter_facture.php'>numero boc est faux</a>");}
                    $Creation = isset($_POST['Creation']) ?
                        $_POST['Creation'] : date('Y-m-d');
                    $Etape = $_POST['Etape'];

                    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM factures  WHERE Nboc='$Nboc'   ")) != 0) {
                        echo  '
          <div class="sucess">
          "Ce Numero de Facture BOC   est déjà assignéé à une autre facture, veuillez en choisir un autre svp."
            <br>
            cliquez ici pour Retourner
             <a href="ajouter_facture.php">Retour</a>   ';
                    } else {
                        $sql = "INSERT INTO factures (Nboc,Societe, Montant, Creation, Etape,Ordonnanceur) values('$Nboc', '$Societe', '$Montant', '$Creation', '$Etape','$Ordonnanceur')";
                        $res = mysqli_query($conn, $sql);

                        if ($res) {
                            echo "
                <script>alert('Add Success!')</script>";
                            header('location: Agent_BOC.php');
                        }
                    }
                } else {
                ?>
                    <?php

                    ?>

                    <?php
                    $societes  = mysqli_query($conn, 'SELECT societe From fournisseurs ORDER BY societe')
                    ?>
                    <h1 class="box-title">Enregistrement facture</h1>
                    <form class="user" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-6" id="app">
                            Nboc:{{sorce}}
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nboc" v-model="sorce" name="Nboc" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6" id="app1">
                            Societe:{{select}}
                                <select class="custom-select" name="Societe" id="Societe" v-model="select" required>
                                
                                    <?php
                                    while ($d = mysqli_fetch_array($societes, MYSQLI_ASSOC)) {
                                    ?>

                                        <option><?php echo '<td>' . $d['societe'] . '</td>'; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6" id="app2">
                            Montant:{{montant}}
                                <input type="number" class="form-control form-control-user" id="exampleLastName" placeholder="Montant" name="Montant" min="0" v-model="montant" required>
                            </div>
                        </div>
                        Creation
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="datetime" name="Creation" class="form-control" value="  <?= date('Y-m-d') ?>     ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <select class="custom-select" name="Etape">
                                    <option value="BOC" required>Bureau d'Ordre Centrale</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <div class="col-sm-6">
                                <input type="submit" name="add" value="ENREGISTRER LA FACTURE" class="btn btn-primary btn-user btn-block" />
                            </div>
                        </div>
                            <legend>Pas maintenant? </legend>
                            <a href="Agent_BOC.php" class="btn btn_info">Retournez-vous ici</a>
                       
                        </fieldset>
                    </form>
            </div>

        <?php } ?>
        <?php require('../pages/footer.php'); ?>
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
  <?php require('../pages/formlogout.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                sorce: ''

            }
        })
        var app1 = new Vue({
            el: '#app1',
            data: {
                
                select:''

            }
        })
        var app2 = new Vue({
            el: '#app2',
            data: {
                montant:''
            }
        })
    </script>
</body>

</html>