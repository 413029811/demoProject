<?php
require 'DBConfig.php';
require 'Conn.php';

if(isset($_POST['categoryName'])){
	$sql1="SELECT * FROM category WHERE categoryName='".$_POST['categoryName']."'";
	
	$re=mysql_query($sql1);
	if($re){
		if(mysql_num_rows($re)<=0){
			 $sql2="INSERT INTO category(categoryName) VALUES('".htmlspecialchars($_POST['categoryName'])."')";
	
	
				if(mysql_query($sql2)){
				if(mysql_affected_rows($link)>0){
					echo "添加成功!";
				}else{
					echo "添加失败!";
				}
				}else{
					echo "添加失败!";
				}
		
		}else{
			echo "该类别已存在";
		}
	}else{
		echo "查询数据库失败！";
	}

   
}

mysql_close($link);

?>