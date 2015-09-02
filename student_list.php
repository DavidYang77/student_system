<?php
	require "include/inic.php";

if($_POST)
{
	// 多个删除
	$student_id=implode(",",$_POST["del"]);

	// sql语句删除
	$sql="DELETE FROM `stu_student` WHERE student_id IN({$student_id})";
	$res=mysql_query($sql);

	// 影响记录
	var_dump(mysql_affected_rows());
	if(mysql_affected_rows()>0)
	{
		success("删除成功","./student_list.php");
	}else{
		error("删除失败");
	}
	
}

// 编写sql语句 （查询）
	 $sql="SELECT * FROM `stu_student` 
	 LEFT JOIN `stu_class` ON stu_student.student_class_id=stu_class.class_id 
	 LEFT JOIN `stu_major` ON stu_student.student_major_id=stu_major.major_id 
	 LEFT JOIN `stu_department` ON stu_student.student_department_id=stu_department.department_id";


// 执行sql语句
	$res=mysql_query($sql);

	// 存起来(空数组)
	$data=array();
	if(mysql_num_rows($res)>0)
	{
		while($row=mysql_fetch_assoc($res))
		{
			$data[]=$row;
		}
	}
?>
<h1>学生页面<a href="./student_add.php">添加页面</a></h1>

<form action="" method="post">
<table width="100%" border="1" cellspacing="0">
	<tr>
		<th><input type="checkbox" id="check_all">全选 -- <input type="submit" value="删除"> -- <input type="checkbox" id="check_fan">反选</th>
		<th>编号</th>
		<th>学生名称</th>
		<th>性别</th>
		<th>出生日期</th>
		<th>身份证</th>
		<th>手机号码</th>
		<th>入学年份</th>
		<th>专业名称</th>
		<th>院系名称</th>
		<th>班级名称</th>
		<th>分数</th>
	</tr>
<?php foreach ($data as $value) { ?>
	<tr>
		<td><input type="checkbox" name="del[]" value="<?php echo $value['student_id'] ?>"></td>
		<td><?php echo $value["student_id"] ?></td>
		<td><?php echo $value["student_name"] ?></td>
		<td><?php echo $value["student_gender"] ?></td>
		<td><?php echo $value["student_birth"] ?></td>
		<td><?php echo $value["student_id_card"] ?></td>
		<td><?php echo $value["student_phone"] ?></td>
		<td><?php echo $value["student_year"] ?></td>
		<td><?php echo $value["major_name"] ?></td>
		<td><?php echo $value["department_name"] ?></td>
		<td><?php echo $value["class_name"] ?></td>
		<td><?php echo $value["student_point"] ?></td>
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