<?php

$upload_path = 'img/';
$config = include('php/config.php');
$psw = $config['DB_PSW'];
$conn = mysqli_connect ("localhost","SSE24",$psw,"civicsense") or die ("Connessione non riuscita");
$stmt = $conn->prepare("SELECT * FROM segnalazioni WHERE tipo = '3' ");
$stmt->execute();
$result = $stmt->get_result();


while ($row = mysqli_fetch_assoc($result)) {
  echo "
    <tr>
     
                <td>" . $row['id'] . " <br></td>
                
                <td>" . $row['datainv'] . " <br></td> 
                
              <td>" . $row['orainv'] . "<br></td>

               <td>" . $row['via'] . "<br></td>

                <td>" . $row['descrizione'] . "<br></td>

                 <td><img width='200px' height='200px' src=" . $upload_path . $row['foto'] . "><br></td>

                  <td>" . $row['email'] . "<br></td>

                   <td>" . $row['stato'] . "<br></td>

                    <td>" . $row['team'] . "<br></td>

                   <td>" . $row['gravita'] . "<br></td>
               
          </tr> ";
}
$stmt->close();
$conn->close();
?>