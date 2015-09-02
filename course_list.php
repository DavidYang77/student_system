<?php
	require "include/inic.php";

if($_POST)
{
	// 多个删除
	$course_id=implode(",",$_POST["del"]);

	// sql语句删除
	$sql="DELETE FROM `stu_course` WHERE course_id IN({$course_id})";
	$res=mysql_query($sql);

	// 影响记录
	var_dump(mysql_affected_rows());
	if(mysql_affected_rows()>0)
	{
		success("删除成功","./course_list.php");
	}else{
		error("删除失败");
	}
	
}


// 编写sql语句 （查询）
	$sql="SELECT * FROM `stu_course` ORDER BY course_id DESC";

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
<h1>课程页面<a href="./course_add.php">添加页面</a></h1>
<form action="" method="post">
	<table width="100%" border="1" cellspacing="0">
		<tr>
			<th><input type="checkbox" id="check_all">全选 -- <input type="submit" value="删除"> -- <input type="checkbox" id="check_fan">反选</th>
			<th>编号</th>
			<th>课程名称</th>
		</tr>
	<?php foreach ($data as $value) { ?>
		<tr>
			<td><input type="checkbox" name="del[]" value="<?php echo $value["course_id"] ?>"></td>
			<td><?php echo $value["course_id"] ?></td>
			<td><?php echo $value["course_name"] ?></td>
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