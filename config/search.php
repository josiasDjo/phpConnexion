<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '\projects\examen\config/conbd.php');
?>

<?php
    if (isset($_POST['rechercher'])) {
        $q = $_POST['rechercher'];
    } else {
        header("Location: /admin/logout.php");
    }
?>

<?php
    $x = 0;
    $sql = $bdd->prepare("SELECT * FROM tuser WHERE email LIKE '%" . $q . "%'");
    $sql->execute();
    $total = $sql->rowCount();
    if ($total > 0) {
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $data) {
            $x++;
            echo '<tr>
                <td><a href="index.php?cible=edit&id=' . $data['idUser'] . '">
                        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit"></i></button>
                    </a> 
                    <a href="index.php?cible=delete&id=' . $data['id'] . '"  onclick="return confirm(\'Are you sure you want to delete this item\')">
                        <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                    </a>
                        </td>
                <td>' . $x . '</td>
                <td>' . $data['email'] . '</td>
                <td>' . $data['password'] . '</td>
            </tr>';
        }
    } else {
        echo '<tr><td colspan="4" style="color:red;">Aucun element!</td></tr>';
    }
?>