<?php
session_start();
//puoi modificare la pagina per farla funzionare nella tua macchina
//adatto a tutti i domini (GMAIL,LIBERO.HOTMAIL)
//classi per l'invio dell'email (PHPMailer 5.2)

$config = include('config.php');
require ('C:\xampp\htdocs\Ingegneria\Admin\phpmailer\src\PHPMailer.php');
include ('C:\xampp\htdocs\Ingegneria\Admin\phpmailer\src\SMTP.php');

if (isset($_POST['id'])&& isset($_POST['stato'])) {
	$idS = $_POST['id'];
	$stato = $_POST['stato'];

	$config = include('php/config.php');
$psw = $config['DB_PSW'];
$conn = mysqli_connect ("localhost","SSE24",$psw,"civicsense") or die ("Connessione non riuscita"); 		
	$stmt = $conn->prepare("SELECT * FROM segnalazioni WHERE id =?");
	$stmt->bind_param("i",$idS);
	$stmt->execute();
	$result = $stmt->get_result();

	if($result){
		//da ente a team
		$row = mysqli_fetch_assoc($result);
		if($row['stato']=="In attesa" && $stato=="In risoluzione"){ //confronta stato attuale e quello da modificare
			$sql = "UPDATE segnalazioni SET stato = '$stato' WHERE id = $idS"; //esegui l'aggiornamento
			if($query){
				echo("<br><b><br><p> <center> <font color=black font face='Courier'> Aggiornamento avvenuto correttamente. Ricarica la pagina per aggiornare la tabella.</b></center></p><br><br> ");
				$mail = new PHPMailer(true);
	
				try {
				  $mail->SMTPAuth   = true;                  // sblocchi SMTP 
				  $mail->SMTPSecure = "ssl";                 // metti prefisso per il server
				  $mail->Host       = "smtp.gmail.com";      // metti il tuo domino es(gmail) 
				  $mail->Port       = 465;   				// inserisci la porta smtp per il server DOMINIO
				  $mail->SMTPKeepAlive = true;
				  $mail->Mailer = "smtp";
				  $mail->Username = $config['SMTP_USERNAME'];
				  $mail->Password = $config['SMTP_PASSWORD'];
				  $mail->AddAddress("$_SESSION['email']");
				  $mail->SetFrom("civicsense18@gmail.com");
				  $mail->Subject = 'Nuova Segnalazione';
				  $mail->Body = "Salve team$row['team'], ci è arrivata una nuova segnalazione e vi affido il compito di risoverla"; //Messaggio da inviare
				  $mail->Send();
				  echo "Message Sent OK";
				} catch (phpmailerException $e) {
					  echo $e->errorMessage(); //Errori da PHPMailer
				} catch (Exception $e) {
					  echo $e->getMessage(); //Errori da altrove
				}
			} 
		}
		//da team a ente e utente
		else if($row['stato']=="In risoluzione" && $stato=="Risolto"){
			$sql = "UPDATE segnalazioni SET stato = '$stato' WHERE id = $id";
			if($query){
				echo("<br><b><br><p> <center> <font color=black font face='Courier'> Aggiornamento avvenuto correttamente. Ricarica la pagina per aggiornare la tabella.</b></center></p><br><br> ");
				$mail = new PHPMailer(true);
	
				try {
				  $mail->SMTPAuth   = true;                  // sblocchi SMTP 
				  $mail->SMTPSecure = "ssl";                 // metti prefisso per il server
				  $mail->Host       = "smtp.gmail.com";      // metti il tuo domino es(gmail) 
				  $mail->Port       = 465;   				// inserisci la porta smtp per il server DOMINIO
				  $mail->SMTPKeepAlive = true;
				  $mail->Mailer = "smtp";
				  $mail->Username   = "$_SESSION['email']";  			// DOMINIO username
				  $mail->Password   = "$_SESSION['pass']";            // DOMINIO password
				  $mail->AddAddress('civicsense18@gmail.com');//ente
				  $mail->AddAddress("$row['email']");//utente
				  $mail->SetFrom("$_SESSION['email']");
				  $mail->Subject = "Segnalazione risolta";
				  $mail->Body = "Il problema presente in $row['via'] è stata risolta"; //Messaggio da inviare
				  $mail->Send();
				  echo "Message Sent OK";
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
}

?>