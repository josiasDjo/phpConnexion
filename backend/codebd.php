<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $password ="";
    $dbname = "lic2lsi";

   try {
        $conn = new PDO ("mysql:host = $dbuser;$dbname", $dbuser, $password);
        echo "Connexion réussie !! ";
   }
   catch (PDOException $e) {
        echo "Connexion error " . $e->getMessage();
   }

   $conn = null;
?>