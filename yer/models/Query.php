<?php
require_once('configs/config.php');
require_once('models/Database.php');
require_once('models/People.php');
require_once('models/Users.php');
require_once('models/Admin.php');

class Query
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
    }

    public function getUserByUsername($username) {
        $link = $this->db->connect();
        $stmt = $link->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        if ($row == null) return null;
        $user = new Users($row['username'], $row['first_name'], $row['last_name'], $row['url'], $row['email'], $row['pass']);
        

        return $user;
    }

    public function getAdminByUsername($username) {
        $link = $this->db->connect();
        $stmt = $link->prepare("SELECT * FROM admins WHERE a_username = ? LIMIT 1");
        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        if ($row == null) return null;
        $user = new Admin($row['a_username'], $row['a_fname'], $row['a_lname'], $row['a_url'], $row['a_email'], $row['a_pass']);
        

        return $user;
    }
}