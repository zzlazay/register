<?php

include_once("functions/fileSystem.php"); 
include_once("functions/database.php");



if(empty($_POST)){
	exit("您提交的表单数据超过post_max_size的配置!<br/>");
}
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
if($password != $confirmPassword){
	exit("输入的密码和确认密码不相等");
}
$userName = $_POST['userName'];


$userNameSQL = "select * from users where userName = '$userName'";
getConnection();
$resultSet = mysql_query($userNameSQL);   
if(mysql_num_rows($resultSet)>0){
	closeConnection();
	exit("用户名已被注册，请更换其他用户名");
}

$sex = $_POST['sex'];
if(empty($_POST['hobby'])){
	$hobby = "";
}else{
	$hobby = implode(";",$_POST['hobby']);
}
$remark = $_POST['remark'];
$myPictureName = $_FILES['myPicture']['name'];


$registerSQL = "insert into users values(null,'$userName','$password','$sex','$hobby','$myPictureName','$remark')";
$message = upload($_FILES['myPicture'],"uploads");
if($message=="文件上传成功!"||$message=="没有上传附件!"){
	
	mysql_query($registerSQL);
	$userID = mysql_insert_id();
	echo "用户信息成功注册<br/>";
}else{
	exit($message);
}


$userSQL = "select * from users where user_id=$userID";
$userResult = mysql_query($userSQL);
$user = mysql_fetch_array($userResult);


echo "您的用户名是".$user['userName'];
echo "您的密码是".$user['password'];
closeConnection();





?>