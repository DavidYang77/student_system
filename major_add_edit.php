<?php
   require "include/inic.php";

// 接收从depar_list.php编辑功能的url参数
   $major_id=isset($_GET['major_id'])?(int)$_GET['major_id']:0;
   echo $major_id; 
   if($major_id)
   {     
      // 查询
      $sqlEdit="SELECT * FROM `stu_major` WHERE major_id={$major_id}";
      $res=mysql_query($sqlEdit);

      $majorData=array();
      if(mysql_num_rows($res)>0)
      {  
         $majorData=mysql_fetch_assoc($res);
      }
      var_dump($majorData);

   }

   if($_POST){

/* 编辑功能*/
   $major_name = $_POST['major']; 

   //SQL修改语句
   $sqlupDate="UPDATE `stu_major` SET major_name={$major_name} WHERE major_id={$major_id}";
   echo $sqlupDate;

   mysql_query($sqlupDate);
   // 记录是否修改过记录
   if(mysql_affected_rows()>0)
   {  
      success("修改成功","./major_list.php");
   }else{
      error("修改失败");
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

<h1>编辑专业</h1>
<form action="" method="post">
	<table>
     <!--  <tr>
         <th>院系名称</th>
         <td>
            <select name="department" id="">
      <?php foreach ($data as $value){?>
               <?php echo '<option value="'.$value["department_id"].'">'.$value['department_name'].'</option>;'?>
      <?php } ?>
            </select>
         </td>
      </tr> -->
      <tr>
         <th>专业编号</th>
         <td><?php echo $majorData['major_id'] ?></td>
      </tr>
      <tr>
         <th>专业名称</th>
         <td><input type="text" name="major" value="<?php echo $majorData['major_name'] ?>"></td>
      </tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="添加"></td>
		</tr>
	</table>
</form>