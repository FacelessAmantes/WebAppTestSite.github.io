<?php
header('Content-Type: application/json');

// Подключение к базе данных
$servername = "MySQL-8.2"; // Убедитесь, что это правильное имя сервера
$username = "root"; // Замените на ваше имя пользователя
$password = ""; // Замените на ваш пароль
$dbname = "hackaton";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}


// Получаем дату из запроса
$date = isset($_GET['date']) ? $_GET['date'] : '';
if ($date == ''){
    $sql = "SELECT title, topic, time, participants, date FROM meetings";
    $stmt = $conn->prepare($sql);
} else {
    $sql = "SELECT title, topic, time, participants FROM meetings WHERE date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $date);
}



$stmt->execute();
$result = $stmt->get_result();

$meetings = [];
while ($row = $result->fetch_assoc()) {
    $meetings[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($meetings);
?>
