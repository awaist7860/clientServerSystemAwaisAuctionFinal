<?php
class User
{
 protected $id,$username,$password,$name,$email;


    /**
     * User constructor.
     * @param $dbRow
     */
    public function __construct($dbRow)
    {
        $this->id=$dbRow['id'];
        $this->username = $dbRow['username'];
        $this->password = $dbRow['password'];
        $this->name = $dbRow['Name'];
        $this->email = $dbRow['email'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->name = $email;
    }

    public function validate($username,$password)
    {
        if(empty($username) && empty($password))
        {
            echo "<p> Your username and password boxes are empty</p>";
        }
        elseif (!empty($username) && !empty($password))
        {
            echo "<p>You have filled in your details suceesfully</p>";
        }
        else
        {
            return true;
        }
    }




}