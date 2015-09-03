<?php
   require "include/inic.php";   

   if($_POST)
   {
   	//接收用户提交数据
      $name = isset($_POST["name"])?trim($_POST['name']):""; 
      $number = trim($_POST['number']); 
      $gender = isset($_POST['gender'])?trim($_POST['gender']):""; 
      $birth = strtotime($_POST['birth']); 
      $card = $_POST['card']; 
      $phone = $_POST['phone'];
      $year = strtotime($_POST['year']); 
      $school = $_POST['school']; 

      $major = $_POST['major']; 
      $department_id = isset($_POST['department_id'])?trim($_POST["department_id"]):""; 

      $class_id = $_POST['class_id']; 
   	$point = $_POST['point']; 

// 验证
      empty($name)?error("名称为空"):"";
      empty($number)?error("号码为空"):"";
      empty($gender)?error("性别为空"):"";
      empty($birth)?error("出生日期为空"):"";
      empty($card)?error("身份证为空"):"";
      empty($phone)?error("手机号码为空"):"";
      empty($year)?error("入学年份为空"):"";
       $major=="0"?error("请选择专业"):""; 
       $class_id=="0"?error("请选择专业"):""; 
      empty($point)?error("分数为空"):"";


       // 编写sql语句
      $sql = "INSERT INTO `stu_student`(`student_name`,`student_number`,`student_gender`,`student_birth`,`student_id_card`,`student_phone`,`student_year`,`student_major_id`,`student_department_id`,`student_class_id`,`student_point`
         ) VALUES ('{$name}','{$number}','{$gender}','{$birth}','{$card}','{$phone}','{$year}','{$major}','{$department_id}','{$class_id}','{$point}'
         )";
      //执行SQL语句
      mysql_query($sql);

// 反馈信息
      if(mysql_insert_id()>0)
      {
         success("插入成功","./student_list.php");
      }else{
         error("插入失败");
      }
   }

// 查询班级表
   $sql="SELECT * FROM `stu_class`";
   $res=mysql_query($sql);
   
   $class_data=array();
   while($row=mysql_fetch_assoc($res))
   {
      $class_data[]=$row;
   }

// 查询专业表
   $sql="SELECT * FROM `stu_major`";
   $res=mysql_query($sql);
   
   $major_data=array();
   while($row=mysql_fetch_assoc($res))
   {
      $major_data[]=$row;
   }
   // var_dump($data);

// 查询院系表
   $sql="SELECT * FROM `stu_department`";
   $res=mysql_query($sql);
   
   $deart_data=array();
   while($row=mysql_fetch_assoc($res))
   {
      $deart_data[]=$row;
   }

?>
<h1>添加学生信息</h1>

<form action="" method="post">
	<table>
      <tr>
         <th>学员名称</th>
         <td><input type="text" name="name" id=""></td>
      </tr>
      <tr>
         <th>学员编号</th>
         <td><input type="text" name="number" id=""></td>
      </tr>
      <tr>
         <th>学员性别</th>
         <td>
            男<input type="radio" name="gender" value="1" checked>
            女 <input type="radio" name="gender" value="0">
         </td>
      </tr>
      <tr>
         <th>出生年月</th>
         <td><input type="date" name="birth" id=""></td>
      </tr>
      <tr>
         <th>身份证</th>
         <td><input type="text" name="card" id=""></td>
      </tr>
      <tr>
         <th>手机号码</th>
         <td><input type="text" name="phone" id=""></td>
      </tr>
      <tr>
         <th>入学年份</th>
         <td><input type="date" name="year" id=""></td>
      </tr> 
     <tr>  
        <th>院系名称</th>
         <td>
            <select name="department_id">
               <option value="0">请选择院系</option>
      <?php foreach ($deart_data as $value) {?>
               <?php echo '<option value="'.$value["department_id"].'">'.$value["department_name"].'</option>'; ?>
      <?php } ?>
            </select>
         </td>
      </tr>
      <tr>
         <th>专业名称</th>
         <td>
            <select name="major" id="">
               <option value="0">请选择专业</option>
      <?php foreach ($major_data as $value) {?>
               <?php echo '<option value="'.$value["major_id"].'">'.$value["major_name"].'</option>'; ?>
      <?php } ?>
            </select>
         </td>
      </tr>
      <tr>
         <th>班级名称</th>
         <td><select name="class_id" id   ="">
               <option value="0">请选择班级</option>
      <?php foreach ($class_data as $value) {?>
               <?php echo '<option value="'.$value["class_id"].'">'.$value["class_name"].'</option>'; ?>
      <?php } ?>
            </select></td>
      </tr> 
      <tr>
         <th>入学分数</th>
         <td><input type="text" name="point" id=""></td>
      </tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="添加"></td>
		</tr>
	</table>
</form>