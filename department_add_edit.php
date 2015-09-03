<?php
   require "include/inic.php";


// 接收从depar_list.php编辑功能的url参数
   $dear_id=isset($_GET['dear_id'])?(int)$_GET['dear_id']:0;
   echo $dear_id; 
   if($dear_id)
   {     
      // 查询
      $sqlEdit="SELECT * FROM `stu_department` WHERE department_id={$dear_id}";
      $res=mysql_query($sqlEdit);

      $dearData=array();
      if(mysql_num_rows($res)>0)
      {  
         $dearData=mysql_fetch_assoc($res);
      }
      var_dump($dearData);

   }


   if($_POST)
   {

/* 编辑功能*/
   $department_name = $_POST['name']; 

   //SQL修改语句
   $sqlupDate="UPDATE `stu_department` SET department_name={$department_name} WHERE department_id={$dear_id}";
   echo $sqlupDate;

   mysql_query($sqlupDate);
   // 记录是否修改过记录
   if(mysql_affected_rows()>0)
   {  
      success("修改成功","./department_list.php");
   }else{
      error("修改失败");
   }


      //关闭数据库
      mysql_close();
   }

?>

<h1>编辑院系</h1>
<form action="" method="post">
	<table>
      <tr>
         <th>院系编号</th>
         <th><?php echo $dearData['department_id'] ?></th>
      </tr>
		<tr>
			<th>院系名称</th>
			<th><input type="text" name="name" value="<?php echo $dearData['department_name'] ?>"></th>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="修改"></td>
		</tr>
	</table>
</form>