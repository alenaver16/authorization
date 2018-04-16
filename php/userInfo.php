<?php
session_start();
if(isset($_SESSION["id"])) {

    $id = $_SESSION["id"];
//    var_dump($_SESSION['id']);
//    try{
    $mysqli = new mysqli("127.0.0.1", "root", "", "users");
    $mysqli->query("SET NAMES utf8");
    $input = $mysqli->query("SELECT * FROM registr WHERE id = '$id'");
    $arr = mysqli_fetch_array($input);
}
//        var_dump($arr);
//    }catch(Exception $exception){
//        echo $exception->getMessage();
//    }
//}
//else
//    echo "ERROR";

//$mysqli->close();
?>