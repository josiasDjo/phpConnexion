<?php
if (isset($_GET['idUser'])) {
    $id = $_GET['idUser'];
    $sql = $pdo->prepare("SELECT * FROM user WHERE idUser=?");
    $sql->execute(array($id));
    $total = $sql->rowCount();
    if ($total > 0) {
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $data) {
            $id    =    $data['idUser'];
            $email    =    $data['email'];
            $pwd    =    $data['password'];
            $avatar    =    $data['photo'];
        }
    } else {
        header("Location: logout.php");
    }
} else {
    // header("Location: logout.php");
    echo "header location";
}
?>


<?php
if (isset($_POST['edituser'])) {
    $error = '';
    if (empty($_POST['email']) || empty($_POST['idUser'])) {
        $error = 'Entrez Email & Password svp';
    } else {
        $email     = strip_tags($_POST['email']);
        $id = strip_tags($_POST['id']);
        $old_avatar = strip_tags($_POST['old_avatar']);
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        if ($photo != '') {
            $ext = pathinfo($photo, PATHINFO_EXTENSION);
            $file_name = basename($photo, '.' . $ext);
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'JPG') {
                $error = 'Uploadez le fichier jpg, png, gif uniquement';
            } else {
                //Supprimer ancien avatar s'il est different de avatar.png
                if ($old_avatar != 'avatar.png') {
                    unlink('../img/' . $old_avatar);
                }
                $photo_name = 'avatar-' . rand() . '.' . $ext;
                move_uploaded_file($photo_tmp, '../img/' . $photo_name);
            }
        } else {
            $photo_name = $old_avatar;
        }
        $sql = $pdo->prepare("UPDATE user SET email=?, photo=? WHERE id=?");
        $sql->execute(array($email, $photo_name, $id));
        header("location: index.php?cible=edit&id=" . $id . "&msg='success'");
    }
}
?>
