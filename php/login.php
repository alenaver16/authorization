<?php
session_start();

$login = htmlspecialchars($_POST["login"]);
$password = htmlspecialchars($_POST["password"]);
$_SESSION["login"] = $login;


$mysqli = new mysqli("127.0.0.1","root","","users");
$mysqli->query("SET NAMES utf8");
$input = $mysqli->query("SELECT * FROM registr WHERE login = '$login'");
$arr = mysqli_fetch_array($input);

if(empty($arr)){
    $log_in['res'] = "Sorry, can't find account with this login!";
    $log_in['log'] = "";
}
else{
    if(password_verify($password, $arr['password_hash'])){
        if((int)$arr["email_status"]) {
            $log_in['res'] = "Welcome to your account!";
            $log_in['log'] = $arr['login'];
            $_SESSION['id'] = $arr['id'];
//            var_dump($_SESSION['id']);
        }
        else{
            $log_in['res'] = "Confirm your email!";
        }
    }
    else{
        $log_in['res'] = "Password is not true!";
        $log_in['log'] = "";
    }
}
echo json_encode($log_in);
$mysqli->close();
?>