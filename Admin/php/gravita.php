<?php

$id = (isset($_POST['id'])) ? $_POST['id'] : null;
$stato = (isset($_POST['stato'])) ? $_POST['stato'] : null;

if (isset($_POST['submit'])){  

if ($id && $stato !== null) {

 $config = include('php/config.php');
$psw = $config['DB_PSW'];
$conn = mysqli_connect ("localhost","SSE24",$psw,"civicsense") or die ("Connessione non riuscita"); 
 $stmt = $conn->prepare("UPDATE segnalazioni SET stato = ? WHERE id = ?");
 $stmt->bind_param("si",$stato,$id);
 $stmt->execute();
 $result = $stmt->get_result();

if($result){

	while($row = mysqli_fetch_assoc($result)) {

		if ($id == $row['id']){
	
	echo("<br><b><br><p> <center> <font color=black font face='Courier'> Aggiornamento avvenuto correttamente. Ricarica la pagina per aggiornare la tabella.</b></center></p><br><br> ");
} 
else {

 echo ("INSERISCI UN ID ESISTENTE");
}

}
}
}

else {
	echo("inserisci tutti i campi");
}
}
$stmt->close();
$conn->close();
?>