<?php


include 'config.php';

global $link;

if ( empty( $link ) ) {
	$link = mysqli_connect( HOST, LOGIN, PASSWORD, DATABASE );
}

/**
 * Функция осуществляющая запрос к БД
 *
 * @param $query
 *
 * @return bool|mysqli_result
 *
 */
function do_query( $query ) {
	global $link;
	mysqli_set_charset( $link, 'utf8' );
	$result = mysqli_query( $link, $query );

	return $result;
}

/**
 *Функция установки временной зоны
 */
date_default_timezone_set( 'Europe/Moscow' );

/**
 * Функция подключения файлов
 *
 * @param $file
 *
 */
function file_connection( $file ) {
	include $file;
}


/**
 *
 * Функция отправки сообщения администратору сайта, что пришло сообщение от пользователя
 *
 */
function send_mail_to_admin() {
	if ( ( isset( $_POST['lastName'] ) && $_POST['lastName'] != "" ) && ( isset( $_POST['firstName'] ) && $_POST['firstName'] != "" ) && ( isset( $_POST['phone'] ) && $_POST['phone'] != "" ) && ( isset( $_POST['message'] ) && $_POST['message'] != "" ) ) {
		$to      = 'russ-i@yandex.ru';
		$subject = 'Заказ с сайта';
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
                </html>';
		$headers = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: Отправитель <info@gmail.com>\r\n";
		mail( $to, $subject, $message, $headers );
	}
}

/**
 * Функция отправки на почтовый ящик пользователя сообщения от том, что заявка принята
 */
function send_mail_to_user() {
	if ( ( isset( $_POST['lastName'] ) && $_POST['lastName'] != "" ) && ( isset( $_POST['firstName'] ) && $_POST['firstName'] != "" ) && ( isset( $_POST['phone'] ) && $_POST['phone'] != "" ) && ( isset( $_POST['message'] ) && $_POST['message'] != "" ) && ( isset( $_POST['email'] ) && $_POST['email'] != "" ) ) {
		$to      = $_POST['email'];
		$subject = 'Вами оформлен заказ';
		$message = '
                <html>
                    <head>
                        <title>' . $subject . '</title>
                    </head>
                    <body>
                        <h3>Здравствуйте, ' . $_POST['firstName'] . ' ' . $_POST['middleName'] . '! Спасибо что оформили заказ на нашем сайте.<br>
                        В течении суток с Вами свяжется менеджер.</h3>
                    </body>
                </html>';
		$headers = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: Отправитель <info@gmail.com>\r\n";
		mail( $to, $subject, $message, $headers );
	}
}

/**
 * Получение IP пользователя
 *
 * @return mixed
 */
function get_ip() {

	if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	return $ip;
}

/**
 * Функция записи данных пользователя в файл
 *
 */
function write_to_file() {
	if ( ( isset( $_POST['lastName'] ) && $_POST['lastName'] != "" ) && ( isset( $_POST['firstName'] ) && $_POST['firstName'] != "" ) && ( isset( $_POST['phone'] ) && $_POST['phone'] != "" ) && ( isset( $_POST['message'] ) && $_POST['message'] != "" ) && ( isset( $_POST['email'] ) && $_POST['email'] != "" )) {
		$data_array = implode( '|', $_POST );
		$date       = date( 'Y-m-d H:i:s' );
		$data_array .= $date;
		$file       = fopen( "users.txt", "a" );
		fwrite( $file, $data_array . "/" . $_SERVER['REMOTE_ADDR'] . "/" . get_ip() . "\r\n" );
	}
}

/**
 * Добавление в БД сведений о пользователе
 */
function db_add_data() {
	global $link;
	if ( ( ( isset( $_POST['lastName'] ) && $_POST['lastName'] != "" ) && ( isset( $_POST['firstName'] ) && $_POST['firstName'] != "" ) && ( isset( $_POST['phone'] ) && $_POST['phone'] != "" ) && ( isset( $_POST['message'] ) && $_POST['message'] != "" ) ) ) {
		$firstName  = $_POST['firstName'];
		$lastName   = $_POST['lastName'];
		$middleName = $_POST['middleName'];
		$phone      = $_POST['phone'];
		$message    = $_POST['message'];
		$email = $_POST['email'];
		do_query( "INSERT INTO `data_user` (`last_name`,`first_name`,`middle_name`,`message`,`phone`, `email`) VALUES ('{$lastName}','{$firstName}','{$middleName}','{$message}','{$phone}','{$email}' )" );
	}
}