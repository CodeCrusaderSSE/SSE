<?php

$id = (isset($_POST['id'])) ? $_POST['id'] : null;
$stato = (isset($_POST['stato'])) ? $_POST['stato'] : null;

if ($id && $stato !== null) {

	$conn = mysqli_connect ("localhost", "root", "","civicsense") or die ("Connessione non riuscita"); 
	$stmt = $conn->prepare("UPDATE segnalazioni SET stato = ? WHERE id = ?");
	$stmt->bind_param("si",$stato,$id);
	$stmt->execute();
	$result = $stmt->get_result();

	if($result){
		echo("<br><b><br><p> <center> <font color=black font face='Courier'> Inserimento avvenuto correttamente! Ricarica la pagina per aggiornare la tabella.</b></center></p><br><br> ");
	} 
}
$stmt->close();
$conn->close();
?>
	