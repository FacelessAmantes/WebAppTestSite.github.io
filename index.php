<?php
session_start(); // Начало сессии

// Параметры подключения к базе данных
$host = 'MySQL-8.2'; // Хост
$db = 'xacaton'; // Имя базы данных
$user = 'root'; // Имя пользователя
$pass = ''; // Пароль

try {
    // Создание подключения к базе данных с использованием PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // Установка режима ошибок PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Обработка ошибок подключения
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Обработка регистрации
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $inn = $_POST['inn'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хеширование пароля

    // Проверка, существует ли уже пользователь с таким email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser   = $stmt->fetch();

    if ($existingUser ) {
        echo "Пользователь с таким email уже существует!";
    } else {
        // Вставка данных в таблицу
        $stmt = $pdo->prepare("INSERT INTO users (full_name, email, inn, password) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$full_name, $email, $inn, $password])) {
            echo "Регистрация прошла успешно!";
        } else {
            echo "Ошибка регистрации!";
        }
    }
}

// Обработка авторизации
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Проверка существования ключей в массиве $_POST
    if (isset($_POST['inn']) && isset($_POST['password'])) {
        $inn = $_POST['inn'];
        $password = $_POST['password'];

        // Получение пользователя из базы данных
        $stmt = $pdo->prepare("SELECT * FROM users WHERE inn = ?");
        $stmt->execute([$inn]);
        $user = $stmt->fetch();

        // Проверка пароля
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            echo "Авторизация прошла успешно!";
            // Перенаправление на защищенную страницу
            header("Location: index1.php");
            exit();
        } else {
            echo "Неверный логин или пароль!";
        }
    } else {
        echo "Пожалуйста, заполните все поля для авторизации.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles112542.css">
    <title>ТСЖ</title>
    <style>
        /* Основные стили */
   
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-image: url('veter.jpg'); /* Замените на путь к вашему изображению */
            background-size: cover; /* Заполнение всего экрана */
            background-repeat: no-repeat; /* Без повторения */
            color: white; /* Цвет текста */
            max-width: 100%;
            overflow-x: hidden;
        }


        header {
            height: 80px;
            width: 100vw;
            padding: 0 30px;
            background-color:rgb(255, 255, 255);
            position: fixed;
            z-index: 100;
            box-shadow: 1px 1px 15px rgba(161, 182, 253, 0.825);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .LLogo {
            height: 70px;
            width: 170px;
        }
        /* Навигационное меню */

.icn {
    height: 30px;
}

.menuicn {
    cursor: pointer;
}

.searchbar,
.message,
.logosec {
    display: flex;
    align-items: center;
    justify-content: center;
}

.searchbar2 {
    display: none;
}

.message {
    gap: 40px;
    position: relative;
    cursor: pointer;
}


.dp {
    height: 40px;
    width: 40px;
    background-color: #626262;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.main-container {
            display: flex; /* Используем Flexbox для расположения элементов */
            width: 100vw;
            position: relative;
            top: 70px; /* Сдвигаем вниз под header */
            z-index: 1;
            justify-content: center; /* Центрируем содержимое */
            align-items: center; /* Центрируем по вертикали */
            height: calc(100vh - 70px); /* Высота с учетом заголовка */
        }

        .modal {
            display: none; /* Скрыто по умолчанию */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            color: black;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
            border-radius: 10px; /* Скругленные углы */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Тень */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Стили для полей ввода */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%; /* Полная ширина */
            padding: 12px 15px; /* Отступы */
            margin: 8px 0; /* Отступы сверху и снизу */
            border: 1px solid #ccc; /* Граница */
            border-radius: 5px; /* Скругленные углы */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Тень */
            font-size: 16px; /* Размер шрифта */
            transition: border-color 0.3s; /* Плавный переход для цвета границы */
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: rgb(40, 71, 133); /* Цвет границы при фокусе */
            outline: none; /* Убираем контур */
        }

        /* Стили для кнопки регистрации */
        input[type="submit"] {
            background-color: rgb(40, 71, 133);
            color: white;
            border: none;
            padding: 12px 20px; /* Отступы для кнопки */
            border-radius: 5px; /* Скругленные углы */
            cursor: pointer;
            font-size: 16px; /* Размер шрифта */
            transition: background-color 0.3s, transform 0.3s; /* Плавный переход для фона и трансформации */
        }

        input[type="submit"]:hover {
            background-color: rgb(30, 50, 100); /* Цвет фона при наведении */
            transform: scale(1.05); /* Увеличение кнопки при наведении */
        }


button {
            background-color:rgb(40, 71, 133);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px; /* Размер шрифта */
        }


        footer {
            background-color: #1a315e; /* Полупрозрачный фон для подвала */
            color: white;
            text-align: center;
            padding: 10px 20px;
            position: relative;
            bottom: 0;
            width: 100%;
            height: 60px; /* Высота подвала */
            margin-top:10px; /* Отодвигает подвал вниз */
        }

        .register-button,
        .login-button {
            padding: 15px 30px; /* Увеличенные отступы для кнопки */
            font-size: 20px; /* Размер шрифта для кнопки */
            border-radius: 25px; /* Скругленные углы */
            margin: 0 10px; /* Отступы между кнопками */
        }
</style>
<body>

<header>
    <img src="1540771.png" class="LLogo">
    <div class="message">
        <div class="circle"></div>
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="">
        <div class="dp">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="dp">
        </div>
    </div>
</header>

<div class="main-container">
    <button class="login-button" onclick="document.getElementById('loginModal').style.display='block'">Войти</button>
    <button class="register-button" id="registerBtn">Зарегистрироваться</button> <!-- Добавлен ID -->
</div>

<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Вход</h2>
        <form method="POST">
            <input type="text" name="inn" placeholder="ИНН" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="submit" name="login" value="Войти">
        </form>
    </div>
</div>

<div id="registrationModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form id="registrationForm" action="" method="POST">
            <label for="full_name">ФИО:</label><br>
            <input type="text" id="full_name" name="full_name" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="inn">ИНН:</label><br>
            <input type="text" id="inn" name="inn" required><br><br>
            
            <label for="password">Пароль:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" name="register" value="Зарегистрироваться">
        </form>
    </div>
</div>

<footer>
    <p>&copy; 2023 Ваша Компания. Все права защищены.</p>
</footer>

<script>
    // Получаем модальные окна
    var registrationModal = document.getElementById("registrationModal");
    var loginModal = document.getElementById("loginModal");

    // Получаем элемент кнопки "Регистрация"
    var registerBtn = document.getElementById("registerBtn");
    var loginBtn = document.querySelector(".login-button");

    // Получаем элементы <span>, которые закрывают модальные окна
    var closeBtns = document.getElementsByClassName("close");

    // Когда пользователь нажимает на кнопку "Зарегистрироваться", открывается модальное окно регистрации
    registerBtn.onclick = function() {
        registrationModal.style.display = "block";
    }

    // Когда пользователь нажимает на кнопку "Войти", открывается модальное окно авторизации
    loginBtn.onclick = function() {
        loginModal.style.display = "block";
    }

    // Закрытие модального окна при нажатии на <span> (x)
    for (let i = 0; i < closeBtns.length; i++) {
        closeBtns[i].onclick = function() {
            registrationModal.style.display = "none";
            loginModal.style.display = "none"; // Закрываем также окно авторизации
        }
    }

    // Закрытие модального окна при клике вне его
    window.onclick = function(event) {
        if (event.target == registrationModal) {
            registrationModal.style.display = "none";
        }
        if (event.target == loginModal) {
            loginModal.style.display = "none";
        }
    }
</script>


</body>
</html>
