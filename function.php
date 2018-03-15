<?php

function file_connection( $file ) {
	include $file;
}

function send_mail_to_admin() {
	if ( ( isset( $_POST['lastName'] ) && $_POST['lastName'] != "" ) && ( isset( $_POST['firstName'] ) && $_POST['firstName'] != "" ) && ( isset( $_POST['phone'] ) && $_POST['phone'] != "" ) && ( isset( $_POST['message'] ) && $_POST['message'] != "" ) ) {
		$to      = 'russ-i@yandex.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
		$subject = 'Заказ с сайта'; //Загаловок сообщения
		$message = '
                <html>
                    <head>
                        <title>' . $subject . '</title>
                    </head>
                    <body>
                        <h3>На сайте оформлена заявка от пользователя:</h3>
                        <h4>Фамилия: ' . $_POST['lastName'] . '</h4>
                        <h4>Имя: ' . $_POST['firstName'] . '</h4>
                        <h4>Отчество: ' . $_POST['middleName'] . '</h4>
                        <h4>Телефон: ' . $_POST['phone'] . '</h4>
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
		$headers = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
		$headers .= "From: Отправитель <info@gmail.com>\r\n"; //Наименование и почта отправителя
		mail( $to, $subject, $message, $headers ); //Отправка письма с помощью функции mail
	}
}
function send_mail_to_user() {
	if ( ( isset( $_POST['lastName'] ) && $_POST['lastName'] != "" ) && ( isset( $_POST['firstName'] ) && $_POST['firstName'] != "" ) && ( isset( $_POST['phone'] ) && $_POST['phone'] != "" ) && ( isset( $_POST['message'] ) && $_POST['message'] != "" ) ) {
		$to      = 'russ-i@yandex.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
		$subject = 'Вами оформлен заказ'; //Загаловок сообщения
		$message = '
                <html>
                    <head>
                        <title>' . $subject . '</title>
                    </head>
                    <body>
                        <h3>Здравствуйте, '.$_POST['firstName'].'! Спасибо что оформили заказ на нашем сайте.<br>
                        В ближайшее время с Вами свяжется менеджер.</h3>
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
		$headers = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
		$headers .= "From: Отправитель <info@gmail.com>\r\n"; //Наименование и почта отправителя
		mail( $to, $subject, $message, $headers ); //Отправка письма с помощью функции mail
	}
}
