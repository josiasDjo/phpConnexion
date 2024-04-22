<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?Php
        require_once ("codebd.php")
    ?>
    <div class="container">
        <div class="part1">
            <h1>Login</h1>
            <p>En vous connectant vous acceptez les termes </p>
        </div>
        <div class="part2">
            <form action="/backend/login.php" method="post">
                <input type="text" placeholder="email">
                <input type="password" placeholder="Password">
                <input type="submit" value="Valider">
            </form>
        </div>
    </div>


</body>
</html>