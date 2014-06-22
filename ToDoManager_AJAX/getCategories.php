<?php

require 'DBConfig.php';
require 'Conn.php';

$sql1='SELECT * FROM category';
$categories=mysql_query($sql1);
if($categories){
		$jcates="[";
		for($i=0;$i<mysql_num_rows($categories);$i++){
			$row=mysql_fetch_assoc($categories);
		
			$jcates.="{'categoryID':'".$row['categoryID']."','categoryName':'".$row['categoryName']."'}";
			if($i<mysql_num_rows($categories)-1){
				$jcates.=",";
			}else{
				$jcates.="]";
			}
			
			
		}
		
		echo $jcates;
		
		
		

}else{
	echo "加载类别失败!";
}

mysql_free_result($categories);
mysql_close($link);
?>