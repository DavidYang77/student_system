<?php
   require "include/inic.php";

   if($_POST)
   {
   	//接收用户提交数据
   	$department_name = $_POST['name']; 

      //编写SQL语句
      $sql = "INSERT INTO `stu_department` (department_name) VALUES ('{$department_name}')";

      //执行SQL语句
      mysql_query($sql);

// 反馈信息
      if(mysql_insert_id()>0)
      {
         success("插入成功","./department_list.php");
      }else{
         error("插入失败");
      }

      //关闭数据库
      mysql_close();
   }

?>

<h1>添加院系</h1>
<form action="" method="post">
	<table>
		<tr>
			<th>院系名称</th>
			<th><input type="text" name="name" id=""></th>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="添加"></td>
		</tr>
	</table>
</form>