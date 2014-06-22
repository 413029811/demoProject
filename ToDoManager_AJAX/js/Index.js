



function updateTodo(id){
	window.showModalDialog("updateTodoUI.php?update_id="+id,window,"status:no;resizable:yes;dialogHeight:300px;dialogWidth:360px;unadorne:yes;help:no");
}

function deleteTodo(id){
	var flag=confirm("您确定删除该待办事项吗？");
    if(flag){
	var json={delete_id:id};
	$.get("deleteTodo.php",json,function(data,textStatus){
		window.listTodo();
		alert(data);
	});
	}
}

function addTodo(){
	window.showModalDialog("addTodoUI.html",window,"status:no;resizable:yes;dialogHeight:300px;dialogWidth:360px;unadorne:yes;help:no");
}

function addCategory(){
	window.showModalDialog("addCategoryUI.html",window,"status:no;resizable:yes;dialogHeight:300px;dialogWidth:360px;unadorne:yes;help:no");
}