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
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

/* Сброс отступов и установка шрифта для всех элементов */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

/* Определение переменных для цветов */
:root {
    --background-color1: #fafaff; /* Светлый фон */
    --background-color2: #ffffff; /* Белый фон */
    --background-color3: #ededed; /* Светло-серый фон */
    --background-color4: #cafdd4a4; /* Полупрозрачный фон */
    --primary-color: #008080; /* Бирюзовый */
    --secondary-color: #004d4d; /* Темный бирюзовый */
    --border-color: #3f0097; /* Цвет границы */
    --one-use-color: #3f0097; /* Цвет для одного использования */
    --two-use-color: #5500cb; /* Цвет для двух использований */
}

/* Стили для тела документа */
body {
    background-color: var(--background-color4); /* Фон страницы */
    max-width: 100%; /* Максимальная ширина 100% */
    overflow-x: hidden; /* Скрыть горизонтальную прокрутку */
}

/* Стили для заголовка */
header {
    height: 70px; /* Высота заголовка */
    width: 100vw; /* Ширина заголовка на всю ширину окна */
    padding: 0 30px; /* Отступы */
    background-color: var(--background-color1); /* Фон заголовка */
    position: fixed; /* Фиксированное положение */
    z-index: 100; /* Уровень наложения */
    box-shadow: 1px 1px 15px rgba(161, 182, 253, 0.825); /* Тень */
    display: flex; /* Использование flexbox */
    justify-content: space-between; /* Расположение элементов по краям */
    align-items: center; /* Выравнивание по вертикали */
}

/* Логотип */
.logo {
    font-size: 27px; /* Размер шрифта */
    font-weight: 600; /* Жирный шрифт */
    color: rgb(47, 141, 70); /* Цвет логотипа */
}

/* Иконки */
.icn {
    height: 30px; /* Высота иконок */
}

/* Иконка меню */
.menuicn {
    cursor: pointer; /* Указатель при наведении */
}

/* Стили для поисковой строки и сообщений */
.searchbar,
.message,
.logosec {
    display: flex; /* Использование flexbox */
    align-items: center; /* Выравнивание по вертикали */
    justify-content: center; /* Центрирование по горизонтали */
}

/* Скрытая поисковая строка */
.searchbar2 {
    display: none; /* Скрыто по умолчанию */
}
/* Стили для изображения профиля */
.dp {
    height: 40px; /* Высота профиля */
    width: 40px; /* Ширина профиля */
    background-color: #626262; /* Цвет фона */
    border-radius: 50%; /* Круглая форма */
    display: flex; /* Использование flexbox */
    align-items: center; /* Выравнивание по вертикали */
    justify-content: center; /* Центрирование по горизонтали */
    overflow: hidden; /* Скрытие переполнения */
}
.main {
    height: calc(100vh - 70px); /* Высота с учетом заголовка */
    width: 100%; /* Ширина на всю ширину контейнера */
    overflow-y: scroll; /* Вертикальная прокрутка */
    overflow-x: hidden; /* Скрытие горизонтальной прокрутки */
    padding: 40px 30px 30px 30px; /* Внутренние отступы */
}

/* Основной контейнер */
.main-container {
    display: flex; /* Использование flexbox */
    width: 100%; /* Ширина на всю ширину окна */
    position: relative; /* Относительное позиционирование */
    top: 70px; /* Сдвиг вниз */
    z-index: 1; /* Уровень наложения */
}

.main-container1 {
    display: flex; /* Использование flexbox для расположения боксов */
    justify-content: flex-start; /* Выравнивание по левому краю */
    align-items: center; /* Центрирование по вертикали */
    width: 80%; /* Ширина основного контейнера */
    margin-left: 90px; /* Отступ слева для создания пространства */
}


.left-box {
    width: 50%; /* Фиксированная ширина для левого бокса */
    height: 500px; /* Увеличенная высота для левого бокса */
    display: flex;
    align-items: center; /* Центрирование по вертикали */
    justify-content: center; /* Центрирование по горизонтали */
    border-radius: 20px; /* Скругленные углы */
    margin-right: 20px; /* Отступ справа */
}

