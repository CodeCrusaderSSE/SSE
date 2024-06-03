<?php
$config = include('php/config.php');
$psw = $config['DB_PSW'];
$conn = mysqli_connect ("localhost","SSE24",$psw,"civicsense") or die ("Connessione non riuscita"); 

  #connessione al db



  $quer = mysqli_query ($conn,"SELECT * FROM segnalazioni ");
  



    while($row = mysqli_fetch_assoc($quer)) {
        echo "
    <tr>
     
                <td>".$row['id']." <br></td>
                
                <td>".$row['datainv']." <br></td> 
                
              <td>".$row['orainv']."<br></td>

               <td>".$row['via']."<br></td>

                <td>".$row['descrizione']."<br></td>

                 <td>".$row['foto']."<br></td>

                  <td>".$row['email']."<br></td>

                   <td>".$row['stato']."<br></td>

                    <td>".$row['team']."<br></td>

                   <td>".$row['gravit�']."<br></td>
               
          </tr> ";
    }
?>