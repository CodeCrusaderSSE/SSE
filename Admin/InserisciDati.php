<?php
	

	$upload_path = 'jpeg/';

    $config = include('php/config.php');
$psw = $config['DB_PSW'];
$conn = mysqli_connect ("localhost","SSE24",$psw,"civicsense") or die ("Connessione non riuscita");

// Check connection
if ($conn->connect_error) {
    die("Connessione non riuscita: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_path = $upload_path . basename($_FILES['image']['name']);
    $img_name = $_FILES['image']['name'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];
    $via = $_POST['via'];
    $descrizione = $_POST['descrizione'];
    $lat = isset($_POST['latitudine']) ? floatval($_POST['latitudine']) : null;
    $lng = isset($_POST['longitudine']) ? floatval($_POST['longitudine']) : null;

    // Convert $tipo to its corresponding integer value
    switch ($tipo) {
        case "Segnalazione di area verde":
            $tipo = 1;
            break;
        case "Rifiuti e pulizia stradale":
            $tipo = 2;
            break;
        case "Strade e marciapiedi":
            $tipo = 3;
            break;
        case "Segnaletica e semafori":
            $tipo = 4;
            break;
        case "Illuminazione pubblica":
            $tipo = 5;
            break;
        default:
            $tipo = 0; // Default value or handle error
            break;
    }

    try {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $file_path)) {
            // Prepare the insert statement
            $stmt = $conn->prepare("INSERT INTO segnalazioni (datainv, orainv, via, descrizione, foto, email, tipo, latitudine, longitudine) VALUES (CURRENT_DATE, CURRENT_TIME, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            // Bind the parameters
            $stmt->bind_param("ssssbsidd", $via, $descrizione, $img_name, $email, $tipo, $lat, $lng);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Inserimento dei dati completato";
            } else {
                echo "Errore nell'inserimento dei dati: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Errore nel caricamento del file";
        }
    } catch (Exception $e) {
        echo "Eccezione catturata: " . $e->getMessage();
    }

    // Close the connection
    $conn->close();
}

?>
