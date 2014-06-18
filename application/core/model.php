<?php
class Model
{
     
    public static function query($request)
  {
    include 'config_db.php';
    $handle = mysql_connect($host, $user, $password) 
    or die("Извините сейчас невозможно подключиться к базе данных".mysql_error());
    mysql_select_db($db_name, $handle) or die ( " Базы данных не существует.".mysql_error() );
   	$result = mysql_query  ($request, $handle);
    mysql_close($handle);
    return $result;
  }  
}
?>