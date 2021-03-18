<?php 
require_once '../config/connexion.php';
require_once '../template/header.php';
?>
<h3>S'inscrire</h3>

<?php 
if ($_POST) {
    $prenom = strip_tags($_POST['prenom']);
    $nom = strip_tags($_POST['nom']);
    $email = strip_tags($_POST['email']);
    $mdp = strip_tags($_POST['mdp']);
    $sexe = intval($_POST['sexe']);

    if ($prenom != "" AND $nom != "" AND $email != "" AND $mdp != "" AND $sexe != "" ) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Format email est correct";
        } else {
            echo "Format email est erroné";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>

<form action="" method="POST">
    <div class="form">
        <span>Prenom</span>
        <input type="text" name="prenom" id="">
    </div>
    <div class="form">
        <span>Nom</span>
        <input type="text" name="nom" id="">
    </div>
    <div class="form">
        <span>Email</span>
        <input type="email" name="email" id="">
    </div>
    <div class="form">
        <span>Mot de passe</span>
        <input type="password" name="mdp" id="">
    </div>
    <div class="form">
        <span>Sexe</span>
        <select name="sexe" id="">
            <option value="0">Homme</option>
            <option value="1">Femme</option>
        </select>
    </div>
    <div class="form">
        <button>S'inscrire</button>
    </div>


</form>