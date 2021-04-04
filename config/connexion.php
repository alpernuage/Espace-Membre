<?php 
session_start();
class Connexion {
    public $db;
    function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8", "root", "");
    }
}

define("SITE_URL", "http://localhost/udemy-Mert-Buldur/espace_membre/operations/");
define("SITE_NAME", "Système d'utilisateur v0");
require_once("sessionManager.php");
require_once("helper.php");
$connexion = new Connexion();
$sessionManager = new SessionManager();
?>