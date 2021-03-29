<?php
require_once 'config/connexion.php';
if (!$sessionManager->controle()) {
    helper::redirect("/operations/login.php");
    die();
}
$infoUtilisateur = $sessionManager->infoUtilisateur();

?>

<div class="title">Bonjour <?= $infoUtilisateur['prenom'] ?> </div>
<a href="/operations/logout.php">Déconnexion</a>