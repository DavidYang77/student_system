<?php
   require "include/inic.php";

   if($_POST){
   	//接收用户提交数据
      $major = $_POST['major'];
   	$department = $_POST['department']; 
   
      //编写SQL语句
      $sql = "INSERT INTO `stu_major` (major_name,department_id) VALUES ('{$major}','{$department}')";

      //执行SQL语句
      mysql_query($sql);

// 反馈信息
      if(mysql_insert_id()>0)
      {
         success("插入成功","./major_list.php");
      }else{
         error("插入失败");
      }
      //关闭数据库
      mysql_close();
   }

   // 查询院系记录
   $sql="SELECT * FROM `stu_department`";
   $res=mysql_query($sql);
   $data=array();
   while($row=mysql_fetch_assoc($res))
   {
      $data[]=$row;
   }

   // var_dump($data);

?>

<h1>添加专业</h1>
<form action="" method="post">
	<table>
      <tr>
         <th>院系名称</th>
         <td>
            <select name="department" id="">
      <?php foreach ($data as $value){?>
               <?php echo '<option value="'.$value["department_id"].'">'.$value['department_name'].'</option>;'?>
      <?php } ?>
            </select>
         </td>
      </tr>
      <tr>
         <th>专业名称</th>
         <td><input type="text" name="major" id=""></td>
      </tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="添加"></td>
		</tr>
	</table>
</form>