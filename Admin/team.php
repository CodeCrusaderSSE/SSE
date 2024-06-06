<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Tables</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"
    integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
  <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">

  <!-- Bootstrap core CSS-->

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href=""> Area riservata</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <div class="titolo"> <b> GESTIONE TEAM </b> </a>

      <style>
        .titolo {
          font-size: 30px;
          color: white;
          margin-left: 30%;
        }
      </style>
    </div>

    <!-- INIZIO LOGOUT -->

    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" title="Logout" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="login.html" data-toggle="modal" data-target="#logoutModal"> Logout </a>
          </div>
        </li>
      </ul>
    </form>

  </nav>

  <!-- finestra avviso-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sei sicuro di voler lasciare il sito?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Clicca "Logout" per uscire dal sito.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annulla</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- FINE LOGOUT-->

  <div id="wrapper">



    <!-- INIZIO SIDEBAR -->

    <ul class="sidebar navbar-nav">
      <br>
      <li class="nav-item dropdown">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Dashboard</span>
        </a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false" href="#">
          <i class="fas fa-fw fa-folder"></i>
          <span>Segnalazioni</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="segnalazionii.php">
            <center><b>INDICE SEGNALAZIONI</b></center>
          </a>
          <a class="dropdown-item" href="segnalazioniverde.php">Segnalazione su aree verdi</a>
          <a class="dropdown-item" href="segnalazionirifiuti.php">Rifiuti e pulizia stradale</a>
          <a class="dropdown-item" href="segnalazionistrade.php">Strade e marciapiedi</a>
          <a class="dropdown-item" href="segnalazionisemafori.php">Segnaletica e semafori</a>
          <a class="dropdown-item" href="segnalazioniilluminazione.php"> Illuminazione pubblica </a>
        </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link " href="team.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Team</span>
        </a>
      </li>

    </ul>

    <!-- FINE SIDEBAR -->


    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Tabella team
      </div>
      <div class="card-body">
        <div class="table-responsive" style="overflow-x: scroll;">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>CODICE TEAM</th>
                <th>E-MAIL</th>
                <th>COMPONENTI</th>
              </tr>
            </thead>
            <?php include ("php/team.php"); ?>
          </table>

          <br><br><br>

          <!-- TABELLA SEGNALAZIONI SENZA TEAM -->



          <div class="card-header">
            <i class="fas fa-table"></i>
            Segnalazioni senza team
          </div>

          <br><br><br>
          <!-- Tabella -->
          <div class="card-body">

            <div class="table-responsive" style="overflow-x: scroll; ">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>CODICE SEGNALAZIONE</th>
                    <th>VIA</th>
                    <th>GRAVITA'</th>
                    <th>TIPO</th>
                  </tr>
                </thead>

                <?php include ("php/team2.php"); ?>


              </table>
            </div>

            <!-- MODIFICA TEAM -->

            <br><br><br>

            <div class="card-header">
              <i class="fas fa-table"></i>
              Assegna una segnalazione ad un team
            </div>

            <form method="post" action="team.php" style=" margin-top:5%; margin-left:5%">
              <b>CODICE SEGNALAZIONE: <input type="text" name="id"><br><br></b>
              <b>SELEZIONA L'EMAIL DEL TEAM: </b> <select class="text" name="team">

                <?php

                $config = include ('php/config.php');
                $psw = $config['DB_PSW'];
                $conn = mysqli_connect("localhost", "SSE24", $psw, "civicsense") or die("Connessione non riuscita");

                $selezione = mysqli_query($conn, "SELECT email_t, codice FROM team") or die(mysqli_error());

                if ($selezione) {
                  while ($array = mysqli_fetch_assoc($selezione)) {
                    $email = $array["email_t"];
                    $codice = $array["codice"];


                    //da qui c'è il menù a discesa riempito con i valori del database
                    echo "<option value='$codice'>$email</option>";
                  }
                }
                ?>
                <input type="submit" name="submit" class="btn btn-primary btn-block" style="width:15%; margin-top:5%;">

                <?php include ("php/emailteam.php"); ?>
              </select>
            </form>
            <br>


            <br><br>



            <!-- ELIMINA TEAM -->

            <div class="card-header">
              <i class="fas fa-table"></i>
              Elimina un team
            </div>

            <form method="post" action="team.php" style=" margin-top:5%; margin-left:5%">
              <b>CODICE TEAM DA ELIMINARE: <input type="text" name="cod"><br><br></b>
              <input type="submit" name="submit2" class="btn btn-primary btn-block" style="width:15%; margin-top:5%;">
            </form>
            <?php include ("php/cancellateam.php"); ?>

            <br><br><br>




            <!-- INSERIMENTO TEAM -->

            <div class="card-header">
              <i class="fas fa-table"></i>
              Inserisci un nuoto team
            </div>

            <form method="post" action="team.php" style=" margin-top:5%; margin-left:5%">
              <b>E-MAIL TEAM:</b> <input type="email" name="email" required="true"><br><br>
              <b>NOMI E COGNOMI DEI COMPONENTI:</b> <input type="text" name="nomi" required="true"><br><br>
              <b>NUMERO DI COMPONENTI: </b> <input type="number" name="numero" required="true"><br><br>
              <!-- <b>PASSWORD:</b> <input type="password" name="password"><br> -->

              <input type="submit" name="submit3" class="btn btn-primary btn-block" style="width:15%; margin-top:5%;">
            </form>


            <?php
            # ---INSERIMENTO DA FORM ---
            
            #salvo i nomi (name) dei form in una variabile php, richiamando i valori dal form con _POST (se nel fotm era 'method=get' diventava $_GET)
            $email = (isset($_POST['email'])) ? $_POST['email'] : null;
            $nomi = (isset($_POST['nomi'])) ? $_POST['nomi'] : null;
            $numeri = (isset($_POST['numero'])) ? $_POST['numero'] : null;
            /* $pass = (isset($_POST['password'])) ? $_POST['password'] : null; */



            $config = include ('php/config.php');
            $psw = $config['DB_PSW'];
            $conn = mysqli_connect("localhost", "SSE24", $psw, "civicsense") or die("Connessione non riuscita");
            $nomi = sanitaze($nomi, $conn);
            $email = sanitaze($email, $conn);
            if ($email && $nomi && $numeri !== null) {
              #inserisco i valori salvati dal form nella query di inserimento
              $password = password_hash($email, PASSWORD_DEFAULT);
              $stmt = $conn->prepare("INSERT INTO team (email_t, npersone, nomi, password) VALUES (?,?,?,?)");
              $stmt->bind_param("siss", $email, $numeri, $nomi, $password);
              $result = $stmt->execute();

              if ($result) {
                echo "<p>Team registrato con successo. La password è <b>$email</b></p>";
                $adminId = $_SESSION['idA'];
                $currentDateTime = date("Y-m-d H:i:s", time());
                $query2 = "INSERT INTO logging VALUES ('$adminId','admin','$currentDateTime','insert team')";
                $result2 = mysqli_query($conn, $query2);
              }
            } else {
              echo "<p>Team non registrato.</p>";
            }


            #}
            

            /* Able to sanitaze the input string by the user.
            Params:
            $string = The input string to sanitaze.
            $conn = The connection to the database. */
            function sanitaze($string, $conn)
            {
              $string = stripslashes($string);
              $string = mysqli_real_escape_string($conn, $string);
              $string = htmlspecialchars($string);
              return $string;
            }


            ?>

          </div>

</body>

</html>