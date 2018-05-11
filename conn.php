<?php
header("Content-Type:text/html;charset=utf-8"); 
$server = "localhost";
$db_user = "root";
$db_psw = "";
$link = mysql_connect($server, $db_user, $db_psw);
mysql_query("set names utf8");
if ($link) {
//    echo "success";测试git
} else {
    echo "error";
}
mysql_select_db("randomstd");
?>