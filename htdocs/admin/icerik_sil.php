<?php
session_start();
if (!isset($_SESSION['name'])) {
echo 'no_login';
    die();
}


include '../inc/db.php';
$query = $db->prepare("DELETE FROM icerikler WHERE id = :id");
$delete = $query->execute(array(
    'id' => $_GET['id']
));
header('Location: ' . $_SERVER['HTTP_REFERER']);
