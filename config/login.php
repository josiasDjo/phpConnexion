<?php
ob_start();
session_start();
?>
<?php
require_once ("../index.php");
if (isset($_POST['login'])) {
    $error = '';
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = 'Email & Password';
    } else {
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $sql = $bdd->prepare("SELECT * FROM tuser WHERE email=?");
        $sql->execute(array($email));
        $total = $sql->rowCount();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        $password_bd = "";
        foreach ($result as $data) {
            $password_bd = $data['password'];
            echo $password_bd . "<br/>";
        }

        if ($total == 0) {
            $error = 'Valeurs de connexion incorrectes<br/>';
        } else {
            if ($password_bd == $password) {
                $_SESSION['tuser'] = $data;
                // header("location: admin/index.php");
                echo "PAGE ADMINISTRATOR, MODIFER";
            } else {
                $error = 'Mot de passe incorrect<br/>';
                echo $error;
            }
        }
    }
}
?>
