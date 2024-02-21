<?php

namespace objects;

class Student
{
    private $conn;
    private $table_name = "students";

    public $id;
    public $first_name;
    public $last_name;
    public $group_id;
    public $login;
    public $course;
    public $password;

    public function __construct($db){
        $this->conn = $db;
    }

    function read()
    {
        // выбираем все записи
        $query = "SELECT
         p.id, p.first_name, p.last_name, p.group_ID
    FROM
        " . $this->table_name . " p";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // выполняем запрос
        $stmt->execute();
        return $stmt;
    }

    // метод для создания товаров
    function create()
    {
        // запрос для вставки (создания) записей
        $query = "INSERT INTO
            " . $this->table_name . "
        SET
            first_name=:first_name, last_name=:last_name, password=:password, login=:login, group_id=:group_id, course=:course";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // очистка
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->login = htmlspecialchars(strip_tags($this->login));
        $this->group_id = htmlspecialchars(strip_tags($this->group_id));
        $this->course = htmlspecialchars(strip_tags($this->course));


        // привязка значений
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":login", $this->login);
        $stmt->bindParam(":course", $this->course);
        $stmt->bindParam(":group_id", $this->group_id);

        // выполняем запрос
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


}