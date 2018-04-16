<?php
session_start();
$form = $_POST;

if(($form["login"] && $form["email"] && $form["password"] && $form["checking-password"])){

    $login = htmlspecialchars($form["login"]);
    $email = htmlspecialchars($form["email"]);
    $password = htmlspecialchars($form["password"]);
    $password_confirm = htmlspecialchars($form["checking-password"]);

    $login = trim($login);
    $email = trim($email);
    $password = trim($password);
    $password_confirm = trim($password_confirm);

    $id = $_SESSION["id"];

    try {
        $mysqli = new mysqli("127.0.0.1","root","","users");
        $mysqli->query("SET NAMES utf8");
        $userBefore = $mysqli->query("SELECT * FROM registr WHERE id = '$id'");
        $userBefore = mysqli_fetch_array($userBefore);

        if($userBefore["login"] == $login && $userBefore["email"] == $email && empty($password)){
            echo "NOTHING EDITED";
        }else{
            if($userBefore["login"] != $login){

                $checkLogin = $mysqli->query("SELECT * FROM registr WHERE login = '$login'");
                $checkLogin = mysqli_fetch_array($checkLogin);
                var_dump($checkLogin["id"]);
                if($checkLogin && $checkLogin["id"] != $id){
                    echo "User has already registered with this login! Change the login!";
                }
                else{
                    $mysqli->query(("UPDATE registr SET login = '$login' WHERE id = '$id'"));
                }

            }
            if($userBefore["email"] != $email){

                $checkEmail = $mysqli->query("SELECT * FROM registr WHERE email = '$email'");
                $checkEmail = mysqli_fetch_array($checkEmail);

                if($checkEmail && $checkEmail["id"] != $id){
                    echo "User has already registered with this email! Change the email!";
                }
                else{
                    $mysqli->query("UPDATE registr SET email = '$email' WHERE id = '$id'");
                }

            }
            if((!empty($password)) && (!password_verify($password, $userBefore["password_hash"]))){

                if (($password == $password_confirm)) {

                    $password_hash = password_hash($password, PASSWORD_DEFAULT);

                    $mysqli->query("UPDATE registr SET password_hash = '$password_hash' WHERE id = '$id'");
                }
                else{
                    echo "Passwords are different!";
                }
            }
        }

        $mysqli->close();
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}
exit();