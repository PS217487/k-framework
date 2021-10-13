<?php
class User {
    public $id;
    public $name;
    public $surname;
    public $email;

    function __construct($sql_record)
    {
        $this->id = $sql_record["id"];
        $this->name = $sql_record["name"];
        $this->surname = $sql_record["surname"];
        $this->email = $sql_record["email"];
    }
}