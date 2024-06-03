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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Registra la password del team</div>
        <div class="card-body">
          <form action="registrateam.php" method="POST">
           
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email " required="required">
                <label for="inputEmail">Email </label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Conferma la password</label>
                  </div>
                </div>
              </div>
            </div>
             <button type="submit" class="btn btn-primary btn-block" > Registrati </button> 
          </form>
        </div>
      </div>
    </div>
	
<?php

$conn = mysqli_connect("localhost", "root","","civicsense") or die ("Connessione non riuscita");


// Check connection
if ($conn->connect_error) {
    die("Connessione non riuscita: " . $conn->connect_error);
}

// Retrieve POST data
$email = isset($_POST['email']) ? $_POST['email'] : null;
$pass = isset($_POST['password']) ? $_POST['password'] : null;

if ($email !== null && $pass !== null) {
    // Prepare the update statement
    $stmt = $conn->prepare("UPDATE team SET password = ? WHERE email_t = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("ss", $pass, $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Password updated successfully";
    } else {
        echo "Error updating password: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Email and password must be provided";
}

// Close the connection
$conn->close();
if($query){
	echo("<br><b><br><p> <center> <font color=white font face='Courier'> Password registrata! Clicca su <a href='login.php'> Login </a> per accedere. </b></center></p><br><br> ");
} 


?>	

  </body>

</html>
