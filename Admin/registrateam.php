<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>
  <!-- Bootstrap core JavaScript-->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"
    integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap core CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
    /* Stile per la barra di forza della password */
    .password-strength {
      width: 100%;
      height: 10px;
      background-color: #ddd;
      margin-top: 5px;
    }

    .password-strength span {
      display: block;
      height: 100%;
    }

    .weak {
      width: 33%;
      background-color: red;
    }

    .medium {
      width: 66%;
      background-color: orange;
    }

    .strong {
      width: 100%;
      background-color: green;
    }

    .match {
      color: green;
    }

    .no-match {
      color: red;
    }
  </style>
  <script>
    function checkPasswordStrength() {
      var password = document.getElementById('password').value;
      var strengthBar = document.getElementById('strengthBar');
      var strength = 0;

      if (password.length > 7) strength += 1;
      if (password.length > 12) strength += 1;
      if (/[A-Z]/.test(password)) strength += 1;
      if (/[a-z]/.test(password)) strength += 1;
      if (/[0-9]/.test(password)) strength += 1;
      if (/[^A-Za-z0-9]/.test(password)) strength += 1;

      strengthBar.innerHTML = '';
      if (strength < 3) {
        strengthBar.innerHTML = '<span class="weak"></span><p class="h4">Weak</p>';
      } else if (strength < 5) {
        strengthBar.innerHTML = '<span class="medium"></span><p class="h4">Medium</p>';
      } else {
        strengthBar.innerHTML = '<span class="strong"></span><p class="h4">Strong</p>';
      }
    }

    function checkPasswordMatch() {
      var password = document.getElementById('password').value;
      var confirmPassword = document.getElementById('confirmPassword').value;
      var matchMessage = document.getElementById('matchMessage');
      if (password === confirmPassword) {
        matchMessage.textContent = 'Le password coincidono';
        matchMessage.className = 'match';
      } else {
        matchMessage.textContent = 'Le password non coincidono';
        matchMessage.className = 'no-match';
      }
    }
  </script>
</head>

<body class="bg-dark">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h2>Aggiorna Password Team</h2>
            <form action="registrateam.php" method="post">
              <div class="form-group">
                <label for="email">Team Email:</label>
                <input type="email" class="form-control mb-3" id="email" name="email" required="true">
                <label for="oldPassword">Vecchia Password:</label>
                <input type="oldPassword" class="form-control mb-3" id="oldPassword" name="oldPassword" required="true">
                <label for="password">Nuova Password:</label>
                <input type="password" class="form-control" id="password" name="password" required="true"
                  onkeyup="checkPasswordStrength(); checkPasswordMatch();">
                <div class="password-strength mb-3" id="strengthBar"></div>
              </div>
              <div class="form-group mb-3 mt-5">
                <label for="confirmPassword">Conferma Nuova Password:</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required="true"
                  onkeyup="checkPasswordMatch();">
                <small id="matchMessage"></small>
              </div>
              <button type="submit" class="btn btn-primary mb-3">Registrati</button>
            </form>
            <h3 class="card-title">Registrazione</h3>
            <div>
              <h5>Linee guida per una password sicura:</h5>
              <ul>
                <li>La password deve essere lunga almeno 8 caratteri.</li>
                <li>Utilizzare una combinazione di lettere maiuscole e minuscole.</li>
                <li>Includere numeri.</li>
                <li>Non utilizzare caratteri speciali (ad es. @, #, $, %, ecc.).</li>
                <li>Scegliere parole non correlate tra loro.</li>
                <li>Evita di usare informazioni personali facilmente reperibili (ad es. nomi, date di nascita, ecc.).
                </li>
                <li>Preferisci frasi facili da ricordare ma difficili da indovinare (ad es. "GattoVerde123").</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php

  $config = include ('php/config.php');
  $psw = $config['DB_PSW'];
  $conn = mysqli_connect("localhost", "SSE24", $psw, "civicsense") or die("Connessione non riuscita");


  // Check connection
  if ($conn->connect_error) {
    die("Connessione non riuscita: " . $conn->connect_error);
  }

  // Retrieve POST data
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $password = isset($_POST['password']) ? $_POST['password'] : null;
  $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;
  $oldPassword = isset($_POST['oldPassword']) ? $_POST['oldPassword'] : null;

  if ($email !== null && $password !== null && $confirmPassword !== null) {
    // Prepare the update statement
  
    if ($password !== $confirmPassword) {
      echo ('<center><p style="color:white"><b>Le password non coincidono.</b></p></center>');
      die("");
    }

    // Controllo della lunghezza della password
    if (strlen($password) < 8) {
      echo ('<center><p style="color:white"><b>La password deve essere lunga almeno 8 caratteri.</b></p></center>');
      die("");
    }

    if (preg_match('/^[A-Za-z0-9]+$/', $password)) {

    } else {
      echo ('<center><p style="color:white"><b>La nuova password contiene caratteri non ammessi.</b></p></center>');
      die("");
    }

    $stmt = $conn->prepare("SELECT password FROM team WHERE email_t = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if ($row["password"] !== $oldPassword) {
        echo ('<center><p style="color:white"><b>Vecchia password non corretta.</b></p></center>');
        die("");
      }
    }


    $stmt = $conn->prepare("UPDATE team SET password = ? WHERE email_t = ?");
    if ($stmt === false) {
      die("Prepare failed: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("ss", $password, $email);
    $result = $stmt->execute();
    // Execute the statement
    if ($result === TRUE) {
      echo "";
      echo ('<center><p style="color:white"><b>Password aggiornata con successo.</b></p></center>');
    } else {
      echo "" . $stmt->error;
      echo ('<center><p style="color:white"><b>Password non aggiornata.</b></p></center>');

    }

    // Close the statement
    $stmt->close();
  } else {
    echo ("<br><center><p><font color=white font face='Courier'>Bisogna compilare tutti i campi!</p><center><br> ");

  }

  // Close the connection
  $conn->close();
  /* if($result){
    echo("<br><b><br><p> <center> <font color=white font face='Courier'> Password registrata! Clicca su <a href='login.php'> Login </a> per accedere. </b></center></p><br><br> ");
  }  */


  ?>

</body>

</html>