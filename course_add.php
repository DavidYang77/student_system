<?php
  require "include/inic.php";
   if($_POST)
   {
   	//接收用户提交数据
   	$course_name = $_POST['name']; 
      empty($course_name)?error("名称为空"):"";

      //编写SQL语句
      $sql = "INSERT INTO `stu_course` (course_name) VALUES ('{$course_name}')";

      //执行SQL语句
      mysql_query($sql);
// 反馈信息
      if(mysql_insert_id()>0)
      {
         success("插入成功","./course_list.php");
      }else{
         error("插入失败");
      }


      mysql_close($conn);
   }

?>

<h1>添加课程</h1>
<form action="" method="post">
   <table>
      <tr>
         <th>课程名称</th>
         <th><input type="text" name="name"></th>
      </tr>
      <tr>
         <td>&nbsp;</td>
         <td><input type="submit" value="添加"></td>
      </tr>
   </table>
</form>