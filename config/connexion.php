<?php 
session_start();
class Conexion {
    public $db;
    function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8", "root", "");
    }
}
require_once("sessionManager.php");
require_once("helper.php");
$connexion = new Conexion();
?>