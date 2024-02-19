<?php

use objects\Faculty;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// подключение базы данных и файл, содержащий объекты
include_once "../config/Database.php";
include_once "../objects/Faculty.php";

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// инициализируем объект
$faculty = new Faculty($db);

$stmt = $faculty->read();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей
if ($num > 0) {
    // массив товаров
    $faculty_arr = array();
    $faculty_arr["records"] = array();

    // получаем содержимое нашей таблицы
    // fetch() быстрее, чем fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // извлекаем строку
        extract($row);
        $facultyGroup = array(
            "id" => $id,
            "faculty_name" => $faculty_name,


        );
        $faculty_arr["records"][] = $facultyGroup;
    }

    // устанавливаем код ответа - 200 OK
    http_response_code(200);

    // выводим данные о товаре в формате JSON
    echo json_encode($faculty_arr);
}

else {
    // установим код ответа - 404 Не найдено
    http_response_code(404);

    // сообщаем пользователю, что товары не найдены
    echo json_encode(array("message" => "Такого студента не существует."), JSON_UNESCAPED_UNICODE);
}

