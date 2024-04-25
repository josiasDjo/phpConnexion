<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
        require_once("headerAdmin.php");
        require_once("../config/conbd.php");
    ?>

    <?php
        ///STATS:
        //1. Total Item
        $sql = $bdd->prepare("SELECT * FROM tuser");
        $sql->execute();
        $total_user = $sql->rowCount();

        //2. Somme
        $sql = $bdd->prepare("SELECT SUM(pu) AS montant FROM produit WHERE id=?");
        $sql->execute(array($id_produit));
        $arr = $sql->fetch();
        if ($arr['montant'] == '') {
            $montant = 0;
        } else $montant = $arr['montant'];
    ?>

</body>

</html>