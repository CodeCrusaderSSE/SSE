<?php
	//Recupero dati
	if(isset($_POST['email']) && isset($_POST['password'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		if($email == "civicsense18@gmail.com")
		{
			if($password == "admin")
			{
				echo 'Accesso consentito alla sezione riservata';
			}
			else
			{
				echo 'Accesso negato alla sezione riservata.La password � errata!';
			}
		}
		else
		{
			
			$config = include('php/config.php');
$psw = $config['DB_PSW'];
$conn = mysqli_connect ("localhost","SSE24",$psw,"civicsense") or die ("Connessione non riuscita"); 
			$stmt = $conn->prepare("SELECT * FROM team WHERE email_t = ?");
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$result = $stmt->get_result();

$config = include('config.php');

// Recupero dati
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $adminEmail = $config['ADMIN_EMAIL'];
    $adminPassword = $config['ADMIN_PASSWORD'];

    if ($email == $adminEmail) {
        if ($password == $adminPassword) {
            echo 'Accesso consentito alla sezione riservata';
        } else {
            echo 'Accesso negato alla sezione riservata. La password è errata!';
        }
    } else {
        $conn = mysqli_connect("localhost", "root", "", "civicsense") or die("Connessione non riuscita");
        $stmt = $conn->prepare("SELECT * FROM team WHERE email_t = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($password != $row["password"] || $email != $row["email_t"]) {
                    // CODICE JAVASCRIPT
                    echo 'ATTENZIONE: La password o la email inserita non è corretta!';
                } else if ($password == $row["password"] || $email == $row["email_t"]) {
                    echo 'Accesso consentito area riservata (TEAM)';
                }
            }
        } else {
            echo 'Non esistono utenti con questa email';
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo 'Non esistono;';
}
?>
