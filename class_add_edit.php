<?php
/**
 * 包含初始化文件
 */
   require "include/inic.php";


   // 编辑功能
      $class_id=isset($_GET["class_id"])?(int)$_GET["class_id"]:0;
      if($class_id)
      {
      // 查询从class_list的ID
         $sqledit="SELECT * FROM `stu_class` WHERE class_id={$class_id}";
         $res=mysql_query($sqledit);
         // var_dump(mysql_fetch_assoc($res));

         $classIdData=array();
         if(mysql_num_rows($res)>0)
         {
            $classIdData=mysql_fetch_assoc($res);
         }
         var_dump($classIdData);
      }


// error_reporting("0");
   if($_POST)
   {

// 更新数据
      $class_name = isset($_POST['class_name'])?trim($_POST['class_name']):"";

      // sql修改语句
      $sqlupdate="UPDATE `stu_class` SET class_name={$class_name} WHERE class_id={$class_id}";

      $res=mysql_query($sqlupdate);
      var_dump($res);
      if(mysql_affected_rows()>0)
      {
         success("修改成功","./class_list.php");
      }else{
         error("修改失败");
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
<h1>修改班级</h1>
<form action="" method="post">
	<table>
      <tr>
         <th>班级编号</th>
         <td><?php echo $classIdData['class_id'] ?></td>
      </tr>
      <tr>
         <th>班级名称</th>
         <td><input type="text" name="class_name" value="<?php echo $classIdData['class_name'] ?>"></td>
      </tr>
    <!--   <tr>
         <th>专业名称</th>
         <td>
            <select name="major" id="">
      <?php foreach ($data as $value){?>
               <?php echo '<option value="'.$value["major_id"].'">'.$value['major_name'].'</option>;'?>
      <?php } ?>
            </select>
         </td>
      </tr> -->
		<tr>
			<th>&nbsp;</th>
			<td><input type="submit" value="修改"></td>
		</tr>
	</table>
</form>