<html>
<body>
<?php
require 'DBconfig.php';
require 'conn.php';

$sql='DELETE FROM todo WHERE todoID='.$_GET['delete_id'];

if(mysql_query($sql)){
	if(mysql_affected_rows($link)>0){
		echo "删除成功！";
	}else{
		echo "删除失败！";
	}
}else{
	echo "删除失败！";
}

mysql_close($link);

?>
</body>
</html>
