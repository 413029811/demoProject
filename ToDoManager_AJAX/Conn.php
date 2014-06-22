

<?php

$link=@mysql_connect($DBConfig['host'],$DBConfig['username'],$DBConfig['password']);

if(!$link){
   
   
   echo '链接数据库失败：'.mysql_errno().':'.mysql_error();

}

$db=mysql_select_db($DBConfig['dataBase']);

if(!$db){
  
   echo '选择数据库失败:'.mysql_errno().':'.mysql_error();
   
}



?>

