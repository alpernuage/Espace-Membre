<?php 
require_once '../config/connexion.php';
require_once '../template/header.php';
?>
<h3>Se connecter</h3>

<?php 
if (isset($_COOKIE['login'])) {
    $json = json_decode($_COOKIE['login'], true);
    sessionManager::createSession($json);
    helper::redirect("..");
}

if ($_POST) {
    $se_souvenir = intval($_POST['se_souvenir']);
    $email= strip_tags($_POST['email']);
    $mdp= strip_tags($_POST['mdp']);

    if ($email!= "" and $mdp!="") {
        $mdp = md5($mdp);
        $request = $connexion->db->prepare("SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp");
        $request->bindParam(':email', $email, PDO::PARAM_STR);
        $request->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $request->execute();
        $number = $request->rowCount();

        if ($number == 0) {
            echo "Utilisateur non trouvé";
        } else {
            if ($se_souvenir == 1) {
                $cookieArray = array('email' =>$email, 'mdp'=>$mdp);
                $cookieArray = json_encode($cookieArray);
                setcookie("login", $cookieArray, time()+36000, '/');
            }

            sessionManager::createSession(array('email'=>$email, 'mdp'=>$mdp));
            helper::redirect("..");
        }

    } else {
        echo "Veuiller remplir tous les champs.";
    }
}
?>

<form action="" method="POST">
    <div class="form">
        <span>Email</span>
        <input type="email" name="email" id="">
    </div>
    <div class="form">
        <span>Mot de passe</span>
        <input type="password" name="mdp" id="">
    </div>
    <div class="form">
        <span>Se souvenir de moi</span>
        <input type="checkbox" name="se_souvenir" value="1">
    </div>
    <div class="form">
        <button>Connexion</button>
    </div>


</form>