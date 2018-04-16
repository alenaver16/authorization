<?php
session_start();
$address_site = "acceptic/";
$email_admin = "alenavereshaka16@gmail.com";

if(!$_POST['login'] || !$_POST['email'] || !$_POST['password'] || !$_POST['checking-password']) die('Заполните все поля!');

$login = htmlspecialchars($_POST["login"]);
$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST["password"]);
$checkin_password = htmlspecialchars($_POST["checking-password"]);
$email_status = '0';

$_SESSION["login"] = $login;
$_SESSION["email"] = $email;

$mysqli = new mysqli("127.0.0.1", "root", "", "users");

$mysqli->query("SET NAMES 'utf8'");
$input = $mysqli->query("SELECT login FROM registr WHERE login = '$login'");
$arr = mysqli_fetch_array($input);

if(!$arr){
    if(strlen($password)<6) {
        $sign_up = "The password must be at least 6 characters in length!";
    }
    else {
        if ($password == $checkin_password) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $input = $mysqli->query("INSERT INTO registr (login, email, email_status, password_hash, date_registr) VALUES ('$login', '$email', '0', '$password_hash', '" . time() . "' )");

            //Составляем зашифрованный и уникальный token
            $token=md5($email.time());
            //Добавляем данные в таблицу confirm_users
            $query_insert_confirm = $mysqli->query("INSERT INTO confirm_users (email, token, date_registr) VALUES ('$email', '$token', '" . time() . "') ");
            //Составляем заголовок письма
            $subject = "Подтверждение почты на сайте ".$_SERVER['HTTP_HOST'];
            //Устанавливаем кодировку заголовка письма и кодируем его
            $subject = "=?utf-8?B?".base64_encode($subject)."?=";
            $headers = "FROM: $email_admin\r\nReply-to: $email_admin\r\nContent-type: text/html; charset=utf-8\r\n";
            //Составляем тело сообщения
            $message = 'Здравствуйте! <br/> <br/> Сегодня '.date("d.m.Y", time()).', неким пользователем была произведена регистрация на сайте
            <a href="http://'.$_SERVER['HTTP_HOST'].'/index.php">'.$_SERVER['HTTP_HOST'].'</a> используя Ваш email.
            Если это были Вы, то, пожалуйста, подтвердите адрес вашей электронной почты, перейдя по этой ссылке:
            <a href="'.$address_site.'php/activation.php?token='.$token.'&email='.$email.'">'.$address_site.'activation/'.$token.'</a> <br/> <br/>
            В противном случае, если это были не Вы, то, просто игнорируйте это письмо. <br/> <br/> <strong>Внимание!</strong> Ссылка действительна 24 часа.
            После чего Ваш аккаунт будет удален из базы.';

            mail($email, $subject, $message, $headers);
            $sign_up = "Email has sended!";
        } else {
            $sign_up = "Passwords are different!";
        }
    }
}
else{
    $sign_up = "User with this login has created!";
}
echo $sign_up;
$mysqli->close();
?>