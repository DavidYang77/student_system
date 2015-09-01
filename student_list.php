<?php
	require "include/inic.php";

// 编写sql语句 （查询）
	 $sql="SELECT * FROM `stu_student` LEFT JOIN `stu_class` ON stu_student.student_class_id=stu_class.class_id LEFT JOIN `stu_major` ON stu_student.student_major_id=stu_major.major_id LEFT JOIN `stu_department` ON stu_major.major_id=stu_department.department_id";


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

	var_dump($data);

?>
<h1>学生页面<a href="./student_add.php">添加页面</a></h1>

<table width="100%" border="1" cellspacing="0">
	<tr>
		<th>编号</th>
		<th>学生名称</th>
		<th>性别</th>
		<th>出生日期</th>
		<th>身份证</th>
		<th>手机号码</th>
		<th>入学年份</th>
		<th>专业名称</th>
		<th>院系名称</th>
		<th>课程名称</th>
		<th>班级名称</th>
		<th>分数</th>
	</tr>
<?php foreach ($data as $value) { ?>
	<tr>
		<td><?php echo $value["student_id"] ?></td>
		<td><?php echo $value["student_name"] ?></td>
		<td><?php echo $value["student_gender"] ?></td>
		<td><?php echo $value["student_birth"] ?></td>
		<td><?php echo $value["student_id_card"] ?></td>
		<td><?php echo $value["student_phone"] ?></td>
		<td><?php echo $value["student_year"] ?></td>
		<td><?php echo $value["major_name"] ?></td>
		<td><?php ?></td>
		<td><?php echo $value["department_name"] ?></td>
		<td><?php echo $value["class_name"] ?></td>
		<td><?php echo $value["student_point"] ?></td>
	</tr>
<?php } ?>
</table>