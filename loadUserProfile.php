<?php
include "connection/connection.php";

class User
{
    private $firstName;
    private $lastName;
    private $username;
    private $email;

    public function set_firstName($name)
    {
        $this->firstName = $name;
    }
    public function set_lastName($lastname)
    {
        $this->lastName = $lastname;
    }
    public function set_username($username)
    {
        $this->username = $username;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }

    public function get_firstName()
    {
        return $this->firstName;
    }
    public function get_lastName()
    {
        return $this->lastName;
    }
    public function get_username()
    {
        return $this->username;
    }
    public function get_email()
    {
        return $this->email;
    }
}

$user = new User();
$user->set_username($_SESSION['username']);
$username = $user->get_username();

$query = "SELECT * from user WHERE username='$username'";
$data = $mysqli->query($query);

if ($row = $data->fetch_object()) {
    $user->set_firstName($row->first_name);
    $user->set_lastName($row->last_name);
    $user->set_email($row->email);
}
