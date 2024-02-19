<?php

use objects\Student;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// подключение базы данных и файл, содержащий объекты
include_once "../config/Database.php";
include_once "../objects/student.php";

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// инициализируем объект
$student = new Student($db);

$stmt = $student->read();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей
if ($num > 0) {
    // массив товаров
    $students_arr = array();
    $students_arr["records"] = array();

    // получаем содержимое нашей таблицы
    // fetch() быстрее, чем fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // извлекаем строку
        extract($row);
        $currentStudent = array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "group_ID" => $group_ID,

        );
        array_push($students_arr["records"], $currentStudent);
    }

    // устанавливаем код ответа - 200 OK
    http_response_code(200);

    // выводим данные о товаре в формате JSON
    echo json_encode($students_arr);
}

else {
    // установим код ответа - 404 Не найдено
    http_response_code(404);

    // сообщаем пользователю, что товары не найдены
    echo json_encode(array("message" => "Такого студента не существует."), JSON_UNESCAPED_UNICODE);
}