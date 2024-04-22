<?php
        $dbhost = 'localhost';
        $dbname = 'lic2lsi';
        $dbuser = 'root';
        $dbpass = '';
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=lic2lsi", $dbuser, $dbpass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch( PDOException $exception ) {
	    echo "Connection error :" . $exception->getMessage();
    }

    // $bdd = null;
?>