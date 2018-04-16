<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Title</title>
<!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--    User's styles-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/autorization.css" rel="stylesheet">
    <link href="css/userPage.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
<!--    Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
<!--    Scripts-->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="jquery/jquery-3.3.1.js"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->

</head>
<body>
<?php

include ("components/header.html");
include ("components/menu.html");
include("components/autorization.html");
include("components/userPage.html");
include ("components/modal.html");
include ("components/footer.html");
?>

</body>
<!--Bootstrap an jquery scripts-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--User's scripts-->
<script src="js/main.js"></script>
<script src="js/login.js"></script>
<script src="js/registration.js"></script>

<script>
    function showError(container, errorMessage) {
        container.className = 'error';
        var msgElem = document.createElement('span');
        msgElem.className = "error-message";
        msgElem.innerHTML = errorMessage;
        container.appendChild(msgElem);
    }

    function resetError(container) {
        container.className = '';
        if (container.lastChild.className == "error-message") {
            container.removeChild(container.lastChild);
        }
    }

    function validate(form) {
        var elems = form.elements;

        resetError(elems.login.parentNode);
        if (!elems.login.value) {
            showError(elems.login.parentNode, ' Укажите от кого.');
        }
        resetError(elems.email.parentNode);
        if (!elems.email.value) {
            showError(elems.email.parentNode, ' Укажите о.');
        }

        resetError(elems.password.parentNode);
        if (!elems.password.value) {
            showError(elems.password.parentNode, ' Укажите пароль.');
        } else if (elems.password.value != elems.checking-password.value) {
            showError(elems.password.parentNode, ' Пароли не совпадают.');
        }

    }
</script>
</html>