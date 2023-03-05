<?php
namespace View;
use Error;
use PDO;
use PDOException;
use Model\UserModel;?>
<!--List out advertisements in application-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<main class="main">
    <header class="list-header">
        <h1>Users</h1>
    </header>
    <?php
    //Cant find class
    /*try {

        $users = UserModel::getAllUsers();

    }catch (Error $e) {
        echo $e->getMessage();
        exit();
    }*/
    //because the Model is not working
    try {
        $db = new PDO('mysql:host=localhost;dbname=rabit', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Database Error:'.$e->getMessage();
        exit();
    }

    $statement = $db->query('SELECT * FROM users');
    $users = $statement->fetchAll();
    $statement->closeCursor();
    //because the Model is not working
    ?>
    <?php if ($users) {
        echo '<table>
                <th>Id</th>
                <th>Name</th>
            ';
        foreach ($users as $row) {
            echo '
                    <tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['name'] . '</td>
                </tr>';
        }
    echo '</table>';?>
    <?php }else{ ?>
        <p>There are no user to display.</p>
    <?php }?>
    <nav id="list">
        <ul>
            <a href="../../index">Back</a>
        </ul>
    </nav>
</main>
</body>
</html>
