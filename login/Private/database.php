<?php

define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'login_db');


if(!$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)){

    die("Failed to connect");
}