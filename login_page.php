<?php
session_start();
?>
<html>
<head>
<title>Train</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
#con{
	font: 19px/24px Tahoma;
	color:green;
	letter-spacing: 0px;
}
.submit {
    background-color:green;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
	border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    transition-duration: 0.4s;
}
.submit:hover {
    background-color: #4CAF50;
    color: white;
}
input[type=text], select {
    width: 100%;
    padding: 4px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	color:green;
}
input[type=password], select {
    width: 100%;
    padding: 4px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	color:green;
}
</style>
</head>
<body>
<div id="Container">
  <div id="header_"> &nbsp;
    <ul class="navi">
      <li><a href="home.php">Home Page</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
      <li><a href="login_page.php">Reservation</a></li>
    </ul>
  </div>
  <div id="right_">
    <h2><font color="green">login page</h2>
	<form name="login" action="login_page.php" method="POST">
<table cellpadding="7">
<tr>
<td id="con">username :</td>
<td><input type ="text" name="username" required/></td>
</tr>
<tr>
<td id="con">password :</td>
<td><input type ="password" name="password" required/></td>
</tr>
<tr>
<td><input type ="submit" name="submit1" value="login" class="submit"/></td>
<td><input type ="reset" name="reset" class="submit"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href ="signup.php"/>SIGNUP</a></td>
</tr>
<?php
if(isset($_POST['submit1']))
{
	$pname=$_POST['username'];
	$pass=$_POST['password'];
	require_once'DB1.php';
     $query = "select * from user where username ='$pname' and pass='$pass'";
		$c = $db->query($query);
		$result = $c->fetch();
		if($result['username']==$pname && $result['pass']==$pass)
		{
			if($pname=="admin")
			{
				$_SESSION['username']=$result['username'];
				header('Location:admin.php');
			}
			else
			{
			$_SESSION['username']=$result['username'];
			require_once'DB1.php';
			$query1 = "select count(*) from registration where username='$pname'";
			$res1 = $db->query($query1);
			$result1 = $res1->fetch();
			$num = $result1['count(*)'];
			if($num>0)
			{
				header('Location:res_done.php');
			}
			else
			{
			header('Location:res_1.php');
			}
			}
		}
		else
		{
			print"not valid";
		}
}
if(isset($_POST['signup']))
{
	header('Location:signup.php');
}
?>
</table>
<br></br>
<br></br>
<br></br>
<br></br>
</form>
  </div>
  <div id="footer1_"> &nbsp;</div>
  <div id="footer2_">
    <p>&nbsp;</p>
    <p>Designed by Amey Rao<br />
      <br />
      </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div id="footer3_"> &nbsp;</div>
</div>
</body>
</html>
