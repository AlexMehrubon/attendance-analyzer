<?php

// необходимые HTTP-заголовки
use objects\Student;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// получаем соединение с базой данных
include_once "../config/database.php";

// создание объекта товара
include_once "../objects/student.php";
$database = new Database();
$db = $database->getConnection();
$student = new Student($db);

// получаем отправленные данные
$data = json_decode(file_get_contents("php://input"));

// убеждаемся, что данные не пусты
if (
    !empty($data->first_name) &&
    !empty($data->last_name)&&
    !empty($data->password)&&
    !empty($data->login)&&
    !empty($data->group_id)&&
    !empty($data->course)

) {
    // устанавливаем значения свойств товара
    $student->first_name = $data->first_name;
    $student->last_name = $data->last_name;
    $student->course = $data->course;
    $student->login = $data->login;
    $student->password = $data->password;
    $student->group_id = $data->group_id;


    // создание пользователя
    if ($student->create()) {
        // установим код ответа - 201 создано
        http_response_code(201);

        // сообщим пользователю
        echo json_encode(array("message" => "Удалось добавить пользователя."), JSON_UNESCAPED_UNICODE);
    }
    // если не удается добавить пользователя, сообщим пользователю
    else {
        // установим код ответа - 503 сервис недоступен
        http_response_code(503);

        // сообщим пользователю
        echo json_encode(array("message" => "Невозможно добавить пользователя."), JSON_UNESCAPED_UNICODE);
    }
}
// сообщим пользователю что данные неполные
else {
    // установим код ответа - 400 неверный запрос
    http_response_code(400);

    // сообщим пользователю
    echo json_encode(array("message" => "Невозможно добавить пользователя. Данные неполные."), JSON_UNESCAPED_UNICODE);
}