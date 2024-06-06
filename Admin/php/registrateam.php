<?php
$email = (isset($_POST['email'])) ? $_POST['email'] : null;
$nomi = (isset($_POST['nomi'])) ? $_POST['nomi'] : null;
$numeri = (isset($_POST['numero'])) ? $_POST['numero'] : null;
/* $pass = (isset($_POST['password'])) ? $_POST['password'] : null; */



$config = include ('config.php');
$psw = $config['DB_PSW'];
$conn = mysqli_connect("localhost", "SSE24", $psw, "civicsense") or die("Connessione non riuscita");
$nomi = sanitize($nomi, $conn);
if (isset($_POST['submit3'])) {
    if ($email && $nomi && $numeri !== null) {
        #inserisco i valori salvati dal form nella query di inserimento

        $stmt = $conn->prepare("INSERT INTO team (email_t, npersone, nomi, password) VALUES (?,?,?,?)");

        $stmt->bind_param("siss", $email, $numeri, $nomi, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === TRUE) {
            echo ("<br>
<p>
    <center>
        <font color=black font face='Courier'> Inserimento avvenuto correttamente! Ricarica la pagina per vedere la
            tabella aggiornata!
</p></b></center>");
            echo ("<br>
<p>
    <center>
        <font color=black font face='Courier'> La password del team è : $email
</p></b></center>");

        }
    } else {
        echo ("<p>
    <center>
        <font color=black font face='Courier'>Compila tutti i campi.
</p></b></center>");
    }
    $stmt->close();
}
#}


/* Able to sanitize the input string by the user.
Params:
$string = The input string to sanitize.
$conn = The connection to the database. */
function sanitize($string, $conn)
{
    $string = trim($string);
    $string = str_replace("\\", "", $string);
    $string = str_replace("/", "", $string);
    $string = stripslashes($string);
    $string = mysqli_real_escape_string($conn, $string);
    $string = strip_tags($string);
    return $string;
}
?>