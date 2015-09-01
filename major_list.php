<?php
	require "include/inic.php";

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

<table width="100%" border="1" cellspacing="0">
	<tr>
		<th>编号</th>
		<th>专业名称</th>
		<th>院系名称</th>
	</tr>
<?php foreach ($data as $value) { ?>
	<tr>
		<td><?php echo $value["major_id"] ?></td>
		<td><?php echo $value["major_name"] ?></td>
		<td><?php echo $value["department_name"]?></td>
	</tr>
<?php } ?>
</table>