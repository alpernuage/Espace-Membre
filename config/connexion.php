<?php 
class Conexion {
    public $db;
    function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8", "root", "");
    }
}

?>