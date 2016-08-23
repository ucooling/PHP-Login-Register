<?php
if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册")
{
	$user = $_POST["username"];
	$psw = $_POST["password"];
	$psw_confirm = $_POST["confirm"];
	if($user == "" || $psw == "" || $psw_confirm == "")
	{
		echo "<script>console.log('please enter username and password！'); history.go(-1);</script>";
	}
	else
	{
		if($psw == $psw_confirm)
		{
			mysqli_connect("localhost","root","");   //连接数据库
			mysqli_select_db("vt");  //选择数据库
			mysqli_query("set names 'gdk'"); //设定字符集
			$sql = "select username from user where username = '$_POST[username]'"; //SQL语句
			$result = mysqli_query($sql);    //执行SQL语句
			$num = mysql_num_rows($result); //统计执行结果影响的行数
			if($num)    //如果已经存在该用户
			{
				echo "<script>console.log('the username already exist'); history.go(-1);</script>";
			}
			else    //不存在当前注册用户名称
			{
				$sql_insert = "insert into user (username,password,phone,address) values('$_POST[username]','$_POST[password]','','')";
				$res_insert = mysqli_query($sql_insert);
				//$num_insert = mysql_num_rows($res_insert);
				if($res_insert)
				{
					echo "<script>console.log('register successful'); history.go(-1);</script>";
				}
				else
				{
					echo "<script>console.log('the system busy, please wait'); history.go(-1);</script>";
				}
			}
		}
		else
		{
			echo "<script>console.log('the password is not correct'); history.go(-1);</script>";
		}
	}
}
else
{
	echo "<script>console.log('register successful！'); history.go(-1);</script>";
}
?>