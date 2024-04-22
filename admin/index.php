<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel=stylesheet>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin</title>
</head>
<body>
    <?php 
        require_once ("../config/conbd.php"); 
    ?>


    <div class="container-admin">
        <div class="navbar_admin">
            <ul>
                <li><i class="fa-solid fa-briefcase"></i> Workspace</li>
                <li> <i class="fa-solid fa-plus"></i> Ajouter Utilisateur</li>
            </ul>
        </div>

        <div class="sub_container_admin">
            <div class="espace_admin">
                <h3>Ajout Utilisateur </h3>
                <div class="search_opt">
                    <input type="search" <input type="submit" class="recherche_pers">
                    <input type="submit" value="Rechercher" name="rechercher" class="evoyer_req">
                </div>
                <div class="addUser">
                    <form action="" method="post">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="" placeholder="Entrer votre email">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="" placeholder="Entrer votre mot de passe">
                        <label for="image">Avatar</label>
                        <input type="file" name="image" id="">
                        <input type="submit" value="Ajouter" name="ajouter" class="btn_envoyer_admin">
                    </form>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Avatar</th>
                            <th>E-mail</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $x=0;
                                $sql = $bdd -> prepare ("SELECT * FROM tuser");
                                $sql -> execute();
                                $total = $sql ->rowCount();
                                if ($total > 0 ) {
                                    $result = $sql ->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $data) {
                                        $x++;
                                        echo '<tr>
                                            <td>
                                                <a href="index.php?cible=edit&id='  . '">
                                                    <button class="btn btn-success btn-sm rounded-0 bg-green-700" type="button" data-toggle="tooltip" data-placement="top" 
                                                    title="" data-original-title="Edit"><i class="fa fa-edit"></i></button>
                                                </a> 
                                                <a href="index.php?cible=delete&id=' . '"  onclick="return confirm(\'Are you sure you want to delete this item\')">
                                                    <button class="btn btn-danger btn-sm rounded-0 bg-red-700" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </td>
                                            <td>
                                                <img src="./../img/' . $data['photo'] . '" style="width:40px;height:40px;border-radius: 10px 5%;">
                                            </td>
                                            <td>' . $data['email'] . '</td>
                                            <td>' . $data['password'] . '</td>
                                        
                                        </tr>';
                                    }
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>