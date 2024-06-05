
<?php

$config = include('php/config.php');
$psw = $config['DB_PSW'];
$conn = mysqli_connect ("localhost","SSE24",$psw,"civicsense") or die ("Connessione non riuscita");
$teamId=$_SESSION['idT'];
$sql = mysqli_query($conn,"SELECT team.codice,team.email_t,team.npersone,team.nomi,logging.timestamp FROM team JOIN logging ON team.codice=logging.id WHERE team.codice='$teamId'");


    // output data of each row
    while($row = mysqli_fetch_assoc($sql)) {
        echo "
		<tr>
            <td>".$row['codice']." </td>
            <td>".$row['email_t']."</td>
            <td>".$row['npersone']."</td>
            <td>".$row['nomi']."</td>
            <td>".$row['timestamp']."</td>

          </tr> ";
    }
?>