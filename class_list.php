<?php
	require "include/inic.php";



/* 单个删除
	// 接受参数
		$classId=isset($_GET["class_id"])?(int)$_GET["class_id"]:0;
		echo $classId;
	// 判断是否被设置
		if($classId)
		{
			$sql="DELETE FROM `stu_class` WHERE class_id={$classId}";
			mysql_query($sql);
				
			// 判断是否影响了记录
			if(mysql_affected_rows()>0)
			{
				success("删除成功");
			}else{
				error("删除失败");
			}
		}
*/

// 多个删除
	if($_POST)
	{
		// array(1,2,3);切割变左边这样
		$class_id=implode(",",$_POST["del"]);
		echo $class_id;

		$sql="DELETE FROM `stu_class` WHERE class_id IN({$class_id})";
		mysql_query($sql);
		// 判断是否影响了记录
			if(mysql_affected_rows()>0)
			{
				success("删除成功","./class_list.php");
			}else{
				error("删除失败");
			}
	}



// 编写sql语句 （查询）
	$sql="SELECT * FROM `stu_class` ORDER BY class_id DESC";
	$sql="SELECT * FROM `stu_class` LEFT JOIN `stu_major` ON stu_class.major_id=stu_major.major_id LEFT JOIN `stu_department` ON stu_major.major_id=stu_department.department_id";
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


?>
<h1>班级页面<a href="./class_add.php">添加页面</a></h1>
	<form action="" method="post">
	<table width="100%" border="1" cellspacing="0">
		<tr>
			<th><input type="checkbox" id="check_all">全选 ---<input type="submit" value="删除"> ---<input type="checkbox" id="check_fan">反选</th>
			<th>编号</th>
			<th>班级名称</th>
			<th>专业名称</th>
			<th>院系名称</th>
			<th>操作</th>
		</tr>
	<?php foreach ($data as $value) { ?>
		<tr>
			<td><input type="checkbox" name="del[]" id="" value="<?php echo $value['class_id'] ?>"></td>
			<td><?php echo $value["class_id"]?></td>
			<td><?php echo $value["class_name"] ?></td>
			<td><?php echo $value["major_name"] ?></td>
			<td>
			<?php
			if($value["department_name"]==null)
			{
				echo "其他系";
			}else{
			 echo $value["department_name"];			
			}

			 ?></td>
			 <td><a href="class_add_edit.php?class_id=<?php echo $value['class_id'] ?>">编辑</a></td>
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