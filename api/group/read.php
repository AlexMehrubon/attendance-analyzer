<?php

use objects\Group;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Константы для статус-кодов и сообщений
const HTTP_OK = 200;
const HTTP_NOT_FOUND = 404;
const NO_RECORDS_MESSAGE = "Такого студента не существует.";

// Подключение базы данных и файл, содержащий объекты
include_once "../config/Database.php";
include_once "../objects/Group.php";

// Получение соединения с базой данных
$database = new Database();
$db = $database->getConnection();

// Инициализация объекта
$group = new Group($db);

$stmt = $group->read();
$groups = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Проверка, найдено ли больше 0 записей
if (count($groups) > 0) {
    // Форматирование данных
    $groups_arr = array();
    $groups_arr["records"] = array();

    foreach ($groups as $group) {
        $currentGroup = array(
            "id" => $group['id'],
            "group_name" => $group['group_name'],
            "course" => $group['course'],
            "faculty_id" => $group['faculty_id'],
            "faculty_name" => $group['faculty_name']
        );
        $groups_arr["records"][] = $currentGroup;
    }

    // Установка кода ответа - 200 OK
    http_response_code(HTTP_OK);

    // Вывод данных о товаре в формате JSON
    echo json_encode($groups_arr, JSON_UNESCAPED_UNICODE);
} else {
    // Установка кода ответа - 404 Не найдено
    http_response_code(HTTP_NOT_FOUND);

    // Сообщение пользователю, что студенты не найдены
    echo json_encode(array("message" => NO_RECORDS_MESSAGE), JSON_UNESCAPED_UNICODE);
}