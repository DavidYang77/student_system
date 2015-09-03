<?php
   require "include/inic.php";   

   // 接收从student_list编辑功能的url参数
   $student_id=isset($_GET["student_id"])?(int)$_GET["student_id"]:0;
   echo $student_id; 
   if($student_id)
   {
      $stuEdit="SELECT * FROM `stu_student` WHERE student_id={$student_id}";
      $res=mysql_query($stuEdit);

      $stuData=array();
      if(mysql_num_rows($res)>0)
      {
         $stuData=mysql_fetch_assoc($res);
      }
      var_dump($stuData);
   }




   if($_POST)
   {

   	//接收用户提交数据
      $name = isset($_POST["name"])?trim($_POST['name']):""; 
      $number = trim($_POST['number']); 
      //$gender = isset($_POST['gender'])?trim($_POST['gender']):""; 
      $birth = strtotime($_POST['birth']); 
      $card = $_POST['card']; 
      $phone = $_POST['phone'];
      $year = strtotime($_POST['year']); 
   	$point = $_POST['point']; 

      $stuUpdate="UPDATE `stu_student` 
      SET student_name={$name},
      student_number={$number},
      student_birth={$birth},
      student_id_card={$card},
      student_phone={$phone},
      student_year={$year},
      student_point={$point} WHERE student_id={$student_id}
      ";

   // sql修改语句
      mysql_query($stuUpdate);
        if(mysql_affected_rows()>0)
         {  
            success("修改成功","./student_list.php");
         }else{
            error("修改失败");
         }
   }


?>
<h1>修改学生信息</h1>
<form action="" method="post">
	<table>
      <tr>
         <th>学员编号</th>
         <td><?php echo $stuData["student_id"]; ?></td>
      </tr>
      <tr>
         <th>学员名称</th>
         <td><input type="text" name="name" value="<?php echo $stuData["student_name"]; ?>"></td>
      </tr>
      <tr>
         <th>学员编号</th>
         <td><input type="text" name="number" value="<?php echo $stuData["student_number"]; ?>"></td>
      </tr>
     <!--  <tr>
         <th>学员性别</th>
         <td>
            男<input type="radio" name="gender" value="1" checked>
            女 <input type="radio" name="gender" value="0">
         </td>
      </tr> -->
      <tr>
         <th>出生年月</th>
         <td><input type="date" name="birth" value="<?php echo $stuData["student_birth"]; ?>"><span> * 你之前所选<?php echo date("Y-m-d",$stuData["student_birth"]); ?></span></td>
      </tr>
      <tr>
         <th>身份证</th>
         <td><input type="text" name="card" id="" value="<?php echo $stuData["student_id_card"]; ?>"></td>
      </tr>
      <tr>
         <th>手机号码</th>
         <td><input type="text" name="phone" id="" value="<?php echo $stuData["student_phone"]; ?>"></td>
      </tr>
      <tr>
         <th>入学年份</th>
         <td><input type="date" name="year" id="" value="<?php echo $stuData["student_year"]; ?>"><span> * 你之前所选<?php echo date("Y-m-d",$stuData["student_year"]); ?></span></td>
      </tr> 
     <tr>  
        <th>院系名称</th>
         <td>
            <a href="./department_list.php">修改院系</a>
         </td>
      </tr>
      <tr>
         <th>专业名称</th>
         <td>
             <a href="./major_list.php">修改院系</a>
         </td>
      </tr>
      <tr>
         <th>班级名称</th>
         <td>
              <a href="./class_list.php">修改院系</a>
         </td>
      </tr> 
      <tr>
         <th>入学分数</th>
         <td><input type="text" name="point" value="<?php echo $stuData["student_point"]; ?>"></td>
      </tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="修改"></td>
		</tr>
	</table>
</form>