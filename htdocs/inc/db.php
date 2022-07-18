<?php
error_reporting(1);
try {
    $db = new PDO("mysql:host=localhost;dbname=country_cultures;charset=utf8mb4", "root", "12345");
} catch ( PDOException $e ){
    print $e->getMessage();
}

// config tablosundaki verileri alıp dizi haline çeviriyor
$config_query =  $db->query("SELECT * FROM configs", PDO::FETCH_ASSOC);
$config_array =[];
foreach ($config_query as $config) {
    $configs[$config['key']] = $config['value'];
}

?>