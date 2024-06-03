<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Tables</title>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Page level plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">    <!-- Bootstrap core CSS-->

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Page level plugin CSS-->

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

	<!-- Grafico -->
	<link rel="stylesheet" href="css/graficostyle.css">
	   
  </head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href=""> Area riservata</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
 <div class="titolo" > <b> ILLUMINAZIONE PUBBLICA </b> </a> 

      <style>
      .titolo{
        font-size: 30px; 
        color:white;
        margin-left: 30%;
      }
    </style>
</div>

<!-- INIZIO LOGOUT -->     

 <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow" >
           <a class="nav-link dropdown-toggle" href="#" title="Logout"  id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-user-circle fa-fw"></i>
           </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="login.html" data-toggle="modal" data-target="#logoutModal" > Logout </a>
          </div>
        </li>
    </ul>
 </form>
 
</nav>

    <!-- finestra avviso-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


      <li class="nav-item active" >
          <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
            <i class="fas fa-fw fa-folder" ></i>
            <span>Segnalazioni</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown" >
		   <a class="dropdown-item" href="segnalazionii.php"><center><b>INDICE SEGNALAZIONI</b></center></a>
            <a class="dropdown-item" href="segnalazioniverde.php">Segnalazione su aree verdi</a>
            <a class="dropdown-item" href="segnalazionirifiuti.php">Rifiuti e pulizia stradale</a> 
			<a class="dropdown-item" href="segnalazionistrade.php">Strade e marciapiedi</a>
            <a class="dropdown-item" href="segnalazionisemafori.php">Segnaletica e semafori</a> 
			<a class="dropdown-item" href="segnalazioniilluminazione.php"style=" background-color:orange;"> <b>Illuminazione pubblica</b></a> 
          </div>
      </li>
		
	    <li class="nav-item dropdown">
          <a class="nav-link " href="team.php" >
            <i class="fas fa-fw fa-folder"></i>
           <span>Team</span>
          </a>
        </li>
	  
</ul>

<!-- FINE SIDEBAR -->


         
<div class="card mb-3">
<div class="card-header">

              <i class="fas fa-table"></i>
             Tabella Segnalazioni</div>
            <div class="card-body">
			
			<!-- MAPPA -->
			
	<style>
    #map{
      height:500px;
      width:100%; 
    }
    *{
      margin:0;
      padding:0;
    }
  </style>
</head>
<body>

  <div id="map"></div>
    
    <script>
      function initMap(){
      var location = new google.maps.LatLng(40.382003, 17.367155);
      var map = new google.maps.Map(document.getElementById("map"),{
        zoom:18,
        center:location
      });
      <?php 
        $conn = mysqli_connect("localhost","root","","civicsense") or die("Connessione fallita");
        $sql = "SELECT * FROM segnalazioni where tipo = '5' ";
        $result = mysqli_query($conn,$sql);
        if($result){
          while($row=mysqli_fetch_assoc($result)){
            echo "
            var location = new google.maps.LatLng(".$row['latitudine'].",".$row['longitudine'].");
            var marker = new google.maps.Marker({
              map: map,
              position: location

            }); " ;
          }
          mysqli_close($conn);
        }
      ?>
      /*var marker = new google.maps.Marker({
              map: map,
              position: location
          });
      var marker1 = new google.maps.Marker({
        map: map,
        position: location1
      });*/
      
    }
    
    </script>
    
    <?php
      $config = include('php/config.php');
      $googleMapsApiKey = $config['GOOGLE_MAPS_API_KEY'];
    ?>
    
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AI<?php echo $googleMapsApiKey; ?>&callback=initMap">
    </script>
  
			
			<!-- FINE MAPPA -->

      
			<br><br><br>
			 <!-- Tabella -->
              <div class="table-responsive" style="overflow-x: scroll;" >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead >
                    <tr>
                      <th>CODICE SEGNALAZIONE</th>
                      <th>DATA</th>
                      <th>ORA</th>
                      <th>VIA</th>
                      <th>DESCRIZIONE</th>
                      <th>FOTO</th>
                      <th>E-MAIL</th>
                      <th>STATO</th>
                      <th>TEAM</th>
					  <th>GRAVITA'</th>
                    </tr>
                  </thead>

<?php include("php/segnalazioniilluminazione.php"); ?>


</table>

<!-- MODIFICA GRAVITA' -->

<!-- inserimento da form del codice della segnalazione da modificare -->
<br><br><br>

<div class="card-header">
  <i class="fas fa-table"></i>
Modifica gravità di una segnalazione</div>

	<form  method="post" action ="segnalazioniilluminazione.php" style=" margin-top:5%; margin-left:5%">
<b>CODICE CANCELLAZIONE DA MODIFICARE: <input type="text" name="idt"><br><br></b>
<b> INSERISCI LA GRAVITA' MODIFICATA: </b> <select class="text" name="gravit"> 
   
    <option value="Alta">Alta</option>
    <option value="Media">Media</option>
    <option value="Bassa">Bassa</option>

<input type="submit" name="submit" class="btn btn-primary btn-block" style="width:15%; margin-top:5%;">

    </form>
	
<?php

$conn = mysqli_connect ("localhost", "root", "","civicsense") or die ("Connessione non riuscita"); 

$idt = isset($_POST['idt']) ? $_POST['idt'] : null;
$grav = isset($_POST['gravit']) ? $_POST['gravit'] : null;

if (isset($_POST['submit'])) {
    if ($idt !== null && $grav !== null) {
        // Prepare the select statement
        $stmt = $conn->prepare("SELECT id FROM segnalazioni WHERE tipo = 5 AND id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind the parameters
        $stmt->bind_param("i", $idt);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $resultC = $stmt->get_result();

        if ($resultC->num_rows > 0) {
            // Prepare the update statement
            $update_stmt = $conn->prepare("UPDATE segnalazioni SET gravita = ? WHERE id = ?");
            if ($update_stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            // Bind the parameters
            $update_stmt->bind_param("ii", $grav, $idt);

            // Execute the statement
            if ($update_stmt->execute()) {
                echo "<br><b><br><p><center><font color=black font face='Courier'>Aggiornamento avvenuto correttamente. Ricarica la pagina per aggiornare la tabella.</font></center></p><br><br>";
            } else {
                echo "<p><center><font color=black font face='Courier'>Errore nell'aggiornamento dei dati: " . $update_stmt->error . "</font></center></p>";
            }

            // Close the update statement
            $update_stmt->close();
        } else {
            echo "<p><center><font color=black font face='Courier'>Inserisci ID esistente.</font></center></p>";
        }

        // Close the select statement
        $stmt->close();
    } else {
        echo "<p><center><font color=black font face='Courier'>ID e gravità sono richiesti.</font></center></p>";
    }
}

// Close the connection
$conn->close();



?>
<br><br><br>

<div class="card-header">
  <i class="fas fa-table"></i>
Statistiche annuali per le segnalazioni di illuminazione</div>
<br><br>
<!-- GRAFICO -->

 <script src="//www.amcharts.com/lib/3/amcharts.js"></script>
<script src="//www.amcharts.com/lib/3/serial.js"></script>
<script src="//www.amcharts.com/lib/3/themes/light.js"></script>

<div id="chartdiv"></div>
  <script src='https://code.jquery.com/jquery-1.11.2.min.js'></script>

 <?php include ("php/graficoilluminazioni.php"); ?>

 <!-- FINE GRAFICO -->

<br><br>
</div></div></div>

  </body>

</html>
