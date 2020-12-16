<?php

require_once ('../Models/User.php');
require_once ('../Models/Database.php');


class UserDataSet
{
 protected $_dbHandle;
 protected $_dbInstance;

 //userdataset constructor
    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    //Get all the users from the DBS
 public function fetchAllUsers()
 {
     $sqlQuery = 'SELECT * FROM users';

     echo $sqlQuery;

     $statement =$this->_dbHandle->prepare($sqlQuery);
     $statement->execute();

     $dataSet =[];
     while ($row=$statement->fetch())
     {
         $dataSet[] = new User($row);
     }
   return $dataSet;

 }

    public function fetchUsers($name) {
        $sqlQuery = "SELECT * FROM users WHERE username = ?" ;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(array($name)); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            array_push($dataSet, new User($row));
        }
        return $dataSet;
    }

 //Put a user inside the DBS
 public function addUser($username,$password,$name,$email)
 {
     $sqlQuery = "INSERT INTO users (username,password,name,email) VALUES ('$username','$password','$name','$email')";

     //echo $sqlQuery; //helpful for debugging

     $statement =$this->_dbHandle->prepare($sqlQuery);
     $statement->execute();

     $dataSet =[];
     while ($row=$statement->fetch())
     {
         $dataSet[] = new User($row);
     }
     return $dataSet;

//     $usersWithUsername = $this->fetchUsers($name);
//     if(count($usersWithUsername) ===  0) {
//         $sqlQuery = "INSERT INTO users (username,password,name,email) VALUES (?, ?, ?, ?)";
//         $statement = $this->_dbHandle->prepare($sqlQuery);
//         $statement->execute(array($username,$password,$name,$email));
//         return true;
//     }
//     return false;


 }

    public function login($username, $psw)
    {
        //$userDataset = new userDataSet();

        $userData = $this->fetchUsers($username);

        if(isset($userData[0]) && password_verify($psw, $userData[0]->getPassword()))
        {
            $_SESSION["userID"] = $userData[0]->getID();
            $_SESSION["username"] = $username;
            return true;
        }
        return false;
    }

    public function loginUser($username, $password)
    {
        $sqlQuery = "SELECT username,password FROM sgb849.users WHERE username = '$username' AND password = '$password'";

        $statement =$this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet =[];
        while ($row=$statement->fetch())
        {
            $dataSet[] = new User($row);
        }
        return $dataSet;

    }


//    public function login($username,$password)
//    {
//        $sqlQuery = "SELECT username,password FROM users WHERE user";
//
//        $statement =$this->_dbHandle->prepare($sqlQuery);
//        $statement->execute();
//
//        $dataSet =[];
//        while ($row=$statement->fetch())
//        {
//            $dataSet[] = new User($row);
//        }
//        return $dataSet;
//    }


}