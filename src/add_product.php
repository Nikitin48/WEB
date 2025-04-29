<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <h1>Добавление нового товара</h1>
        
        <form action="save_product.php" method="post">
            <div class="form-group">
                <label for="name">Название товара:</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="category">Категория:</label>
                <select id="category" name="category" required>
                    <option value="Ноутбуки">Ноутбуки</option>
                    <option value="Смартфоны">Смартфоны</option>
                    <option value="Телевизоры">Телевизоры</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="price">Цена (руб):</label>
                <input type="number" id="price" name="price" min="1" required>
            </div>
            
            <div class="form-group">
                <label for="quantity">Количество на складе:</label>
                <input type="number" id="quantity" name="quantity" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="description">Описание:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            
            <button type="submit">Добавить товар</button>
        </form>
        
        <p><a href="index.php">На главную</a></p>
    </div>
</body>
</html>