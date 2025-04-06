<?php
$servername = "MySQL-8.2"; // Убедитесь, что это правильное имя сервера
$username = "root"; // Замените на ваше имя пользователя
$password = ""; // Замените на ваш пароль
$dbname = "xacaton";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die(json_encode(["message" => "Ошибка подключения: " . $conn->connect_error]));
}

// Получаем данные из POST-запроса
$title = $_POST['title'] ?? '';
$topic = $_POST['topic'] ?? '';
$time = $_POST['time'] ?? '';
$date = $_POST['date'] ?? ''; // Получаем дату
$participants = implode(',', $_POST['participants'] ?? []); // Преобразуем массив в строку

// Выводим данные для отладки
error_log("Title: $title, Topic: $topic, Time: $time, Date: $date, Participants: $participants");

// SQL-запрос для вставки данных
$sql = "INSERT INTO meetings (date, title, topic, time, participants) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $date, $title, $topic, $time, $participants); // Исправлено количество параметров

if ($stmt->execute()) {
    echo json_encode(["message" => "Заседание успешно добавлено!"]);
} else {
    error_log("Ошибка выполнения SQL: " . $stmt->error); // Для отладки
    echo json_encode(["message" => "Ошибка: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
