# authorization
Authorization project

PHP: 7.1
HTTP: Apache-PHP-7
MySQL: 5.7

При тестировании использовался локальный сервер Open Server.
Для отправки почты использовался Open Server и отправка в нем осуществлялась через удаленный SMTP сервер
Настройки почты в Open Server:

База хранилась в PhpMyAdmin

Для корректной работы с отправкой писем на почту нужно указать в файле registration.php значение переменной $email_admin