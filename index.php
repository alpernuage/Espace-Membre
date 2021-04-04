<?php
require_once 'config/connexion.php';
if (!$sessionManager->controle()) {
    helper::redirect(SITE_URL."login.php");
    die();
}
$infoUtilisateur = $sessionManager->infoUtilisateur();
require_once 'template/header.php';
?>

<div class="title">Bonjour <?= $infoUtilisateur['prenom'] ?> </div>
<div class="info">Prénom Nom : <?php echo $infoUtilisateur['prenom'] ?> <?php echo $infoUtilisateur['nom'] ?> </div>
<a href="https://localhost/udemy-Mert-Buldur/espace_membre/operations/logout.php">Déconnexion</a>