.right-container {
    display: flex;
    flex-direction: column; /* Стекание правых боксов вертикально */
    flex-grow: 1; /* Занимает оставшееся пространство */
    width: 100px; /* Уменьшенная ширина для правого контейнера */
}

.box {
    width: calc(100% - 20px); /* Ширина с учетом отступов */
    border-radius: 20px; /* Скругленные углы */
    box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751); /* Тень */
    padding: 20px; /* Внутренние отступы */
    display: flex; /* Flexbox для выравнивания содержимого */
    align-items: center; /* Центрирование по вертикали */
    justify-content: center; /* Центрирование по горизонтали */
    cursor: pointer; /* Указатель при наведении */
    transition: transform 0.3s ease-in-out; /* Плавный эффект при наведении */
    background-color: #6aae95; /* Цвет фона для правых боксов */
    margin-bottom: 20px; /* Отступ снизу */
}


/* Эффект увеличения при наведении */
.box:hover {
    transform: scale(1.08); /* Увеличение размера */
}

/* Цвета для первых трех блоков */
.box:nth-child(1) { 
    background-color: #6aae95; /* Цвет первого блока */
}

/* Стили для изображений в блоках */
.box img {
    height: 50px; /* Высота изображения */
}

/* Цвет текста в блоках */
.box .text {
    color: white; /* Цвет текста */
}


