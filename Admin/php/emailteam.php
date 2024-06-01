<?php
require ('C:\xampp\htdocs\Ingegneria\Admin\phpmailer\class.phpmailer.php');
include('C:\xampp\htdocs\Ingegneria\Admin\phpmailer\class.smtp.php');


$id = (isset($_POST['id'])) ? $_POST['id'] : null;
$team =(isset($_POST['team'])) ? $_POST['team'] : null;


if (isset($_POST['submit'])){   

if ($id && $team !== null) {
	$conn = mysqli_connect ("localhost", "root", "","civicsense") or die ("Connessione non riuscita"); 
	$resultC = mysqli_query ($conn,"SELECT * FROM segnalazioni WHERE gravita IS NOT NULL AND team IS NULL");
	
	if($resultC){
		$row = mysqli_fetch_assoc($resultC);
		if($id == $row['id']){
			
			$stmt = $conn->prepare("UPDATE segnalazioni SET team = ?, stato = 'In attesa' WHERE id = ? ");
			$stmt->bind_param("ii",$team,$id);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result){

				echo('<center><b>Aggiornamento avvenuto con successo.</b></center>');
				$mail = new PHPMailer();
				
				try {

					$stmt = $conn->prepare("SELECT * FROM team WHERE codice = ?");
					$stmt->bind_param("i",$team);
					$stmt->execute();
					$result1 = $stmt->get_result();

					if($result1){
						$row = mysqli_fetch_assoc($result1);
						$mail->SMTPAuth   = true;                  // sblocchi SMTP 
						$mail->SMTPSecure = "ssl";                 // metti prefisso per il server
						$mail->Host       = "smtp.gmail.com";      // metti il tuo domino es(gmail) 
						$mail->Port       = 465;   				// inserisci la porta smtp per il server DOMINIO
						$mail->SMTPKeepAlive = true;
						$mail->Mailer = "smtp";
						$mail->Username   = "civicsense2019@gmail.com";     // DOMINIO username
						$mail->Password   = "c1v1csense2019";            // DOMINIO password
						$mail->AddAddress($row["email_t"]);
						$mail->SetFrom("civicsense2019@gmail.com");
						$mail->Subject = 'Nuova Segnalazione';
						$mail->Body = "Salve team$team, vi e' stata incaricata una nuova segnalazione da risolvere."; //Messaggio da inviare
						$mail->Send();
						echo "<center><b>Messaggio inviato.</b></center>";
					}
				} catch (phpmailerException $e) {
					echo $e->errorMessage(); //Errori da PHPMailer
				} catch (Exception $e) {
					echo $e->getMessage(); //Errori da altrove
				}
			}	
		}else{
			echo "<center><b>Inserisci un id esistente. </b></center>"; 
		}
	}
	

	
}
else {
	echo "<center><b>Inserire tutti i campi.</b></center>";
}
}
$stmt->close();
$conn->close();
?>