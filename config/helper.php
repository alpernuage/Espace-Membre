<?php 
class Helper {
    // Fonction static est utilisée pour ne pas définir la class Helper sur chaque pages
    static function redirect($url, $temps=0) {
        if ($temps != 0) {
            header("Refresh: $temps; url = $url");
        } else {
            //Si le temps=0 redirection est effectuée directement
            header("Location: $url"); 
        }
    }
}

?>