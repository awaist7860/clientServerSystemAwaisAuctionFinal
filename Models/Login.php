<?php
require_once 'Database.php';
require_once '../controllers/Login.php';


class Login
{
    protected $_dbConnection, $_dbInstance;


    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbConnection = $this->_dbInstance->getDbConnection();
    }



    public function login($email, $psw)
    {
        $UsernameQuery = 'SELECT username FROM users WHERE username = "Awais"';

        return $UsernameQuery;


    }

    public function register($username,$password,$name,$email) {
        $userDataset = new userDataset();
        return $userDataset->addUser($username,$password,$name,$email);
    }

}