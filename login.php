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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
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


    $login = $password = '';
    $b = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['login']))
            $login = test_input($_POST['login']);
        else $b = false;

        if (isset($_POST['password']))
            $password = test_input($_POST['password']);
        else $b = false;

        if (isset($_POST['type']))
            $type = test_input($_POST['type']);
        else $b = false;
        $tablename = '';
        $id = '';

        if ($type == 'Agent') {
            $id = 'ida';
            $tablename = 'agents';
        } else if ($type == 'Fournisseur') {
            $id = 'idf';
            $tablename = 'fournisseurs';
        }
        $q = "select $id,password from $tablename where login='$login'";
        //echo $q;
        $result = $conn->query($q);
        if ($result == true) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        } else {
            header('Location: login.php');
        }
        if ($row['password'] == $password) {
            $_SESSION['login'] = $login;
            $_SESSION['type'] = $type;

            if ($id == 'ida' && $b == true) {
                $_SESSION['id'] = $row['ida'];

                switch ($_SESSION['login']) {
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
                        header('location: agents/Agent_APPRO.php');
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

                    case 'INFO':
                        header('location: ordonnanceur/Agent_INFO.php');
                        break;

                    case 'APPRO_ORD':
                        header('location: ordonnanceur/Agent_APPRO_ORD.php');
                        break;
                    case 'BAT':
                        header('location: ordonnanceur/Agent_BAT.php');
                        break;
                    case 'DA':
                        header('location: ordonnanceur/Agent_DA.php');
                        break;
                    case 'JURI':
                        header('location: ordonnanceur/Agent_JURI.php');
                        break;
                    case 'PRE':
                        header('location: ordonnanceur/Agent_PRE.php');
                        break;
                    case 'DRTTU':
                        header('location: ordonnanceur/Agent_DRTTU.php');
                        break;    
                    default:
                        header('login.php');
                        break;
                }
            }
            if ($id == 'idf' && $b == true) {
                $_SESSION['id'] = $row['idf'];

                switch ($_SESSION['login']) {
                    case 'ara':
                        header('location: fournisseur/Four_ARA.php');
                        break;

                    case 'etta':
                        header('location: fournisseur/Four_ETTA.php');
                        break;

                    case 'cap':
                        header('location: fournisseur/Four_CAP.php');
                        break;

                    case 'menif':
                        header('location: fournisseur/Four_MENI.php');
                        break;

                    case 'sin':
                        header('location: fournisseur/Four_SNI.php');
                        break;
                    case 'ads':
                        header('location: fournisseur/Four_ADS.php');
                        break;
                    case 'tel':
                        header('location: fournisseur/telecom.php');
                        break;
                    case 'top':
                        header('location: fournisseur/top.php');
                        break;
                        case 'wor':
                            header('location: fournisseur/four_wor.php');
                            break;
                    case 'kara':
                        header('location: fournisseur/four_kara.php');
                        break;
                    case 'dar':
                        header('location : fournisseur/dar.php');
                        break;
                    case 'hot':
                        header('location : fournisseur/four_hot.php');
                        break;
                    case 'ren':
                        header('location : fournisseur/four_ren.php');
                        break;
                    case 'exc':
                        header('location : fournisseur/four_exc.php');
                        break;
                    default:
                        header('login.php');
                        break;
                }
            }
        } else {
            $message = "Login ou  mot de passe  incorrect.";
        }
    }
    ?>

    <body class="bg-gradient-primary">

        <div class="container">
            <div class="row justify-content-center">
                <!-- Outer Row -->
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">

                            <!-- Nested Row within Card Body -->

                            <div class="row">

                                <div class="col-lg-6">
                                    <span>AgenceTransport<span>Terrestre</span> </span>
                                    <img src="img/images.jpeg" alt="attt">
                                </div>


                                <div class="col-lg-6">
                                    <div class="p-5">


                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">S'identifier</h1>
                                        </div>

                                        <form class="user" method="post" name="login">

                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="login" placeholder="Enter login..." required>
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" required>
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control " name="type" id="type" required>
                                                    <option value="" disabled selected>Type</option>
                                                    <option value="Agent">Agent</option>
                                                    <option value="Fournisseur">Fournisseur</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Connexion ">
                                                <hr>
                                        </form>
                                        <div class="text-center">
                                            <a class="small" href="register_Fournisseur.php">Créer un compte!</a>
                                        </div>


                                    </div>
                                    <br>
                                    <?php
                                    if (!empty($message)) {
                                    ?>
                                        <p class="errorMessage"><?php echo $message; ?></p>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <?php
                                        //if (! empty($message)) 
                                        //{ 
            ?>


            <!--<p class="errorMessage"><?php //echo $message; 
                                        ?></p>  -->

        <?php
                                    }
        ?>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

    </body>

</html>