.modal {
            display: none; /* Скрыто по умолчанию */
            position: fixed; /* Фиксированное положение */
            z-index: 1000; /* Уровень наложения */
            left: 0;
            top: 0;
            width: 100%; /* Ширина на всю ширину окна */
            height: 100%; /* Высота на всю высоту окна */
            overflow: auto; /* Прокрутка при необходимости */
            background-color: rgb(0, 0, 0); /* Черный фон */
            background-color: rgba(0, 0, 0, 0.4); /* Полупрозрачный фон */
        }

        .modal-content {
            background-color: #fefefe; /* Цвет фона модального окна */
            margin: 15% auto; /* Отступ сверху и центрирование */
            padding: 20px; /* Внутренние отступы */
            border: 1px solid #888; /* Граница */
            width: 80%; /* Ширина модального окна */
        }

        .close {
            color: #aaa; /* Цвет кнопки закрытия */
            float: right; /* Выравнивание вправо */
            font-size: 28px; /* Размер шрифта */
            font-weight: bold; /* Жирный шрифт */
        }

        .close:hover,
        .close:focus {
            color: black; /* Цвет при наведении */
            text-decoration: none; /* Убрать подчеркивание */
            cursor: pointer; /* Указатель при наведении */
        }

        .action-button {
            margin: 5px;
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .fine-button {
            background-color: #FF5722; /* Цвет кнопки "Это штраф" */
        }

        .violation-button {
            background-color: #2196F3; /* Цвет кнопки "Это нарушение" */
        }
/* Стили для таблицы */
table {
    width: 100%; /* Ширина таблицы на всю ширину контейнера */
    border-collapse: collapse; /* Убираем промежутки между ячейками */
    margin-top: 20px; /* Отступ сверху */
}

/* Стили для ячеек таблицы */
th, td {
    padding: 12px; /* Внутренние отступы */
    text-align: left; /* Выравнивание текста влево */
    border: 1px solid #008080; /* Граница ячеек */
}

/* Стили для заголовков таблицы */
th {
    background-color: #008080; /* Фон заголовков */
    color: white; /* Цвет текста заголовков */
}

/* Стили для четных строк таблицы */
tr:nth-child(even) {
    background-color: #e0f7f7; /* Светло-бирюзовый для четных строк */
}

/* Удаление изменения цвета при наведении на строки */
tr:hover {
    background-color: inherit; /* Убираем изменение цвета при наведении */
}

/* Стили для кнопок "Подтвердить" и "Отклонить" */
.action-button {
    background-color: var(--primary-color); /* Фон кнопки */
    color: white; /* Цвет текста */
    border: none; /* Убираем границу */
    padding: 5px 10px; /* Внутренние отступы */
    border-radius: 5px; /* Скругление углов */
    cursor: pointer; /* Указатель при наведении */
    text-decoration: none; /* Убираем подчеркивание */
    margin-right: 5px; /* Отступ справа */
}

/* Красная кнопка для отклонения */
.action-button.reject {
    background-color: red; /* Красный для отклонения */
}

/* Эффект при наведении на кнопки */
.action-button:hover {
    background-color: var(--secondary-color); /* Темный бирюзовый при наведении */
}

/* Бейджик для счетчика */
.count-badge {
    position: absolute; /* Абсолютное позиционирование */
    top: -10px; /* Переместите его вверх */
    right: -10px; /* Переместите его вправо */
    color: white; /* Цвет текста */
    font-family: Arial; /* Шрифт */
    font-weight: bold; /* Жирный текст */
    font-size: 30px; /* Размер шрифта */
    text-shadow: 
        -0   -2px 2px #FF0000,
         0   -2px 2px #FF0000,
        -0    2px 2px #FF0000,
         0    2px 2px #FF0000,
        -2px -0   2px #FF0000,
         2px -0   2px #FF0000,
        -2px  0   2px #FF0000,
         2px  0   2px #FF0000,
        -1px -2px 2px #FF0000,
         1px -2px 2px #FF0000,
        -1px  2px 2px #FF0000,
         1px  2px 2px #FF0000,
        -2px -1px 2px #FF0000,
         2px -1px 2px #FF0000,
        -2px  1px 2px #FF0000,
         2px  1px 2px #FF0000,
        -2px -2px 2px #FF0000,
         2px -2px 2px #FF0000,
        -2px  2px 2px #FF0000,
         2px  2px 2px #FF0000;
    text-align: center; /* Центрируем текст */
    min-width: 30px; /* Минимальная ширина для бейджика */
    height: 30px; /* Фиксированная высота для круглой формы */
}
/* Иконка профиля */
.dpicn {
    height: 42px; /* Высота иконки профиля */
}

/* Основная область контента */
.main {
    height: calc(100vh - 70px); /* Высота с учетом заголовка */
    width: 100%; /* Ширина на всю ширину контейнера */
    overflow-y: scroll; /* Вертикальная прокрутка */
    overflow-x: hidden; /* Скрытие горизонтальной прокрутки */
    padding: 40px 30px 30px 30px; /* Внутренние отступы */
}


.main::-webkit-scrollbar {
    width: 5px; /* Ширина полосы прокрутки */
}

.main::-webkit-scrollbar-track {
    background-color: #9e9e9eb2; /* Цвет трека прокрутки */
}


/* Навигационное меню */
.nav {
    min-height: 91vh; /* Минимальная высота навигации */
    width: 250px; /* Ширина навигации */
    background-color: var(--background-color2); /* Фон навигации */
    position: absolute; /* Абсолютное позиционирование */
    top: 0px; /* Сдвиг вверх */
    left: 0; /* Сдвиг влево */
    box-shadow: 1px 1px 10px rgba(198, 189, 248, 0.825); /* Тень навигации */
    display: flex; /* Использование flexbox */
    flex-direction: column; /* Вертикальное расположение элементов */
    justify-content: space-between; /* Расположение элементов по краям */
    overflow: hidden; /* Скрытие переполнения */
    padding: 30px 0 20px 10px; /* Отступы */
    transition: transform 0.5s ease-in-out; /* Плавный переход */
}

/* Контейнер для навигации */
.navcontainer {
    height: calc(100vh - 70px); /* Высота с учетом заголовка */
    width: 250px; /* Ширина контейнера */
    position: relative; /* Относительное позиционирование */
    overflow-y: scroll; /* Вертикальная прокрутка */
    overflow-x: hidden; /* Скрытие горизонтальной прокрутки */
    transition: all 0.5s ease-in-out; /* Плавный переход */
}

/* Стили для скрытия полосы прокрутки */
.navcontainer::-webkit-scrollbar {
    display: none; /* Скрыть полосу прокрутки */
}


/* Стили для опций навигации */
.nav-option {
    width: 250px; /* Ширина опции */
    height: 60px; /* Высота опции */
    display: flex; /* Использование flexbox */
    align-items: center; /* Выравнивание по вертикали */
    padding: 0 20px; /* Отступы */
    gap: 20px; /* Промежуток между элементами */
    transition: all 0.1s ease-in-out; /* Плавный переход */
}

/* Выравнивание текста в опциях навигации */
.nav-option h3 {
    text-align: left; /* Выравнивание текста по левому краю */
}

/* Эффект при наведении на опции навигации */
.nav-option:hover {
    border-left: 5px solid #a2a2a2; /* Левый бордер при наведении */
    background-color: #dadada; /* Фон при наведении */
    cursor: pointer; /* Указатель при наведении */
}

/* Размеры иконок в навигации */
.nav-img {
    width: 30px; /* Ширина иконок */
    height: 30px; /* Высота иконок */
}

/* Стили для ссылок в опциях навигации */
.nav-option a {
    text-decoration: none; /* Убираем подчеркивание */
    color: inherit; /* Установите цвет текста по умолчанию */
}

/* Верхние опции навигации */
.nav-upper-options {
    display: flex; /* Использование flexbox */
    flex-direction: column; /* Вертикальное расположение элементов */
    align-items: center; /* Выравнивание по центру */
    gap: 30px; /* Промежуток между элементами */
}

/* Кнопка выхода */
.logout button {
    display: flex; /* Использование flexbox */
    align-items: center; /* Выравнивание по вертикали */
    width: 100%; /* Ширина на всю ширину контейнера */
    padding: 10px; /* Внутренние отступы */
    background: none; /* Убираем фон */
    border: none; /* Убираем границу */
    cursor: pointer; /* Указатель при наведении */
    color: rgb(1, 0, 0); /* Цвет текста */
}

/* Отступ между изображением и текстом в кнопке выхода */
.logout button img {
    margin-right: 10px; /* Отступ справа */
}

/* Стили для первой опции навигации */
.option1 {
    border-left: 5px solid #6aae95; /* Левый бордер */
    background-color: #6aae95; /* Фон */
    color: white; /* Цвет текста */
    cursor: pointer; /* Указатель при наведении */
}

/* Эффект при наведении на первую опцию */
.option1:hover {
    border-left: 5px solid #6aae95; /* Левый бордер при наведении */
    background-color: #6aae95; /* Фон при наведении */
}



/* Стили для тем */
.topic {
    font-size: 13px; /* Размер шрифта */
    font-weight: 400; /* Нормальный шрифт */
    letter-spacing: 1px; /* Расстояние между буквами */
}

/* Заголовок темы */
.topic-heading {
    font-size: 30px; /* Размер шрифта заголовка */
    letter-spacing: 3px; /* Расстояние между буквами */
}


/* Удаление подчеркивания у ссылок в кнопках навигации */
.nav-option h3 a {
    text-decoration: none; /* Убираем подчеркивание */
    color: inherit; /* Устанавливаем цвет текста по умолчанию */
}

/* Responsive CSS */
@media screen and (max-width: 950px) {
    .nav-img {
        height: 25px; /* Уменьшение высоты иконок */
    }

    .nav-option {
        gap: 30px; /* Увеличение промежутка между элементами */
    }

    .nav-option h3 {
        font-size: 15px; /* Уменьшение размера шрифта */
    }

    .report-topic-heading,
    .item1,
    .items {
        width: 800px; /* Уменьшение ширины элементов */
    }
}

@media screen and (max-width: 850px) {
    .nav-img {
        height: 30px; /* Увеличение высоты иконок */
    }

    .nav-option {
        gap: 30px; /* Увеличение промежутка между элементами */
    }

    .nav-option h3 {
        font-size: 20px; /* Увеличение размера шрифта */
    }

    .report-topic-heading,
    .item1,
    .items {
        width: 700px; /* Уменьшение ширины элементов */
    }

    .navcontainer {
        width: 100vw; /* Полная ширина при закрытой навигации */
        position: absolute; /* Абсолютное позиционирование */
        transition: all 0.6s ease-in-out; /* Плавный переход */
        top: 0; /* Сдвиг вверх */
        left: -100vw; /* Перемещение навигации за пределы экрана */
    }

    .nav {
        width: 100%; /* Полная ширина навигации */
        position: absolute; /* Абсолютное позиционирование */
    }

    .navclose {
        left: 0; /* Сдвиг влево */
    }

    .searchbar {
        display: none; /* Скрытие поисковой строки */
    }

    .main {
        padding: 40px 30px 30px 30px; /* Внутренние отступы */
    }

    .searchbar2 {
        width: 100%; /* Полная ширина */
        display: flex; /* Использование flexbox */
        margin: 0 0 40px 0; /* Отступы */
        justify-content: center; /* Центрирование по горизонтали */
    }

    .searchbar2 input {
        width: 250px; /* Ширина поля */
        height: 42px; /* Высота поля */
        border-radius: 50px 0 0 50px; /* Скругление углов */
        background-color: var(--background-color3); /* Фон поля */
        padding: 0 20px; /* Отступы внутри поля */
        font-size: 15px; /* Размер шрифта */
        border: 2px solid var(--secondary-color); /* Граница */
    }
}

@media screen and (max-width: 490px) {
    .message {
        display: none; /* Скрытие сообщений */
    }

    .logosec {
        width: 100%; /* Полная ширина */
        justify-content: space-between; /* Расположение элементов по краям */
    }

    .logo {
        font-size: 20px; /* Уменьшение размера шрифта логотипа */
    }

    .menuicn {
        height: 25px; /* Уменьшение высоты иконки меню */
    }

    .nav-img {
        height: 25px; /* Уменьшение высоты иконок */
    }

    .nav-option {
        gap: 25px; /* Уменьшение промежутка между элементами */
    }

    .nav-option h3 {
        font-size: 12px; /* Уменьшение размера шрифта */
    }

    .nav-upper-options {
        gap: 15px; /* Уменьшение промежутка между элементами */
    }

    .recent-Articles {
        font-size: 20px; /* Уменьшение размера шрифта */
    }

    .report-topic-heading,
    .item1,
    .items {
        width: 550px; /* Уменьшение ширины элементов */
    }
}

@media screen and (max-width: 400px) {
    .recent-Articles {
        font-size: 17px; /* Уменьшение размера шрифта */
    }

    .view {
        width: 60px; /* Уменьшение ширины кнопки */
        font-size: 10px; /* Уменьшение размера шрифта */
        height: 27px; /* Уменьшение высоты кнопки */
    }

    .report-header {
        height: 60px; /* Уменьшение высоты заголовка */
        padding: 10px 10px 5px 10px; /* Уменьшение отступов */
    }

    .searchbtn img {
        height: 20px; /* Уменьшение высоты изображения кнопки поиска */
    }
}

@media screen and (max-width: 320px) {
    .recent-Articles {
        font-size: 12px; /* Уменьшение размера шрифта */
    }

    .view {
        width: 50px; /* Уменьшение ширины кнопки */
        font-size: 8px; /* Уменьшение размера шрифта */
        height: 27px; /* Уменьшение высоты кнопки */
    }

    .report-header {
        height: 60px; /* Уменьшение высоты заголовка */
        padding: 10px 5px 5px 5px; /* Уменьшение отступов */
    }

    .t-op {
        font-size: 12px; /* Уменьшение размера шрифта */
    }

    .t-op-nextlvl {
        font-size: 10px; /* Уменьшение размера шрифта */
    }

    .report-topic-heading,
    .item1,
    .items {
        width: 300px; /* Уменьшение ширины элементов */
    }

    .report-body {
        padding: 10px; /* Уменьшение внутренних отступов */
    }

    .label-tag {
        width: 70px; /* Уменьшение ширины метки */
    }

    .searchbtn {
        width: 40px; /* Уменьшение ширины кнопки поиска */
    }

    .searchbar2 input {
        width: 180px; /* Уменьшение ширины поля поиска */
    }
}
/* Стили для кнопок */
button {
    padding: 10px 15px; /* Внутренние отступы */
    border: none; /* Убираем границу */
    border-radius: 5px; /* Скругленные углы */
    font-size: 16px; /* Размер шрифта */
    cursor: pointer; /* Указатель при наведении */
    transition: background-color 0.3s ease; /* Плавный переход фона */
}

/* Стили для кнопки "Это штраф" */
button.fine-button {
    background-color: #FF5722; /* Цвет фона */
    color: white; /* Цвет текста */
}

/* Стили для кнопки "Это нарушение" */
button.violation-button {
    background-color: #2196F3; /* Цвет фона */
    color: white; /* Цвет текста */
}

/* Стили для кнопки "Удалить" */
button.delete-button {
    background-color: #f44336; /* Красный цвет */
    color: white; /* Цвет текста */
}

button[type="submit"] {
    background-color: var(--primary-color); /* Цвет фона */
    color: white; /* Цвет текста */
    border: none; /* Убираем границу */
    padding: 10px 15px; /* Внутренние отступы */
    border-radius: 5px; /* Скругленные углы */
    font-size: 16px; /* Размер шрифта */
    cursor: pointer; /* Указатель при наведении */
    transition: background-color 0.3s ease; /* Плавный переход фона */
}

/* Стили для кнопок в модальных окнах */
.modal-content button {
    margin-top: 10px; /* Отступ сверху */
}

</style>
<body>
    <!-- for header part -->
    <header>
        <div class="logosec">
            <div class="logo"></div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png" class="icn menuicn" id="menuicn" alt="menu-icon">
        </div>
        <div class="message">
            <div class="circle"></div>
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="dp">
            </div>
        </div>
    </header>

    <div class="main-container">
        <div class="navcontainer">  <!-- Убрали класс navclose -->
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option option1">
                        <img src="Иконки/Панель.png" class="nav-img" alt="dashboard">
                        <h3><a href="adminGL.php">Приборная панель</a></h3>
                    </div>

                    <div class="option2 nav-option" id="ecoanalyze">
                        <img src="Иконки/Экоанализ.png" class="nav-img" alt="articles">
                        <h3><a href="admin2.php">Экоанализ</a></h3>
                        <div class="submenu">
                            </div>
                    </div>
                    <div class="nav-option option5">
                        <img src="Иконки/жильцы.png" class="nav-img" alt="blog">
                        <h3><a href="admin1.php">Жильцы</a></h3>
                    </div>
                    <div class="nav-option option3">
                        <img src="Иконки/Штрафы.png" class="nav-img" alt="report">
                        <h3><a href="admin4.php">Штрафы и нарушения</a></h3>
                    </div>
                    <div class="nav-option option3">
                        <img src="Иконки/Админ.png" class="nav-img" alt="report">
                        <h3><a href="admin3.php">Админы</a></h3>
                    </div>
                    <div class="nav-option logout">
                        <form action="logout.php" method="post">
                            <button type="submit" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; width: 100%;">
                                <img src="Иконки/Выход.png" class="nav-img" alt="logout">
                                <h3 style="margin-left: 10px;">Выход</h3>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        
        <div class="main">
            <div class="searchbar2">
                <input type="text" placeholder="Search">
                <div class="searchbtn">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png" class="icn srchicn" alt="search-button">
                </div>
            </div>
            <div class="main-container1">
            <div class="left-box">
                <div class="box box1">
                    <div class="text">
                        <h2 class="topic-heading">Неотсортированные нарушения <br> и штрафы</h2>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="box box2" id="historyBox">
                    <div class="text">
                        <h2 class="topic-heading">История нарушений</h2>
                    </div>
                </div>
                <div class="box box3" id="openFinesModal">
                    <div class="text">
                        <h2 class="topic-heading">История штрафов</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <h2>Неотсортированные нарушения и штрафы</h2>
                <table id="violationTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Дата нарушения</th>
                            <th>Место</th>
                            <th>Описание</th>
                            <th>Дата создания</th>
                            <th>Сообщитель</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Данные из базы данных будут вставлены сюда -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Модальное окно для штрафа -->
        <div id="fineModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeFineModal">&times;</span>
                <h2>Выписка штрафа</h2>
                <form id="fineForm">
                    <label for="userId">Выберите пользователя:</label>
                    <select id="userId" name="userId" required>
                        <!-- Список пользователей будет загружен здесь -->
                    </select><br><br>
                    <label for="title">Название штрафа:</label>
                    <input type="text" id="title" name="title" required><br><br>
                    <label for="amount">Сумма:</label>
                    <input type="number" id="amount" name="amount" required><br><br>
                    <button type="submit">Отправить штраф</button>
                </form>
            </div>
        </div>
                <!-- Модальное окно для штрафов -->
        <div id="finesModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeFinesModal">&times;</span>
                <h2>История штрафов</h2>
                <div>
                    <button id="unpaidFinesButton">Неоплаченные штрафы</button>
                    <button id="paidFinesButton">Оплаченные штрафы</button>
                </div>
                <table id="finesTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Название штрафа</th>
                            <th>Сумма</th>
                            <th>Статус</th>
                            <th>Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Данные о штрафах будут вставлены сюда -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Модальное окно для нарушения -->
        <div id="violationModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeViolationModal">&times;</span>
                <h2>Сообщить о нарушении</h2>
                <form id="violationForm">
                    <label for="violationUser Id">Выберите пользователя:</label>
                    <select id="violationUser Id" name="violationUser Id" required>
                        <!-- Список пользователей будет загружен здесь -->
                    </select><br><br>
                    <label for="violationTopic">Тема нарушения:</label>
                    <input type="text" id="violationTopic" name="violationTopic" required><br><br>
                    <button type="submit">Отправить нарушение</button>
                </form>
            </div>
        </div>
        <!-- Модальное окно для истории нарушений -->
        <div id="historyModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeHistoryModal">&times;</span>
                <h2>История нарушений</h2>
                <table id="violationsTable">
                    <thead>
                        <tr>
                            <th>ID нарушения</th>
                            <th>ID пользователя</th>
                            <th>Тема нарушения</th>
                            <th>Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Данные о нарушениях будут загружены здесь -->
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            // Получаем модальные окна
            var historyModal = document.getElementById("historyModal");
            var closeHistoryModal = document.getElementById("closeHistoryModal");
            var violationModal = document.getElementById("violationModal");
            var closeViolationModal = document.getElementById("closeViolationModal");
            var finesModal = document.getElementById("finesModal");
            var openFinesModal = document.getElementById("openFinesModal");
            var closeFinesModal = document.getElementById("closeFinesModal");
            var modal = document.getElementById("modal");
            var fineModal = document.getElementById("fineModal");
            var closeModal = document.getElementById("closeModal");
            var closeFineModal = document.getElementById("closeFineModal");
            var box1 = document.querySelector(".box1");
            var unpaidFinesButton = document.getElementById("unpaidFinesButton");
            var paidFinesButton = document.getElementById("paidFinesButton");
            var historyBox = document.getElementById("historyBox"); // Добавляем переменную для блока "История нарушений"

            // Закрытие модальных окон при клике вне их
            window.onclick = function(event) {
                if (event.target == historyModal) {
                    historyModal.style.display = "none";
                } else if (event.target == violationModal) {
                    violationModal.style.display = "none";
                } else if (event.target == finesModal) {
                    finesModal.style.display = "none";
                } else if (event.target == modal) {
                    modal.style.display = "none";
                } else if (event.target == fineModal) {
                    fineModal.style.display = "none";
                }
            }

            // Открытие модального окна для истории нарушений
            historyBox.onclick = function() {
                historyModal.style.display = "block"; // Открываем модальное окно
                loadViolationHistory(); // Загружаем историю нарушений
            }

            // Закрытие модального окна для истории нарушений
            closeHistoryModal.onclick = function() {
                historyModal.style.display = "none";
            }

            // Функция для загрузки истории нарушений
            function loadViolationHistory() {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "get_violations_log.php", true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        document.querySelector("#violationsTable tbody").innerHTML = this.responseText;
                    }
                }
                xhr.send();
            }

            // Обработчик для кнопки "Это нарушение"
            function handleAction(action, violationId) {
                if (action === "violation") {
                    violationModal.style.display = "block"; // Открываем модальное окно
                    loadUsersForViolation(); // Загружаем пользователей для выбора
                } else if (action === "fine") {
                    fineModal.style.display = "block"; // Открываем модальное окно для штрафа
                    loadUsers(); // Загружаем пользователей для выбора в штрафах
                }
            }

            // Закрытие модального окна для нарушения
            closeViolationModal.onclick = function() {
                violationModal.style.display = "none";
            }

            // Функция для загрузки пользователей для нарушения
            function loadUsersForViolation() {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "get_users.php", true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        document.getElementById("violationUser Id").innerHTML = this.responseText; // Исправьте ID, если есть лишние пробелы
                    } else {
                        console.error("Ошибка загрузки пользователей: " + this.status);
                    }
                }
                xhr.send();
            }

            // Обработка отправки формы нарушения
            document.getElementById("violationForm").onsubmit = function(event) {
                event.preventDefault(); // Предотвращаем стандартное поведение формы

                var userId = document.getElementById("violationUser Id").value;
                var violationTopic = document.getElementById("violationTopic").value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "submit_violation.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    if (this.status === 200) {
                        alert("Нарушение успешно зарегистрировано!");
                        violationModal.style.display = "none"; // Закрываем модальное окно
                    }
                };
                xhr.send("user_id=" + userId + "&topic=" + violationTopic);
            }

            function deleteViolation(id) {
                if (confirm("Вы уверены, что хотите удалить это нарушение?")) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "delete_violation.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onload = function() {
                        if (this.status === 200) {
                            alert("Нарушение успешно удалено!");
                            loadViolations(); // Перезагружаем таблицу
                        } else {
                            alert("Ошибка при удалении.");
                        }
                    };
                    xhr.send("id=" + id);
                }
            }

            // Открытие модального окна для штрафов
            openFinesModal.onclick = function() {
                finesModal.style.display = "block";
                loadFines(); // Загружаем данные о штрафах
            }

            // Закрытие модального окна для штрафов
            closeFinesModal.onclick = function() {
                finesModal.style.display = "none";
            }

            // Обработчик для кнопки неоплаченных штрафов
            unpaidFinesButton.onclick = function() {
                loadFines("unpaid"); // Загружаем неоплаченные штрафы
            }

            // Обработчик для кнопки оплаченных штрафов
            paidFinesButton.onclick = function() {
                loadFines("paid"); // Загружаем оплаченные штрафы
            }

            // Функция для загрузки данных о штрафах
            function loadFines(status) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "get_fines.php?status=" + status, true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        document.querySelector("#finesTable tbody").innerHTML = this.responseText;
                    }
                }
                xhr.send();
            }

            // Открытие модального окна для неотсортированных нарушений
            box1.onclick = function() {
                modal.style.display = "block";
                loadViolations(); // Загружаем данные
            }

            // Закрытие модального окна для таблицы
            closeModal.onclick = function() {
                modal.style.display = "none";
            }

            // Функция для загрузки данных из базы данных
            function loadViolations() {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "get_violations.php", true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        document.querySelector("#violationTable tbody").innerHTML = this.responseText;
                    }
                }
                xhr.send();
            }

            // Функция для загрузки пользователей
            function loadUsers() {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "get_users.php", true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        document.getElementById("userId").innerHTML = this.responseText;
                    }
                }
                xhr.send();
            }

            // Загружаем пользователей при загрузке страницы
            loadUsers();

            // Обработка отправки формы штрафа
            document.getElementById("fineForm").onsubmit = function(event) {
                event.preventDefault(); // Предотвращаем стандартное поведение формы

                var userId = document.getElementById("userId").value;
                var fineTitle = document.getElementById("title").value;
                var fineAmount = document.getElementById("amount").value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "submit_fine.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    if (this.status === 200) {
                        alert("Штраф успешно выписан!");
                        fineModal.style.display = "none"; // Закрываем модальное окно
                        loadFines(); // Перезагружаем данные о штрафах
                    }
                };
                xhr.send("user_id=" + userId + "&title=" + fineTitle + "&amount=" + fineAmount);
            }

            // Закрытие модального окна для штрафа
            closeFineModal.onclick = function() {
                fineModal.style.display = "none";
            }
        </script>

</div>
</body>
</html>