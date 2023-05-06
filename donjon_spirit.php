<?php
    require_once('./classes/Spirit.php');
    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    // On voit quelle bénédiction il choisit 
    if (!isset($_SESSION['benediction']))
    {
        $nb = random_int(0,100);

        if ($nb >= 0) {
            $_SESSION['perso']['pdv'] += random_int(5,15);
            $_SESSION['benediction']['html'][] = "Vous êtes benediction pas l'esprit, vous sentez votre vitaliter revenir !";
        }
    }

    require_once('_header.php');
?>

<div class="container">
        <div class="row mt-4">
            <div class="px-4">
                <?php require_once('_perso.php'); ?>
            </div>
            </div>
            <div class="px-4">
            </div>
        </div>
    </div>
    </body>
</html>

