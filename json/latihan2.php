<?php

$data = file_get_contents('coba.json');
$mahasiswa = json_decode($data, false);

var_dump($mahasiswa);
echo $mahasiswa[0] ["pembimbing"]["pembimbing1"];

?>