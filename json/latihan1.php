<?php

// $tabel_mahasiswa = [
//     [
//         "nama" => "Ririn",
//         "nim" => "2217020031",
//         "email" => "ririnafifah021@gmail.com"
//     ],
//     [   
//         "nama" => "ratih",
//         "nim" => "2215020045",
//         "email" => "ratihelfitri@gmail.com"

//

$dbh = new PDO ('mysql:host=localhost;dbname=db_mahasiswa','root', '');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);



$data = json_encode($mahasiswa);
echo$data;

?>