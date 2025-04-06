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
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Получение пользователя из базы данных
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Проверка пароля
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            echo "Авторизация прошла успешно!";
            // Перенаправление на защищенную страницу
            header("Location: protected_page.php");
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

        :root {
            --background-color1: #fafaff;
            --background-color2: #ffffff;
            --background-color3: #ededed;
            --background-color4:rgba(109, 93, 255, 0.64);
            --primary-color: #008080; /* Бирюзовый */
            --secondary-color: #004d4d; /* Темный бирюзовый */
            --border-color: #3f0097;
            --one-use-color: #3f0097;
            --two-use-color: #5500cb;
        }

        body {
            background-color: var(--background-color4);
            max-width: 100%;
            overflow-x: hidden;
            background-image: url('veter.jpg');
            background-repeat: no-repeat;
            background-size: cover;
          
        }

        header {
            height: 100px;
            width: 100vw;
            padding: 0 30px;
            background-color: var(--background-color1);
            position: fixed;
            z-index: 100;
            box-shadow: 1px 1px 15px rgba(161, 182, 253, 0.825);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        LLogo {
            height: 190px;
            width: 80px;
        }


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


.searchbar input {
    width: 250px;
    height: 42px;
    border-radius: 50px 0 0 50px;
    background-color: var(--background-color3);
    padding: 0 20px;
    font-size: 15px;
    outline: none;
    border: none;
}

.searchbtn {
    width: 50px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 0px 50px 50px 0px;
    background-color: var(--secondary-color);
    cursor: pointer;
}

.message {
    gap: 40px;
    position: relative;
    cursor: pointer;
}

.circle {
    height: 7px;
    width: 7px;
    position: absolute;
    background-color: #fa7bb4;
    border-radius: 50%;
    left: 19px;
    top: 8px;
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
            display: flex;
            width: 100vw;
            position: relative;
            top: 70px;
            z-index: 1;
        }

        .box-container {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
            gap: 50px;
        }

        .box {
            height: 200px;
            width: 350px;
            border-radius: 20px;
            box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            background-color: #6aae95;
        }

        .box:hover {
            transform: scale(1.08);
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #008080;
        }

        th {
            background-color: #008080;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #e0f7f7; /* Светло-бирюзовый для четных строк */
        }

        /* Удаление изменения цвета при наведении на строки */
        tr:hover {
            background-color: inherit; /* Убираем изменение цвета при наведении */
        }

        /* Стили для кнопок "Подтвердить" и "Отклонить" */
        .action-button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 5px;
        }

        .action-button.reject {
            background-color: red; /* Красный для отклонения */
        }

        .action-button:hover {
            background-color: var(--secondary-color);
        }

.box {
    position: relative; 
    height: 200px;
    width: 350px;
    border-radius: 20px;
    box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
    background-color: #6aae95;
}

       
.full-width {
    width: 100vw; /* Full width when nav is closed */
    margin-left: 0; /* Remove margin */
}

.dpicn {
    height: 42px;
}

.main {
    height: calc(100vh - 70px);
    width: 100%;
    overflow-y: scroll;
    overflow-x: hidden;
    padding: 40px 30px 30px 30px;
}

.main::-webkit-scrollbar-thumb {
    background-image: linear-gradient(to bottom, rgb(0, 0, 85), rgb(0, 0, 50));
}

.main::-webkit-scrollbar {
    width: 5px;
}

.main::-webkit-scrollbar-track {
    background-color: #9e9e9eb2;
}

.box-container {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-wrap: wrap;
    gap: 50px;
}

.nav {
    min-height: 91vh;
    width: 250px;
    background-color: var(--background-color2);
    position: absolute;
    top: 0px;
    left: 0;
    box-shadow: 1px 1px 10px rgba(198, 189, 248, 0.825);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
    padding: 30px 0 20px 10px;
    transition: transform 0.5s ease-in-out; /* Smooth transition */
}


.navcontainer::-webkit-scrollbar {
    display: none;
}

.navclose {
    transform: translateX(-100%); /* Move the nav out of view */
}

.nav-option {
    width: 250px;
    height: 60px;
    display: flex;
    align-items: center;
    padding: 0 20px;
    gap: 20px;
    transition: all 0.1s ease-in-out;    
}

.nav-option h3 {
        text-align: left; /* Выравнивание текста по левому краю */
    }

.nav-option a {
    text-decoration: none;
    color: inherit; /* Установите цвет текста по умолчанию */
}

.nav-upper-options {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 30px;
}


.logout button img {
        margin-right: 10px; /* Отступ между изображением и текстом */
    }

.option1 {
    border-left: 5px solidrgb(255, 255, 255);
    background-color:rgb(255, 255, 255);
    color: black;
    cursor: pointer;
}


