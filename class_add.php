<?php
/**
 * 包含初始化文件
 */
   require "include/inic.php";
// error_reporting("0");
   if($_POST)
   {
   	//用户接收数据
   	$class_name = trim($_POST['class_name']);

      $major_id=trim($_POST["major"]);
   
      empty($class_name)?error("名称为空"):"";

      //编写SQL语句
      $sql = "INSERT INTO `stu_class`(`class_name`,`major_id`) VALUES ('{$class_name}','{$major_id}')";

      //执行SQL语句
      mysql_query( $sql );


// 反馈信息
      if(mysql_insert_id()>0)
      {
         success("插入成功","./class_list.php");
      }else{
         error("插入失败");
      }

      mysql_close($conn);
   }

// 查询班级
// 查询专业
       $sql="SELECT * FROM `stu_major`";
         $data=array();
         $res=mysql_query($sql);
         while($row=mysql_fetch_assoc($res))
         {
            $data[]=$row;
         }
?>
<h1>添加班级</h1>
<form action="" method="post">
	<table>
      <tr>
         <th>班级名称</th>
         <td><input type="text" name="class_name" id=""></td>
      </tr>
      <tr>
         <th>专业名称</th>
         <td>
            <select name="major" id="">
      <?php foreach ($data as $value){?>
               <?php echo '<option value="'.$value["major_id"].'">'.$value['major_name'].'</option>;'?>
      <?php } ?>
            </select>
         </td>
      </tr>
		<tr>
			<th>&nbsp;</th>
			<td><input type="submit" value="添加"></td>
		</tr>
	</table>
</form>