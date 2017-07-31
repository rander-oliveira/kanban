<?php
  $host = "localhost";
  $usr = "root";
  $psw = "admin";
  $db_name   = "to_do_list";

  $con = mysql_pconnect($host, $usr, $psw) or trigger_error(mysql_error(),E_USER_ERROR);
  mysql_select_db($db_name, $con);
?>
