<?php

require 'DBConfig.php';
require 'Conn.php';

if(isset($_POST['todoName'])){
$sql2="INSERT INTO todo(todoName,todoContent,todoDate,categoryID) VALUES('".htmlspecialchars($_POST['todoName'])."','".htmlspecialchars($_POST['todoContent'])."','".htmlspecialchars($_POST['todoDate'])."',".htmlspecialchars($_POST['categoryID']).")";

if(mysql_query($sql2)){
	if(mysql_affected_rows($link)>0){
			echo "添加成功!";
		}else{
			echo "添加失败!";
		}

}else{
	echo "添加失败!";
}
}
mysql_close($link);



?>
