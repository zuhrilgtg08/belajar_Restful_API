<?php

$mahasiswa = [
    [
        "nama" => "Ahmad Zuhril",
        "nis" => "30291",
        "email" => "zuhril14gtg@gmail.com"
    ],

    [
        "nama" => "Fahrizal Zakaria",
        "nis" => "30280",
        "email" => "fahrizal4gtg@gmail.com"
    ]
];

$dbHandler = new PDO('mysql:host=localhost;dbname=phpdasar', 'root', '');
$db = $dbHandler->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa, true);
echo $data;
// var_dump($data);
