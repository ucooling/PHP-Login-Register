<?php
  if(isset($_POST["submit"]) && $_POST["submit"] == "登录"){
	  $user = $_POST["username"];
	  $psw = $_POST["password"];
	  if($user == "" || $psw == ""){
	  	echo "<script>alert('please enter username or password'); history.go(-1);</script>";
	  }else{
	  	  mysqli_connect("localhost", "root", "");
	      mysqli_select_db("vt");
		  mysqli_query("set name 'gdk'");
		  $sql = "select username, password from user where username = '$_POST[username]' and password = '$_POST[password]'";
		  $result = mysqli_query($sql);
		  $sum = mysql_num_rows($result);
		  if($sum){
		  	  $row = mysqli_fetch_array($result);
			  echo $rows[0];
		  }else {
		  	echo "<script> console.log('the username or password is not correct')</script>";
		  }
	  }
  }else {
	  echo "<script>console.log('successful'); history.go(-1);</script>";
  }
?>