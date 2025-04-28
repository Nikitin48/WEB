<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список животных</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <div class="container">
        <h1>Список животных в зоопарке</h1>
        
        <?php
        if (file_exists('animals.csv') && filesize('animals.csv') > 0) {
            echo '<table>
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Вид</th>
                        <th>Возраст</th>
                        <th>Дата поступления</th>
                        <th>Состояние здоровья</th>
                    </tr>
                </thead>
                <tbody>';
            
            $file = fopen('animals.csv', 'r');
            // Пропускаем заголовок
            fgetcsv($file);
            
            while (($row = fgetcsv($file)) !== false) {
                echo '<tr>
                    <td>' . htmlspecialchars($row[0]) . '</td>
                    <td>' . htmlspecialchars($row[1]) . '</td>
                    <td>' . htmlspecialchars($row[2]) . '</td>
                    <td>' . htmlspecialchars($row[3]) . '</td>
                    <td>' . htmlspecialchars($row[4]) . '</td>
                </tr>';
            }
            
            fclose($file);
            echo '</tbody></table>';
        } else {
            echo '<p>В зоопарке пока нет животных.</p>';
        }
        ?>
        
        <p><a href="index.php">Вернуться на главную</a></p>
    </div>
</body>
</html>