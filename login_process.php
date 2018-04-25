<?php 
include_once("functions/database.php");
//收集表单提交数据
$userName = $_POST['userName'];
$password = $_POST['password'];
//连接数据库服务器
getConnection();
//判断用户名和密码是否正确
$sql = "select * from users where userName = '$userName' and password = '$password'";
$resultSet = mysql_query($sql);
if(mysql_num_rows($resultSet)>0)
{
	echo "用户和密码输入正确，登陆成功";
}else{
	echo "密码错误，告辞，老铁";
}
closeConnection();
?>