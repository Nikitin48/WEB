<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные
    $animal_name = trim($_POST['animal_name']);
    $species = trim($_POST['species']);
    $age = (int)$_POST['age'];
    $date = $_POST['date'];
    $health = $_POST['health'];
    
    // Валидация
    $errors = [];
    
    if (empty($animal_name)) {
        $errors[] = "Имя животного обязательно";
    } elseif (!preg_match('/^[A-Za-zА-Яа-я\s]{2,50}$/u', $animal_name)) {
        $errors[] = "Имя должно содержать только буквы (2-50 символов)";
    }
    
    if (empty($species)) {
        $errors[] = "Вид животного не может быть пустым";
    }
    
    if ($age <= 0) {
        $errors[] = "Возраст должен быть положительным числом";
    }
    
    if (empty($date)) {
        $errors[] = "Дата поступления обязательна";
    }

    // Обработка ошибок
    if (!empty($errors)) {
        echo '<!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <title>Ошибка</title>
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            <div class="container">
                <h1>Ошибка при добавлении животного</h1>
                <ul>';
        
        foreach ($errors as $error) {
            echo "<li class='error'>$error</li>";
        }
        
        echo '</ul>
                <p><a href="add_animal.php">Вернуться к форме</a></p>
            </div>
        </body>
        </html>';
        exit;
    }
    
    // Сохранение в CSV
    $data = [$animal_name, $species, $age, $date, $health];
    
    $file = fopen('animals.csv', 'a');
    if (filesize('animals.csv') === 0) {
        fputcsv($file, ['Имя', 'Вид', 'Возраст', 'Дата поступления', 'Состояние здоровья']);
    }
    fputcsv($file, $data);
    fclose($file);
    
    // Успешное сообщение
    echo '<!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Успех</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Животное успешно добавлено!</h1>
            
            <p><strong>Имя:</strong> ' . htmlspecialchars($animal_name) . '</p>
            <p><strong>Вид:</strong> ' . htmlspecialchars($species) . '</p>
            <p><strong>Возраст:</strong> ' . htmlspecialchars($age) . '</p>
            <p><strong>Дата поступления:</strong> ' . htmlspecialchars($date) . '</p>
            <p><strong>Состояние здоровья:</strong> ' . htmlspecialchars($health) . '</p>
            
            <p><a href="add_animal.php">Добавить еще одно животное</a></p>
            <p><a href="index.php">Вернуться на главную</a></p>
        </div>
    </body>
    </html>';
} 
?>