<?php
	require "include/inic.php";


if($_POST)
{

	// 多个删除
	$major_id=implode(",",$_POST["del"]);

	// sql语句删除
	$sql="DELETE FROM `stu_major` WHERE major_id IN({$major_id})";
	$res=mysql_query($sql);

	// 影响记录
	var_dump(mysql_affected_rows());
	if(mysql_affected_rows()>0)
	{
		success("删除成功","./major_list.php");
	}else{
		error("删除失败");
	}
	
}



// 编写sql语句 （查询）
	// $sql="SELECT * FROM `stu_major` ORDER BY major_id DESC";
	$sql="SELECT * FROM `stu_major` as a LEFT JOIN stu_department as b ON a.department_id=b.department_id ORDER BY a.major_id DESC";

// 执行sql语句 '  '
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
<h1>专业页面<a href="./major_add.php">添加页面</a></h1>

<form action="" method="post">
	<table width="100%" border="1" cellspacing="0">
		<tr>
			<th><input type="checkbox" id="check_all"> 全选 -- <input type="submit" value="删除"> <input type="checkbox" name="" id="check_fan"> -- 反选 </th>
			<th>编号</th>
			<th>专业名称</th>
			<th>院系名称</th>
		</tr>
	<?php foreach ($data as $value) { ?>
		<tr>
			<td><input type="checkbox" name="del[]" value="<?php echo $value['major_id']; ?>"></td>
			<td><?php echo $value["major_id"] ?></td>
			<td><?php echo $value["major_name"] ?></td>
			<td><?php echo $value["department_name"]?></td>
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