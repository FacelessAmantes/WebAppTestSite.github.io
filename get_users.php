<?php
// Параметры подключения к базе данных
$host = 'MySQL-8.2';
$db = 'xacaton';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Извлечение пользователей
    $stmt = $pdo->query("SELECT id, full_name FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users); // Возвращаем список пользователей в формате JSON
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Пример отправки уведомления
function sendNotification($userId, $meetingDetails) {
    // Получите email пользователя из базы данных по $userId
    // Используйте mail() или библиотеку для отправки уведомлений
}

// После успешного добавления заседания
if ($stmt->execute($meetingData)) {
    // Получаем выбранных участников
    $participants = $_POST['participants']; // Это массив id пользователей
    foreach ($participants as $participantId) {
        sendNotification($participantId, $meetingData); // Отправляем уведомление каждому участнику
    }
    echo json_encode(['message' => "Заседание успешно добавлено!"]);
}

?>
