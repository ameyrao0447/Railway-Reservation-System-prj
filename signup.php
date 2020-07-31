<html>
<head>
<title>Travelling Train</title>
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
#done
{
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
    <h2><font color="green">SIGNUP PAGE</h2>
   <form name="login" action="signup.php" method="POST">
<table cellpadding="7">
<tr>
<td id="con">username :</td>
<td><input type ="text" name="username" required/></td>
</tr>
<tr>
<td id="con">password :</td>
<td><input type ="password" name="password" id="done" required/></td>
</tr>
<tr>
<td id="con">confirm password :</td>
<td><input type ="password" name="con_password" id="done" required/>
</td>
<td></td>
</tr>
<tr>
<td id="con">email :</td>
<td><input type ="email" name="email" required id="done"/></td>
</tr>
<tr>
<td><input type ="submit" name="submit1" value="login"  class="submit"/></td>
<td><input type ="reset" name="reset"  class="submit"/></td>
</tr>
<?php
if(isset($_POST['submit1']))
{
	$name=$_POST['username'];
	$pass=$_POST['password'];
	$con=$_POST['con_password'];
	if($con==$pass)
	{
	$email=$_POST['email'];
	require_once 'DB1.php';
	$query = "INSERT INTO USER(USERNAME,PASS,EMAIL) VALUES ('$name','$pass','$email')";
	$res = $db->exec($query);
	header('Location:login_page.php');
	}
	else
	{?>
<td color="red">
<?php 
echo'<font color="red">PASSWORD NOT MATCH';
?>
</td></tr>
		<?php
	}
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
