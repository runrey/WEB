<?php


abstract class People
{
    //variables
    private $username;
    private $first_name;
    private $last_name;
    private $url;
    private $email;
    private $password;

    //constructor
    public function __construct($username, $first_name, $last_name, $url, $email, $password)
    {
        $this->setUsername($username);
        $this->setFirstName($first_name);
        $this->setLastName($last_name);
        $this->setUrl($url);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    //setter and getter methods

    public function getUsername()
    {
        return $this->username;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }
    public function setUrl($url){
        $this->url = $url;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    abstract public function toString();
}