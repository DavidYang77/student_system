<?php
	require "include/inic.php";


if($_POST)
{
	// 多个删除
	$department_id=implode(",",$_POST["del"]);

	// sql语句删除
	$sql="DELETE FROM `stu_department` WHERE department_id IN({$department_id})";
	$res=mysql_query($sql);

	// 影响记录
	var_dump(mysql_affected_rows());
	if(mysql_affected_rows()>0)
	{
		success("删除成功","./department_list.php");
	}else{
		error("删除失败");
	}
	
}

// 编写sql语句 （查询）
	$sql="SELECT * FROM `stu_department` ORDER BY department_id DESC";

// 执行sql语句
	$res=mysql_query($sql);

	// 存起来
	$data=array();
	if(mysql_num_rows($res)>0)
	{
		while($row=mysql_fetch_assoc($res))
		{
			$data[]=$row;
		}
	}

	// var_dump($data);

?>
<h1>院系页面<a href="./department_add.php">添加页面</a></h1>
<form action="" method="post">
<table width="100%" border="1" cellspacing="0">
	<tr>
		<th><input type="checkbox" id="check_all">全选 -- <input type="submit" value="删除"> -- <input type="checkbox" id="check_fan">反选</th>
		<th>编号</th>
		<th>院系名称</th>
		<th>操作</th>
	</tr>
<?php foreach ($data as $value) { ?>
	<tr>
		<td><input type="checkbox" name="del[]" value="<?php echo $value["department_id"] ?>"></td>
		<td><?php echo $value["department_id"] ?></td>
		<td><?php echo $value["department_name"] ?></td>
		<td><a href="department_add_edit.php?dear_id=<?php echo $value['department_id'] ?>">编辑</a></td>
	</tr>
<?php } ?>
</table>
</form>
<script src="js/jquery-1.11.3.min.js"></script>
	<SCRIPT TYPE="text/javascript">
		// 全选
		$("#check_all").click(function()
		{
			var checked=$(this).prop("checked");
			if(checked)
			{
				$("[name='del[]']").prop("checked",true);
			}else{
				$("[name='del[]']").prop("checked",false);
			}
		})	

		// 反选
		$("#check_fan").click(function()
		{
			$("[name='del[]']").prop("checked",function()
				{
					return !$(this).prop("checked");
				});
			
		})
	</SCRIPT>