<?php
session_start();
$mysqli = new mysqli("127.0.0.1", "root", "", "users");

$mysqli->query("SET NAMES 'utf8'");

//Проверяем, если существует переменная token в глобальном массиве GET

if(isset($_GET['token']) && !empty($_GET['token'])){

    $token = $_GET['token'];
}else{

    exit("<p><strong>Ошибка!</strong> Отсутствует проверочный код.</p>");
}
//Проверяем, если существует переменная email в глобальном массиве GET
if(isset($_GET['email']) && !empty($_GET['email'])){

    $email = $_GET['email'];
    var_dump($email);
}else{
    exit("<p><strong>Ошибка!</strong> Отсутствует адрес электронной почты.</p>");
}
//Делаем запрос на выборке токена из таблицы confirm_users
$query_select_user = $mysqli->query("SELECT token FROM confirm_users WHERE email = '$email'");
$arr = mysqli_fetch_array($query_select_user);
//Если ошибок в запросе нет
//if(($row = $query_select_user->fetch_assoc()) != false){
if($arr){
    //Если такой пользователь существует
    if ($arr['token']){
        //Проверяем совпадает ли token
        if($token == $arr['token']){

            ///Обновляем статус почтового адреса
            $query_update_user = $mysqli->query("UPDATE registr SET email_status = 1 WHERE email = '$email'");

            if(!$query_update_user){

                exit("<p><strong>Ошибка!</strong> Сбой при обновлении статуса пользователя. Код ошибки: ".$mysqli->errno."</p>");

            }else{

                //Удаляем данные пользователя из временной таблицы confirm_users
                $query_delete = $mysqli->query("DELETE FROM confirm_users WHERE email = '$email'");

                if(!$query_delete){

                    exit("<p><strong>Ошибка!</strong> Сбой при удалении данных пользователя из временной таблицы. Код ошибки: ".$mysqli->errno."</p>");

                }else{
                    //Выводим сообщение о том, что почта успешно подтверждена.
                    echo '<h1 class="success_message text_center">Почта успешно подтверждена!</h1>';
                    echo '<p class="text_center">Теперь Вы можете войти в свой аккаунт.</p>';
                    echo '<p class="text_center">Чтобы вернуться на главную страницу перейдите по ссылке: 
                    <a href="http://'.$_SERVER['HTTP_HOST'].'/index.php">Acceptic</a>.</p>';
                    }
            }

        }else{ //if($token == $row['token'])
            exit("<p><strong>Ошибка!</strong> Неправильный проверочный код.</p>");
        }

    }else{ //if($query_select_user->num_rows == 1)
        exit("<p><strong>Ошибка!</strong> Такой пользователь не зарегистрирован </p>");
    }

}else{ //if(($row = $query_select_user->fetch_assoc()) != false)
    //Иначе, если есть ошибки в запросе к БД
    exit("<p><strong>Ошибка!</strong> Сбой при выборе пользователя из БД. <?=$token?> </p>");
}

//Закрываем подключение к БД
$mysqli->close();
?>