<?php


$cod = (isset($_POST['cod'])) ? $_POST['cod'] : null;

if (isset($_POST['submit2'])) {

	if ($cod == null) {
		echo ("<p> <center> <font color=black font face='Courier'> Compila tutti i campi.</center></p>");
	} elseif ($cod !== null) {
		$config = include ('php/config.php');
		$psw = $config['DB_PSW'];
		$conn = mysqli_connect("localhost", "SSE24", $psw, "civicsense") or die("Connessione non riuscita");
		$stmt = $conn->prepare("SELECT * FROM team WHERE codice = ?");
		$stmt->bind_param("i", $cod);
		$stmt->execute();
		$resultC = $stmt->get_result();

		if ($resultC) {
			$row = mysqli_fetch_assoc($resultC);
			if ($cod == $row['codice']) {
				$stmt = $conn->prepare("DELETE FROM team WHERE codice = ?");
				$stmt->bind_param("i", $cod);
				$result = $stmt->execute();
				if ($result) {
					echo ("<br><b><br><p> <center> <font color=black font face='Courier'> Aggiornamento avvenuto correttamente. Ricarica la pagina per aggiornare la tabella.</b></center></p><br><br> ");
					
                $adminId=$_SESSION['idA'];
                $currentDateTime = date("Y-m-d H:i:s", time());
                $query2="INSERT INTO logging VALUES ('$adminId','admin','$currentDateTime','delete team')";
                $result2=mysqli_query($conn,$query2);
				}
			} else {
				echo ("<p> <center> <font color=black font face='Courier'> Inserisci ID esistente.</center></p>");
			}
		}

	}
}

?>