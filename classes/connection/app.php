<?php
include "dbInterface.php";
include "dbConfig.php";

class App
{
    private $db_config;
    private $db_interface;

    function __construct()
    {
        $this->db_config = new DbConfig();
        $this->db_interface = new DbInterface($this->db_config);
    }

    function get_users()
    {
        return $this->db_interface->get_users();
    }

    function get_user($id)
    {
        return $this->db_interface->get_user($id);
    }
}