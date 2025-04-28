<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить животное</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <h1>Добавить новое животное</h1>
        
        <form action="save_animal.php" method="post">
            <div class="form-group">
                <label for="animal_name">Имя животного:</label>
                <input type="text" id="animal_name" name="animal_name" required 
                       pattern="[A-Za-zА-Яа-я\s]{2,50}" 
                       title="Только буквы (2-50 символов)">
            </div>
            
            <div class="form-group">
                <label for="species">Вид животного:</label>
                <input type="text" id="species" name="species" required>
            </div>
            
            <div class="form-group">
                <label for="age">Возраст:</label>
                <input type="number" id="age" name="age" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="date">Дата поступления:</label>
                <input type="date" id="date" name="date" required>
            </div>
            
            <div class="form-group">
                <label for="health">Состояние здоровья:</label>
                <select id="health" name="health" required>
                    <option value="Хорошее">Хорошее</option>
                    <option value="Нормальное">Нормальное</option>
                    <option value="Плохое">Плохое</option>
                </select>
            </div>
            
            <button type="submit">Добавить животное</button>
        </form>
        
        <p><a href="index.php">Вернуться на главную</a></p>
    </div>
</body>
</html>