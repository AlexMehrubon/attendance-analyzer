<?php

namespace objects;

class Student
{
    private $conn;
    private $table_name = "students";

    public $id;
    public $first_name;
    public $last_name;
    public $group_ID;

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
            first_name=:first_name, last_name=:last_name";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // очистка
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));


        // привязка значений
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":last_name", $this->last_name);

        // выполняем запрос
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


}