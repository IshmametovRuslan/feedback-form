<?php

require 'function.php';

file_connection( 'header.php' );
file_connection( 'form.php' );
send_mail_to_admin();
send_mail_to_user();