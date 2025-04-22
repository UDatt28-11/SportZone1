<?php

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/SportZone1/');
define('PAY_URL', 'https://tall-experts-own.loca.lt/SportZone1/');


// Đường dẫn vào phần admin
define('BASE_URL_ADMIN'       , 'http://localhost/SportZone1/admin/'); 



define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sportzone1');  // Tên database


define('PATH_ROOT'    , __DIR__ . '/../');



// var_dump($_SERVER);
function url($url = "")
{
    $_SERVER["SCRIPT_NAME"] = str_replace(basename($_SERVER["SCRIPT_NAME"]), "", $_SERVER["SCRIPT_NAME"]);
    $URL = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["SCRIPT_NAME"] . $url;
    return $URL;
}

