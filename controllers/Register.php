<?php

require("../Models/UserDataSet.php");
//require('../Models/User.php');

//$view = new stdClass();
//$view->pageTitle ='Login';
////$username = "";
//$view->message = "";
//
//if(isset($_POST["Login"])) {
//    //$username = $_POST["username"];
//    //$password = $_POST["psw"];
//    $username = $_POST['regUsername'];
//    $password = $_POST['regPassword'];
//    $name = $_POST['enterName'];
//    $email = $_POST['enterEmail'];
//
//
//    //$login = new UserDataSet();
//    $userDataSet = new UserDataSet();
//    //$view->$login->addUser($username, $password, $name, $email);
//    $view->userDataSet = $userDataSet->addUser($username, $password, $name, $email);
//    header("Location: ../index.php?Login Successful");
//
//}



//require_once('Views/template/Register.phtml');
//require_once(__DIR__ . '/../Views/Register.phtml');
//require_once ('../Models/UserDataSet.php');
//require_once ('../Models/User.php');

$view = new stdClass();
$view->pageTitle = 'Register';

//if (isset($_POST['login'])) {
    //$username = clean($_POST['username']);
    //$password = md5($_POST['password']);
    $username = $_POST['regUsername'];
    $password = $_POST['regPassword'];
    $name = $_POST['enterName'];
    $email = $_POST['enterEmail'];
    $userDataSet = new UserDataSet();
    $userDataSet = $userDataSet->addUser($username,$password,$name,$email);
    header("Location: ../index.php?Sign Up Successful");
    //$countUserDataSet = count($view->userDataSet);
//}
//
//require_once ('../Views/index.phtml');