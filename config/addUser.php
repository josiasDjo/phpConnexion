<?php

if (isset($_POST['ajouter'])) {
    $error = '';
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = 'Entrez Email & Password svp';
    } else {
        $photo = $_FILES['image']['name'];
        $photo_tmp = $_FILES['image']['tmp_name'];
        if ($photo != '') {
            $ext = pathinfo($photo, PATHINFO_EXTENSION);
            $file_name = basename($photo, '.' . $ext);
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'JPG') {
                $error = 'Uploadez le fichier jpg, png, gif uniquement';
            } else {
                $photo_name = 'avatar-' . rand() . '.' . $ext;
                move_uploaded_file($photo_tmp, '../img/' . $photo_name);
            }
        } else {
            $photo_name = 'avatar.png';
        }
        $email         = strip_tags($_POST['email']);
        $password     = strip_tags($_POST['password']);

        $sql = $bdd -> prepare("INSERT INTO tuser (email, password, photo) VALUES (?, ?, ?)");
        $sql->execute(array($email, md5($password), $photo_name));

        $error = $e->getMessage();
        header("location: index.php?cible=addUser");
        //echo'<script type="text/javascript"> window.location.rel="noopener" href = \'index.php\';</script>';
    }
}
