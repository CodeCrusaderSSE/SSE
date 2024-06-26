<?php
session_start();
//puoi modificare la pagina per farla funzionare nella tua macchina
//adatto a tutti i domini (GMAIL,LIBERO.HOTMAIL)
//classi per l'invio dell'email (PHPMailer 5.2)


require ('C:\xampp\htdocs\Ingegneria\Team\phpmailer\src\PHPMailer.php');
include ('C:\xampp\htdocs\Ingegneria\Team\phpmailer\src\SMTP.php');
$config = include('php/config.php');
$psw = $config['DB_PSW'];
$conn = mysqli_connect ("localhost","SSE24",$psw,"civicsense") or die ("Connessione non riuscita"); 

if (isset($_POST['id'])&& isset($_POST['stato'])) {
	$idS = $_POST['id'];
	$stato = $_POST['stato'];
	$email=$_SESSION['email'];
	$pass=$_SESSION['pass'];
	$stmt=$conn->prepare("SELECT * FROM segnalazioni WHERE id =?");
	$stmt->bind_param("i", $idS);
	$stmt->execute();

	$resultC = $stmt->get_result();
	if($result){
		//da team a ente e utente
		$row = $result->fetch_assoc();
		if($row['stato']=="In attesa" && $stato=="In risoluzione"){ //confronta stato attuale e quello da modificare
			$stmt2=$conn->prepare("UPDATE segnalazioni SET stato = ? WHERE id = ?");
			$stmt2->bind_param("si",$stato,$idS);
			$stmt2->execute();
			$result1 = $stmt2->get_result();
			if($result1){
				echo("<br><b><br><p> <center> <font color=black font face='Courier'> Aggiornamento avvenuto correttamente. Ricarica la pagina per aggiornare la tabella.</b></center></p><br><br> ");
				$mail = new PHPMailer(true);
	
				try {
				  $mail->SMTPAuth   = true;                  // sblocchi SMTP 
				  $mail->SMTPSecure = "ssl";                 // metti prefisso per il server
				  $mail->Host       = "smtp.gmail.com";      // metti il tuo domino es(gmail) 
				  $mail->Port       = 465;   				// inserisci la porta smtp per il server DOMINIO
				  $mail->SMTPKeepAlive = true;
				  $mail->Mailer = "smtp";
				  $mail->Username   = "$email";      	// DOMINIO username
				  $mail->Password   = "$pass";        // DOMINIO password
				  $mail->AddAddress("civicsense2019@gmail.com");
				  $mail->AddAddress($row['email']);
				  $mail->SetFrom("$email");
				  $mail->Subject = 'Nuova Segnalazione';
				  $mail->Body = "La segnalazione è arrivata ed stiamo lavorando per risolverla"; //Messaggio da inviare
				  $mail->Send();
				  echo "Message Sent OK";
				  header("location: http://localhost/Ingegneria/Team/index.php");
				} catch (phpmailerException $e) {
					  echo $e->errorMessage(); //Errori da PHPMailer
				} catch (Exception $e) {
					  echo $e->getMessage(); //Errori da altrove
				}
			} 
		}
		//da team a ente e utente
		else if($row['stato']=="In risoluzione" && $stato=="Risolto"){
			$stmt3=$conn->prepare("UPDATE segnalazioni SET stato = ? WHERE id = ?");
			$stmt3->bind_param("si",$stato,$idS);
			$stmt3->execute();
			$result1 = $stmt3->get_result();
			if($result1){
				echo("<br><b><br><p> <center> <font color=black font face='Courier'> Aggiornamento avvenuto correttamente. Ricarica la pagina per aggiornare la tabella.</b></center></p><br><br> ");
				$mail = new PHPMailer(true);
	
				try {
				  $mail->SMTPAuth   = true;                  // sblocchi SMTP 
				  $mail->SMTPSecure = "ssl";                 // metti prefisso per il server
				  $mail->Host       = "smtp.gmail.com";      // metti il tuo domino es(gmail) 
				  $mail->Port       = 465;   				// inserisci la porta smtp per il server DOMINIO
				  $mail->SMTPKeepAlive = true;
				  $mail->Mailer = "smtp";
				  $mail->Username   = "$email";      	// DOMINIO username
				  $mail->Password   = "$pass";        // DOMINIO password
				  $mail->AddAddress("civicsense2019@gmail.com");
				  $mail->AddAddress($row['email']);
				  $mail->SetFrom("$email");
				  $mail->Subject = "Segnalazione risolta";
				  $mail->Body = "Il problema presente in ".$row['via']." è stata risolta"; //Messaggio da inviare
				  $mail->Send();
				  header("location: http://localhost/Ingegneria/Team/index.php");
				} catch (phpmailerException $e) {
					  echo $e->errorMessage(); //Errori da PHPMailer
				} catch (Exception $e) {
					  echo $e->getMessage(); //Errori da altrove
				}
			
			
			
			} 
		}
		else{
			echo "Operazione non disponibile";
		}
	}
	mysqli_close($conn);
	$stmt->close();
	$stmt2->close();
	$stmt3->close();
}

?>