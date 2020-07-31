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
<style>
#con{
	font: 19px/24px Tahoma;
	color: green;
	letter-spacing: 0px;
}
.submit {
    background-color:green;
    border: none;
    color: white;
    padding: 10px 28px;
    text-align: center;
	border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
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
  <div>
  <table align=center>
  <tr>
  <td>
  <img src="train.jpg" width="700px" height="400px"/>
  </td>
  </tr>
  </table>
  </div>
  <div>
  <form name="res_done" action="res_done.php" method="POST">
  <table cellpadding="4" align="center">
  <tr>
  <td><input type="submit" name="home" value="home" class="submit"/></td>
  <td><input type="submit" name="logout" value="logout" class="submit"/></td>
  <td><input type="submit" name="check_tic" value="check tickets" class="submit"/></td>
  <td><input type="submit" name="cancel" value="cancel ticket" class="submit"/></td>
  <td><input type="submit" name="add" value="book train" class="submit"/></td>
  </tr>
  </table>
  <?php
  if(isset($_POST['home']))
  {
	  header('location:home.php');
  }
  if(isset($_POST['logout']))
  {
	  session_destroy();
	  header('location:login_page.php');
  }
  if(isset($_POST['check_tic']))
  {
	  header('location:res_user.php');
  }
  if(isset($_POST['cancel']))
  {
	  header('location:user_can.php');
  }
  
  if(isset($_POST['add']))
  {
	  header('location:res_1.php');
  }
  ?>
  </form>
  </div>
  <div id="footer1_"> &nbsp;</div>
  <div id="footer2_">
    <p>&nbsp;</p>
    <p>Designed by Amey Rao<br/>
      <br />
      </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div id="footer3_"> &nbsp;</div>
</div>
</body>
</html>
