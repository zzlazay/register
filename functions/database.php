<?php
header("Content-type:text/html;charset=utf-8");
$databaseConnection = null; //ȫ�ֱ���
function getConnection(){		//���Ӻ���
	$hostname = "localhost";	//���ݿ������������
	$database = "register";		//���ݿ���
	$userName = "root";		//���ݿ�������û���
	$password = "";			//����
	global $databaseConnection;
	$databaseConnection = @mysql_connect($hostname, $userName, $password) or die(mysql_error()); //�������ݿ������
	mysql_query("set names 'gbk'");		//�����ַ���
	@mysql_select_db($database, $databaseConnection) or die(mysql_error());
}
function closeConnection(){		//�رպ���
	global $databaseConnection;
	if($databaseConnection){
		mysql_close($databaseConnection) or die(mysql_error());
	}
}
/*die() �������һ����Ϣ�����˳���ǰ�ű�
  1    mysql_error() ����������һ�� MySQL �����������ı�������Ϣ��

  2 ������������һ�� MySQL �����Ĵ����ı������û�г����򷵻� ''�����ַ�����global �ؼ������ڷ��ʺ����ڵ�ȫ�ֱ�����

  3 Ҫ������һ�㣬���ڣ������ڲ�������ǰ��ʹ�� global �ؼ��ʣ�
*/


?>