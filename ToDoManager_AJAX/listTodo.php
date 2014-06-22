<?php
require 'DBConfig.php';
require 'Conn.php';

$sql='SELECT * FROM todo LEFT JOIN category ON todo.categoryID=category.categoryID';

echo '<h2>待办事项列表</h2>';
echo '<table width="80%" border="1" align="center" frame="border">';
echo '<tr><td colspan="3"><input value="添加待办事项" type="button" onclick="addTodo()"></td> <td colspan="2"> <input value="添加类别" type="button" onclick="addCategory()"></td></tr>';


echo '<tr> <td>主题</td> <td>内容</td> <td>时间</td> <td>类别</td> <td>操作</td></tr>';

$result=mysql_query($sql);
   if(!$result){
	die("查询数据库失败！");
   }
   
   
   if(mysql_num_rows($result)>0){
		
	 while($rows=mysql_fetch_assoc($result)){
		echo '<tr>';
		
		
		echo '<td>'.$rows['todoName'].'</td>';
		echo '<td>'.$rows['todoContent'].'</td>';
		echo '<td>'.$rows['todoDate'].'</td>';
		echo '<td>'.$rows['categoryName'].'</td>';
		
		echo '<td>  
		<input type="button"  onclick="updateTodo('.$rows['todoID'].')" value="修改"/>
		<input type="button"  onclick="deleteTodo('.$rows['todoID'].')" value="删除"/>
		</td>';
		
		
		echo '</tr>';
		
	 } 
   
   }else{
     echo '<tr><td>表中没有数据</td></tr>';
   }



echo '</table>';

mysql_free_result($result);
mysql_close($link);

?>