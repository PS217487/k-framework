<?php
require_once "./classes/user.php";


class DbInterface
{
    private $connection;

    function __construct($db_config)
    {
        // Create connection
        $this->connection = new mysqli($db_config->servername, $db_config->username, $db_config->password, $db_config->dbname);
        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
            // TODO: proper failure handling needed
        }
    }

    function __destruct()
    {
        $this->connection->close();
    }

    function get_users()
    {
        $sql = "SELECT * FROM users ORDER BY name";
        $result = $this->connection->query($sql);
        $output = array();
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $user = new User($row);
            array_push($output, $user);
        }
        return $output;
    }

    function get_user($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $output = new User($row);
        return $output;
    }
}
