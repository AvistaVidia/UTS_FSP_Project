<?php
class Koneksi {
    protected $mysqli;

    public function __construct() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "fullstack";

        $this->mysqli = new mysqli($host, $user, $password, $db);

        if ($this->mysqli->connect_errno) {
            die("Failed to connect to MySQL: " . $this->mysqli->connect_error);
        }
    }
}
?>