<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改待办事项</title>
<script type="text/javascript" src="jquery/jquery-1.4.2.js"></script>
		<link rel="stylesheet" href="jquery/jquery.datepick.css" type="text/css">
		<script type="text/javascript" src="jquery/jquery.datepick.js"></script>
		<script type="text/javascript" src="jquery/jquery.datepick-zh-CN.js"></script>

</head>


<script type="text/javascript">
		$(document).ready(function(){
			//使用class属性处理  'yy-mm-dd' 设置格式"yyyy/mm/dd"
			$('#todoDate').datepick({dateFormat: 'yy-mm-dd'}); 
			getCategories();
			
		});
		
		function updateTodo(){
			var json=$("#form1").serialize();
			$.post("updateTodo.php",json,function(data,textStatus){
				
				var sData = window.dialogArguments; 
				sData.listTodo();
				alert(data);
				window.close();
			});
		}
		
		function getCategories(){
			$.post("getCategories.php",function(data,status){
				var categories=eval("("+data+")");
				$.each($(categories),function(index,domEle){
					$option=$("<option></option>");
					$option.val(domEle.categoryID);
					$option.text(domEle.categoryName);
					$("#categoryID").append($option);
				})
				
			});
		}
		
	
	</script>

<body  style="text-align:center">

<?php
require 'DBConfig.php';
require 'Conn.php';

$sql_find="SELECT * FROM todo WHERE todoID=".$_GET['update_id'];

$updateTodo=mysql_query($sql_find);
if($updateTodo){
	$rowTodo=mysql_fetch_array($updateTodo);
	
}
mysql_free_result($updateTodo);
mysql_close($link);

?>


<h1>修改待办事项</h1>
<form action="#" method="post" id="form1">
<input type="hidden" name="update_id" id="update_id" value="<?php echo $_GET['update_id'];?>"/>
 <table border="0"  align="center" width="80%">
<tr>
 <td>主题</td>
 <td><input type="text" name="todoName" value="<?php echo $rowTodo['todoName'];?>"/></td>
</tr>

<tr>
 <td>内容</td>
 <td><input type="text" name="todoContent" value="<?php echo $rowTodo['todoContent'];?>"/></td>
</tr>

<tr>
 <td>时间</td>
 <td><input type="text" name="todoDate" id="todoDate" value="<?php echo $rowTodo['todoDate'];?>"/></td>
</tr>

<tr>
    <td>类别</td>
    <td> <select name="categoryID" id="categoryID">


		</select>
		</td>
    </tr>


<tr>
 <td><input type="button" value="修改" onclick="updateTodo()"/></td>

 
</tr>





</table>
</form>




</body>
</html>
