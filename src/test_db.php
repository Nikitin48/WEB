<?php
$host = 'db';
$dbname = 'test_db';
$user = 'user';
$password = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    echo "Подключение к базе данных успешно!";
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}
?>