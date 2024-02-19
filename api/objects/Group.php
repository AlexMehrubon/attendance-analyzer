<?php

namespace objects;

class Group
{
    private $conn;
    private $table_name = "student_groups";

    public $id;
    public $group_name;
    public $course;

    public $faculty;
    public function __construct($db){
        $this->conn = $db;
    }

    function read()
    {
        $query = "SELECT
         c.faculty_name as faculty_name,p.id,p.group_name,p.course,p.faculty_id
    FROM 
        " . $this->table_name . " p
        LEFT JOIN
            faculty c
                ON  p.faculty_id = c.id
        ORDER BY
            p.id DESC";


        // выбираем все записи


        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // выполняем запрос
        $stmt->execute();
        return $stmt;
    }

    // метод для создания товаров
    /*function create()
    {
        // запрос для вставки (создания) записей
        $query = "INSERT INTO
            " . $this->table_name . "
        SET
            firstName=:firstName, lastName=:lastName";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // очистка
        $this->firstName = htmlspecialchars(strip_tags($this->firstName));
        $this->lastName = htmlspecialchars(strip_tags($this->lastName));


        // привязка значений
        $stmt->bindParam(":firstName", $this->firstName);
        $stmt->bindParam(":lastName", $this->lastName);

        // выполняем запрос
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }*/
}