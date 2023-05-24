<?php
require_once('functions.php');

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

if (!isset($_GET['id'])) {
    header('Location: persos.php?msg=id non passé !');
}

$bdd = connect();

$sql = "SELECT * FROM perso WHERE id = :id AND user_id=:user_id;";

$sth = $bdd->prepare($sql);

$sth->execute([
    'id' => $_GET['id'],
    'user_id' => $_SESSION['user']['id']
]);

$perso = $sth->fetch();
?>

<?php require_once('_header.php'); ?>
<div class="box nobackground">

    <h1>Détails du personnage</h1>
    <div>
        <b> Nom:</b>
        <?php echo $perso['name']; ?>
    </div>

    <div class="box mt-2">
        <b style="float:center">
            <img src="https://w7.pngwing.com/pngs/698/556/png-transparent-logo-physical-strength-strength-training-computer-icons-strength-miscellaneous-hand-monochrome.png"
                width=23vw; height=23vh; />
        </b>
        <b> Force:</b>
        <?php echo $perso['for']; ?>
    </div>

    <div class="box mt-2">
        <b style="float:center">
            <img src=" https://static.thenounproject.com/png/3937336-200.png" width=23vw; height=23vh; />
        </b>
        <b> Dextérité:</b>
        <?php echo $perso['dex']; ?>
    </div>

    <div class="box mt-2">
        <b style="float:center">
            <img src="https://cdn1.iconfinder.com/data/icons/seo-part-1-1/128/Idea-Thinking-Nice-Brilliant-Eureka-Bulb-Clever-512.png"
                width=23vw; height=23vh; />
        </b>
        <b> Intélligence:</b>
        <?php echo $perso['int']; ?>
    </div>

    <div class="box mt-2">
        <b style="float:center">
            <img src="https://www.vhv.rs/dpng/d/508-5088173_download-free-png-charisma-charismatic-charm-charming-charming.png"
                width=23vw; height=23vh; />
        </b>
        <b> Charisme:</b>
        <?php echo $perso['cha']; ?>
    </div>

    <div class="box mt-2">
        <b style="float:center">
            <img src="https://cdn2.iconfinder.com/data/icons/rpg-fantasy-game-basic-ui/512/game_ui_attack_speed_increase-512.png"
                width=23vw; height=23vh; />
        </b>
        <b> Vitesse:</b>
        <?php echo $perso['vit']; ?>
    </div>

    <div class="box mt-2">
        <b style="float:center">
            <img src="https://static.vecteezy.com/system/resources/previews/006/689/313/large_2x/heart-icon-pixel-art-isolated-on-white-background-free-vector.jpg"
                width=23vw; height=23vh; />
        </b>
        <b> Point de vie:</b>
        <?php echo $perso['pdv']; ?>
    </div>

    <div class="box mt-2">
        <b style="float:center">
            <img src="https://png.pngtree.com/element_our/png/20181114/gold-icon-png_239829.jpg" width=23vw;
                height=23vh; />
        </b>
        <b> Pièce d'or: </b>
        <?php echo $perso['gold']; ?>
    </div>

    <div class="mt-4">
        <a href="persos.php" class="btn btn-grey">Retour</a>
    </div>
</div>
</body>

</html>