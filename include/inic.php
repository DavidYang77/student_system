<?php
/**
 * 初始化文件
 * 
 */

	   //设置页面编码
	   header('Content-Type:text/html;charset=utf-8');

       //连接数据库
      $conn=@mysql_connect('localhost','root','') or die('连接数据库失败');

      //选择数据库
      mysql_select_db('student_system') or die('数据库不存在');

      //设置通用编码
      mysql_query('set names utf8');

      // 包含库文件
      require "functions.php";

?>