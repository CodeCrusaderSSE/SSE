
<?php

$config = include('php/config.php');
$psw = $config['DB_PSW'];
$conn = mysqli_connect ("localhost","SSE24",$psw,"civicsense") or die ("Connessione non riuscita");
$adminId=$_SESSION['idA'];
$sql = mysqli_query($conn,"SELECT admin.id,admin.email,logging.timestamp,logging.event FROM admin JOIN logging ON admin.id=logging.id WHERE admin.id='$adminId'");


    // output data of each row
    while($row = mysqli_fetch_assoc($sql)) {
        echo "
		<tr>
            <td>".$row['id']." </td>

            <td>".$row['email']."</td>

            <td>".$row['timestamp']."</td>

            <td>".$row['event']."</td>

          </tr> ";
    }
?>