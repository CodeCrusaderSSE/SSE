<?php

$id = $_POST['id'];
$team = $_POST['team'];

if ($id && $team !== null) {

    $conn = mysqli_connect("localhost", "root","","civicsense") or die ("Connessione non riuscita"); 	
    $stmt = $conn->prepare("SELECT email_t FROM team WHERE codice = ?");
    $stmt->bind_param("i",$team);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result){
        echo('<a href="mailto: '.$result.'"><center> Clicca qui per mandare un avviso al team. </center></a>');
    }
}
$stmt->close();
$conn->close();
?>