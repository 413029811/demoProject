<?php
require 'DBConfig.php';
require 'Conn.php';

if(isset($_POST['todoName'])){
$sql2="UPDATE todo SET todoName='".htmlspecialchars($_POST['todoName'])."',todoContent='".htmlspecialchars($_POST['todoContent'])."',todoDate='".htmlspecialchars($_POST['todoDate'])."',categoryID=".htmlspecialchars($_POST['categoryID'])." WHERE todoID=".htmlspecialchars($_POST['update_id']);

if(mysql_query($sql2)){
	if(mysql_affected_rows($link)>0){
			echo "修改成功!";
		}else{
			echo "修改失败!";
		}

}else{
	echo "修改失败!";
}
}
mysql_close($link);


?>