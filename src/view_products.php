<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог товаров | TechStore</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <div class="container">
        <h1>Каталог товаров</h1>
        <?php
        if (file_exists('products.csv') && filesize('products.csv') > 0) {
            echo '<table>
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Цена</th>
                        <th>На складе</th>
                        <th>Описание</th>
                        <th>Дата добавления</th>
                    </tr>
                </thead>
                <tbody>';
            
            $file = fopen('products.csv', 'r');
            fgetcsv($file);
            
            while (($row = fgetcsv($file)) !== false) {
                echo '<tr>
                    <td>' . htmlspecialchars($row[0]) . '</td>
                    <td>' . htmlspecialchars($row[1]) . '</td>
                    <td>' . htmlspecialchars($row[2]) . ' руб</td>
                    <td>' . htmlspecialchars($row[3]) . '</td>
                    <td>' . htmlspecialchars($row[4]) . '</td>
                    <td>' . htmlspecialchars($row[5]) . '</td>
                </tr>';
            }
            
            fclose($file);
            echo '</tbody></table>';
        } else {
            echo '<p>В каталоге пока нет товаров.</p>';
        }
        ?>
        
        <p><a href="index.php">На главную</a></p>
    </div>
</body>
</html>