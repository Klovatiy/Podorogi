<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Перевірка на заповненість полів
    if (empty($username) || empty($email) || empty($password)) {
        echo "Будь ласка, заповніть всі поля.";
        exit();
    }

    // Перевірка, чи вже існує користувач з таким ім'ям користувача або електронною поштою
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? OR email = ?');
    $stmt->execute([$username, $email]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        echo "Ім'я користувача або електронна пошта вже існують.";
        exit();
    }

    // Хешування пароля і вставка даних у базу
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
    $stmt->execute([$username, $email, $hashedPassword]);

    // Перенаправлення на сторінку входу
    header('Location: login.html');
    exit();
}
?>
