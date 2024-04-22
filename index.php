<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="dist/output.css" rel="stylesheet"> -->
</head>
    <?php require_once ("config/conbd.php"); ?>
    <div class="container">
        <form action="config/login.php" method="post">
            <input type="email" placeholder="Email" name="email">
            <input type="text" placeholder="Password" name="password">
            <input type="submit" value="Login" name="login">
        </form>
    </div>
    
</l>
</html>