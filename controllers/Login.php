<?php

require_once ('../Models/UserDataSet.php');
require_once ('../Models/User.php');

session_start();

//$email = $_POST['username'];
//$pasw = $_POST['password'];
//
//$userDataSet = new userDataSet();
//
//$result = $userDataSet->login($email, $pasw);
//print_r($result);
//
//if($result)
//{
//    header("Location: ../index.php");
//}
//
//else
//{
//    header("Location: ../index.php?error=Invalid username/password");
//}


function clean($sanString)
{
    $sanString = stripslashes($sanString);
    $sanString = strip_tags($sanString);
    $sanString = htmlentities($sanString);
    return $sanString;
}

$view = new stdClass();
$view->pageTitle ='Login';
//$username = "";
$view->message = "";


if (isset($_POST['login']))
{
    //$username = clean($_POST['username']);
    //$password = md5($_POST['password']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userDataSet = new UserDataSet();
    $view->userDataSet = $userDataSet->login($username,$password);
    $countUserDataSet = count($view->userDataSet);

    if($countUserDataSet == 1)
    {
        session_start();
        $_SESSION['username'] = $username;
        $view->message = "you have logged in successfully ";
        header("Location: ../index.php?Login Successful");
        die();
    }
    else {
        echo $view->message = "Invalid password and username";
    }
}

//https://phppot.com/php/user-authentication-using-php-and-mysql/




require_once ('../Views/index.phtml');

//include_once '../Models/Login.php';
//include_once '../Views/template/header.phtml';
//
//
//$email = $_POST['username'];
//$pasw = $_POST['password'];
//$login = new Login();
//
//$result = $login->login($email, $pasw);
//
//if($result)
//{
//    echo "welcome";
////    header("location: ../header.php");
//}
//
//else
//{
//    echo "Wrong details!, please retry!";
//}
