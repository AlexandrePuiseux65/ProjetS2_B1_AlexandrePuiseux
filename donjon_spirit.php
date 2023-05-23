<?php
    require_once('./classes/Spirit.php');
    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    // On voit si il choisit une bénediction 
    if (!isset($_SESSION['benediction']))
    {
        $nb = random_int(0,100);

        if ($nb >= 0) {
            $_SESSION['perso']['pdv'] += random_int(5,15);
        }
    }

    $bdd = connect();

    $sql= "SELECT * FROM `room` WHERE donjon_id = :donjon_id ORDER BY RAND() LIMIT 1;";

    $sth = $bdd->prepare($sql);

    $sth->execute([
        'donjon_id' => $_GET['id']
    ]);

    $room = $sth->fetch();

    require_once('./classes/Room.php');
    $roomObject = new Room($room);
    $roomObject->makeAction();

    require_once('_header.php');
?>

<div class="container">
        <div class="row mt-4">
            <div class="px-4">
                <?php require_once('_perso.php'); ?>
            </div>
            <div class="footer">
                <h1><?php echo $roomObject->getName(); ?></h1>
                <p><?php echo $roomObject->getDescription(); ?></p>
                <?php echo $roomObject->getHTML(); ?>
            </div>
            <div class="px-4">
            </div>
        </div>
    </div>
    </body>
</html>

