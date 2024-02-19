<?php

namespace objects;

class Faculty
{
    private $conn;
    private $table_name = "faculty";

    public $id;
    public $faculty_name;

    public function __construct($db){
        $this->conn = $db;
    }

    function read()
    {
        $query = "SELECT
         p.id,p.faculty_name
    FROM 
        " . $this->table_name . " p";
        // выбираем все записи


        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // выполняем запрос
        $stmt->execute();
        return $stmt;
    }

}