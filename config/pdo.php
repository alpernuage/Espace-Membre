<?php 
try {
    $db = new PDO("mysql:host=localhost;dbname=udemy_mert", "root", "");
    $db->query("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo $e->getMessage();
}

$query = $db->prepare(
    "INSERT INTO kullanicilar SET isim = ?, soyisim = ?, email = ?, sifre = ?, kayit_tarihi = ?"
);
$insert = $query->execute(array("Alper", "Akbulut", "alperakbulut@gmail.com", "012", date("Y-m-d")));
if ($insert) {
    $sonEklenenId = $db->lastInsertId();
    echo "Veri eklendi. Son id : " . $sonEklenenId;
} else {
    echo "Veri eklendi";
}
?>