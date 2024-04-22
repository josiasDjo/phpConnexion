<?php require_once('codebd.php'); ?>
<?php
ob_start();
session_start();
?>
<?php
if(isset($_POST['Valider'])) {
     $error='';    
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $error= 'Email & Password';
    } 
    else {
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
    	$sql = $pdo -> prepare("SELECT * FROM user WHERE email=?");
    	$sql->exec(array($email));
    	$total = $sql -> rowCount();
        $result = $sql -> fetchAll(PDO::FETCH_ASSOC);

        $password_bd = "";
        foreach ($result as $data) {
            $password_bd = $data['password'];
        }
        if($total==0) {
            $error= 'Valeurs de connexion incorrectes<br/>';
        } else {
            if($password_bd == md5($password)){
                $_SESSION['user'] = $data;   
                header("location: zone_Admin/index.php");
            }else {
                $error= 'Mot de passe incorrect<br/>'; 
            }         			
        }
    }
}
?>
