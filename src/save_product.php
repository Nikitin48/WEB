<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $category = $_POST['category'];
    $price = (float)$_POST['price'];
    $quantity = (int)$_POST['quantity'];
    $description = trim($_POST['description']);
    
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Название товара обязательно";
    }
    if ($price <= 0) {
        $errors[] = "Цена должна быть положительной";
    }
    if ($quantity < 0) {
        $errors[] = "Количество не может быть отрицательным";
    }

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
                <h1>Ошибка при добавлении товара</h1>
                <ul>';
        
        foreach ($errors as $error) {
            echo "<li class='error'>$error</li>";
        }
        
        echo '</ul>
                <p><a href="add_product.php">Вернуться к форме</a></p>
            </div>
        </body>
        </html>';
        exit;
    }
    
    $data = [
        $name,
        $category,
        $price,
        $quantity,
        $description,
        date('Y-m-d H:i:s') 
    ];
    
    $file = fopen('products.csv', 'a');
    if (filesize('products.csv') === 0) {
        fputcsv($file, ['Название', 'Категория', 'Цена', 'Количество', 'Описание', 'Дата добавления']);
    }
    fputcsv($file, $data);
    fclose($file);
    
    echo '<!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Успех</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Товар успешно добавлен!</h1>
            
            <p><strong>Название:</strong> ' . htmlspecialchars($name) . '</p>
            <p><strong>Категория:</strong> ' . htmlspecialchars($category) . '</p>
            <p><strong>Цена:</strong> ' . htmlspecialchars($price) . ' руб</p>
            <p><strong>Количество:</strong> ' . htmlspecialchars($quantity) . '</p>
            
            <p><a href="add_product.php">Добавить еще один товар</a></p>
            <p><a href="view_products.php">Посмотреть каталог</a></p>
        </div>
    </body>
    </html>';
} 
?>