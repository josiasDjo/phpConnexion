<?php

if (isset($_POST['ajouter'])) {
    $error = '';
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = 'Entrez Email & Password svp';
    } else {

        if ($photo != '') {
            $target_directory = "uploads";
            $photo = $_FILES['image']['name'];
            $photo_base = $_FILES['image']['tmp_name'];
            $photo_data = file_get_contents($photo_base);
            $photo_tmp = base64_encode($photo_data);
            if (isset($_FILES['image']['name'])) {
                $ext = pathinfo($photo, PATHINFO_EXTENSION);
                $file_name = basename($photo, '.' . $ext);
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'JPG') {
                    $error = 'Uploadez le fichier jpg, png, gif uniquement';
                } else {
                    $photo_name = 'avatar-' . rand() . '.' . $ext;
                    move_uploaded_file($photo_tmp, '../img/' . $photo_name);
                }
            }

        } else {
            $photo_name = 'avatar.png';
        }
        $email         = ($_POST['email']);
        $password     = password_hash(($_POST['password']), PASSWORD_DEFAULT);

        try {
            $sql = $bdd -> prepare("INSERT INTO tuser (email, password, photo) VALUES (?, ?, ?)");
            $sql->execute(array($email, $password, $photo_name));
        }
        catch (Exception $e) {
            $error = $e->getMessage();
            echo 'Une erreur est survenue : ' . $error;
        }
        header("location: index.php?cible=addUser");
        //echo'<script type="text/javascript"> window.location.rel="noopener" href = \'index.php\';</script>';
    }
}
