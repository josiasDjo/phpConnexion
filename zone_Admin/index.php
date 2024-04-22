
<?Php
    ob_start();
    session_start();
?>

<?php
    if (isset($_POST["post"])) {
        $error="";
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $error= 'Email & PAssword';
        }
        else {
            $email= strip_tags($_POST['email']);
            $password= strip_tags($_POST['password']);

            $sql = $pdo -> prepare("SELECT * FROM $dbname WHERE email=$email");
            $sql -> execute(array($email));

            $total = $sql -> rowCount ();
            $results = $sql -> fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $result) {
                $password_bd = $data['password'];
            }

            if ($total == 0) {
                $error= "Valeurs de connexion incorrectes <br/>";
            }
            else {
                if ($password_bd == md5 ($password)) {
                    $_SESSION['user'] = $data;
                    header ("location : zone_admin/index.php");
                } else {
                    $error = 'Mot de passe incorrect';
                }
            }
        }
    }
?>