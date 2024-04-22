<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="dist/output.css" rel="stylesheet">
</head>
    <?php 
        require_once ("config/conbd.php"); 
        require_once ("config/login.php");
    ?>
    <div class="container">
        <h1>Connexion</h1>
        <form action="" method="post">
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required> 
            <input type="submit" value="Login" name="login" class="btnSend">
        </form>
    </div>

</l>
</html>