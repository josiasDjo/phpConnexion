<?php
ob_start();
session_start();
?>
<?php
// require_once ("../index.php");
if (isset($_POST['login'])) {
    $error = '';
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = 'Email & Password';
    } else {
        $email = strip_tags($_POST['email']);
        $password = password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT);
        $sql = $bdd->prepare("SELECT * FROM tuser WHERE email=?");
        $sql->execute(array($email));
        $total = $sql->rowCount();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        $password_bd = "";
        foreach ($result as $data) {
            $password_bd = $data['password'];
            // echo "$password_bd";
        }

        if ($total == 0) {
            $error = 'Valeurs de connexion incorrectes<br/>';
        } else {
            if (password_verify($password, $password_bd)) {
                echo "psw Utilisateur : " . $password . "<br/>" . "Pwd_bd : " . $password_bd . "<br/>";
                $_SESSION['tuser'] = $data;
                header("location: admin/index.php");
                // echo "PAGE ADMINISTRATOR, MODIFER";
            } else {
                $error = 'Mot de passe incorrect<br/>';
                echo "psw Utilisateur : " . $password . "<br/>" . "Pwd_bd : " . $password_bd . "<br/>";
                echo "$error";
            }
        }
    }
}
?>
