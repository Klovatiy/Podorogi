<?php
require 'config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

