<!--List out advertisements in application-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advertisements</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<main class="main">
<header class="list-header">
        <h1>Advertisements</h1>
    </header>
    <?php
    //Cant find class
    /*try {

        $users = AdvertisementModel::getAllAdvertisements();

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
    $statement = $db->query('SELECT * FROM advertisements');
    $advertisements = $statement->fetchAll();
    $statement->closeCursor();
    $statementuser = $db->query('SELECT * FROM users');
    $users = $statementuser->fetchAll();
    $statementuser->closeCursor();
    //because the Model is not working
    ?>
    <?php if ($advertisements) {
        echo '<table>
                <th>Title</th>
                <th>Author</th>
                ';
            foreach ($advertisements as $advertisement) {?>
                       <tr>
                       <?php echo ' <td>'.$advertisement['title'].'</td>';
                            foreach ($users as $user) {
                                    if ($advertisement['userid'] == $user['id']) {
                                        echo ' <td>'. $user['name'].'</td>';
                                         }
                                    }
                                     ?>
                       </tr>

        <?php } echo '</table>';?>
        <?php }else{ ?>
            <p>There are no advertisements to display.</p>
        <?php }?>
    <nav id="list">
        <ul>
            <a href="../../index">Back</a>
        </ul>
    </nav>
</main>
</body>
</html>