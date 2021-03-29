<?php 
require_once '../config/connexion.php';
if ($sessionManager->controle()) {
    sessionManager::deleteSession();
    helper::redirect("/operations/login.php");
} else {
    helper::redirect("/operations/login.php");
}
?>