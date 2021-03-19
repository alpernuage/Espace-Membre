<?php 
class SessionManager {
    static function createSession($array = []) {
        if (count($array) != 0) {
            foreach ($array as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }
    }
}

?>