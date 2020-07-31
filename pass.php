<?php 
session_start();
if(!isset($_SESSION['username']))
{
 header('Location:login_page.php');	
}
ERROR_REPORTING(E_ALL^E_NOTICE);
?>
<html>
<head>
<title>Travelling Train</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style_table.css" type="text/css" />
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
  <div align="center">
  <form name=" " action="pass.php" method="POST">
  <table>
  <tr>
  <td>
  <br></br>
  </td>
  </tr>
  <tr>
  <td>
  <img src="adminr.jpg" width="700px" height="400px" align="center"/>
  </td>
  </tr>
  </table>
  <table align="center">
  <tr>
  <td><input type="submit" name="user" value="User details" class="submit"/></td>
  <td><input type="submit" name="train" value="Train details" class="submit"/></td>
  <td><input type="submit" name="back" value="Back" class="submit"/></td>
  </tr>
  </table>
 <?php if(isset($_POST['user']))
		{
			header('location:pass_user.php');
		}
		if(isset($_POST['train']))
		{
			header('location:train_pass.php');
		}
		if(isset($_POST['back']))
		{ 		
			header('location:admin.php');
		}
	?>
	
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