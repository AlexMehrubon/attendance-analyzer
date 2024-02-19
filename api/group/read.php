<?php

use objects\Group;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// подключение базы данных и файл, содержащий объекты
include_once "../config/Database.php";
include_once "../objects/Group.php";

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// инициализируем объект
$group = new Group($db);

$stmt = $group->read();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей
if ($num > 0) {
    // массив товаров
    $groups_arr = array();
    $groups_arr["records"] = array();

    // получаем содержимое нашей таблицы
    // fetch() быстрее, чем fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // извлекаем строку
        extract($row);
        $currentGroup = array(
            "id" => $id,
            "group_name" => $group_name,
            "course" => $course,
            "faculty_id" => $faculty_id,
            "faculty_name" => $faculty_name

        );
        $groups_arr["records"][] = $currentGroup;
    }

    // устанавливаем код ответа - 200 OK
    http_response_code(200);

    // выводим данные о товаре в формате JSON
    echo json_encode($groups_arr);
}

else {
    // установим код ответа - 404 Не найдено
    http_response_code(404);

    // сообщаем пользователю, что товары не найдены
    echo json_encode(array("message" => "Такого студента не существует."), JSON_UNESCAPED_UNICODE);
}
