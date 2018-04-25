<?php
header("Content-type:text/html;charset=utf-8");
$databaseConnection = null; //全局变量
function getConnection(){		//连接函数
	$hostname = "localhost";	//数据库服务器主机名
	$database = "register";		//数据库名
	$userName = "root";		//数据库服务器用户名
	$password = "";			//密码
	global $databaseConnection;
	$databaseConnection = @mysql_connect($hostname, $userName, $password) or die(mysql_error()); //连接数据库服务器
	mysql_query("set names 'gbk'");		//设置字符集
	@mysql_select_db($database, $databaseConnection) or die(mysql_error());
}
function closeConnection(){		//关闭函数
	global $databaseConnection;
	if($databaseConnection){
		mysql_close($databaseConnection) or die(mysql_error());
	}
}
/*die() 函数输出一条消息，并退出当前脚本
  1    mysql_error() 函数返回上一个 MySQL 操作产生的文本错误信息。

  2 本函数返回上一个 MySQL 函数的错误文本，如果没有出错则返回 ''（空字符串）global 关键词用于访问函数内的全局变量。

  3 要做到这一点，请在（函数内部）变量前面使用 global 关键词：
*/


?>