.box {
    height: 200px;
    width: 350px;
    border-radius: 20px;
    box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.box:hover {
    transform: scale(1.08);
}

.box img {
    height: 50px;
}

.box .text {
    color: white;
}

.t-op-nextlvl {
    font-size: 14px;
    letter-spacing: 0px;
    font-weight: 600;
}


@media screen and (max-width: 320px) {
    .recent-Articles {
        font-size: 12px;
    }

    .view {
        width: 50px;
        font-size: 8px;
        height: 27px;
    }

    .report-header {
        height: 60px;
        padding: 10px 5px 5px 5px;
    }

    .t-op {
        font-size: 12px;
    }

    .t-op-nextlvl {
        font-size: 10px;
    }

    .report-topic-heading,
    .item1,
    .items {
        width: 300px;
    }

    .report-body {
        padding: 10px;
    }

    .label-tag {
        width: 70px;
    }

    .searchbtn {
        width: 40px;
    }

    .searchbar2 input {
        width: 180px;
    }
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid var(--primary-color);
}

th {
    background-color: var(--primary-color);
    color: white;
}

tr:nth-child(even) {
    background-color: #e0f7f7; /* Светло-бирюзовый для четных строк */
}


button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--secondary-color);
        }
     /* Стили для модального окна */
.modal {
    display: none; /* Скрыто по умолчанию */
    position: fixed; /* Открепленное положение */
    z-index: 1; /* На переднем плане */
    left: 0;
    top: 0;
    width: 100%; /* Полная ширина */
    height: 100%; /* Полная высота */
    overflow: auto; /* Прокрутка, если необходимо */
    background-color: rgba(0, 0, 0, 0.5); /* Полупрозрачный фон */
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% сверху и центрирование */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Ширина модального окна */
    max-width: 600px; /* Максимальная ширина */
    border-radius: 8px; /* Скругленные углы */
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

</style>
<body>

<header>
    <img src="1540771.png" class="LLogo">
    <div class="message">
        <div class="circle"></div>
        <button class="icn" onclick="openLoginModal()">Войти</button>
        <div class="dp">
            <button class="dpicn" onclick="openRegisterModal()">Регистрация</button>
        </div>
    </div>
</header>

    <div class="main-container">
    <div class="navcontainer">  <!-- Убрали класс navclose -->
    <nav class="nav">
    <div class="nav-upper-options">

    <div class="nav-option option1">              
        <h3><a href="index.php">Главная</a></h3>
    </div>

    <div class="nav-option option2" id="ecoanalyze">
        <h3><a href="admin1.php">Заседания</a></h3>
    </div>
    <div class="nav-option option5">
        <h3><a href="admin2.php">Жильцы</a></h3>
    </div>
    <div class="nav-option option3">
        <h3><a href="admin3.php">Штрафы и нарушения</a></h3>
    </div>
    <div class="nav-option option3">
        <h3><a href="admin4.php">Админы</a></h3>
    </div>
    <div class="nav-option option3">
        <h3><a href="admin5.php">Интеграция с системами</a></h3>
    </div>
    <div class="nav-option logout">
        <form action="logout.php" method="post">
            <button type="submit" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; width: 100%;">
                <h3 style="margin-left: 10px;">Выход</h3>
            </button>
        </form>
    </div>
</div> </nav> </div>
<!-- Модальное окно для регистрации -->
<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeRegisterModal">&times;</span>
        <h2>Регистрация</h2>
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
        <button onclick="openLoginModal()">Авторизоваться</button>
    </div>
</div>

<!-- Модальное окно для авторизации -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeLoginModal">&times;</span>
        <h2>Авторизация</h2>
        <form id="loginForm" action="" method="POST">
            <label for="innLogin">ИНН:</label><br>
            <input type="text" id="innLogin" name="innLogin" required><br><br>
            
            <label for="passwordLogin">Пароль:</label><br>
            <input type="password" id="passwordLogin" name="passwordLogin" required><br><br>
            
            <input type="submit" name="login" value="Авторизоваться">
        </form>
        <button onclick="authorizeWithGosuslugi()">Авторизоваться через Госуслуги</button>
    </div>
</div>

<script>
    // Функция для открытия модального окна регистрации
    function openRegisterModal() {
        document.getElementById("registerModal").style.display = "block";
    }

    // Функция для открытия модального окна авторизации
    function openLoginModal() {
        document.getElementById("loginModal").style.display = "block";
    }

    // Функция для закрытия модального окна регистрации
    document.getElementById("closeRegisterModal").onclick = function() {
        document.getElementById("registerModal").style.display = "none";
    }

    // Функция для закрытия модального окна авторизации
    document.getElementById("closeLoginModal").onclick = function() {
        document.getElementById("loginModal").style.display = "none";
    }

    // Закрытие модального окна при клике вне его
    window.onclick = function(event) {
        if (event.target == document.getElementById("registerModal")) {
            document.getElementById("registerModal").style.display = "none";
        }
        if (event.target == document.getElementById("loginModal")) {
            document.getElementById("loginModal").style.display = "none";
        }
    }

    // Опциональная функция для авторизации через Госуслуги
    function authorizeWithGosuslugi() {
        alert("Авторизация через Госуслуги. Реализуйте логику здесь."); // Замените это на вашу логику
    }
</script>

</body>
</html>
