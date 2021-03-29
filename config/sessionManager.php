<?php 
class SessionManager extends Connexion {
    // 1. Créer session
    // 2. Supprimer session
    // 3. Controle login
    // 4. Informations utilisateur

    static function createSession($array = []) {
        if (count($array) != 0) {
            foreach ($array as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }
    }

    static function deleteSession() {
        session_destroy();
    }

    // controle LOGIN 
    public function controle() {
        if (isset($_SESSION['email']) and isset($_SESSION['mdp'])) {
            $email = strip_tags($_SESSION['email']);
            $mdp = strip_tags($_SESSION['mdp']);
            $controle = $this->db->prepare("SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp");
            $controle->bindParam(":email", $email, PDO::PARAM_STR);
            $controle->bindParam(":mdp", $mdp, PDO::PARAM_STR);
            $controle->execute();

            $number = $controle->rowCount();
            if ($number == 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function infoUtilisateur() {
        if ($this->controle()) {
            $request = $this->db->prepare("SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp");
            $request->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
            $request->bindParam(':mdp', $_SESSION['mdp'], PDO::PARAM_STR);
            $request->execute();

            return $request->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}

?>