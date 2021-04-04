<?php 
require_once '../config/connexion.php';
if ($sessionManager->controle()) {
    sessionManager::deleteSession();
    setcookie("login", $cookieArray, time()-36000);

    helper::redirect("./login.php");
} else {
    helper::redirect("./login.php");
}
?>