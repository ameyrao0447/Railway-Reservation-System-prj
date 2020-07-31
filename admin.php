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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
#con{
	font: 19px/24px Tahoma;
	color:green;
	letter-spacing: 0px;
	underline:1px;
}
.submit {
    background-color:green;
    border: none;
    color: white;
    padding: 10px 25px;
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
  <form name="admin" action="admin.php" method="POST">
<img src="trainn.jpg" width="700px" height="400px" align="center"/>
	&nbsp;<table border=0>
		<tr><td id="con"><a href="ad_new.php" id="con"><h2 id="con">add new trains</h2></a></td></tr> 
		<tr><td id="con"><a href="cancel.php" id="con"><h2 id="con">cancel trains</h2></a></td></tr>
		<tr><td id="con"><a href="cancel_ticket.php" id="con"><h2 id="con">cancel passengers ticket request</h2></a></td></tr>
		<tr><td id="con"><a href="pass.php" id="con"><h2 id="con">view passenger list</h2></a></td></tr>
		<td><input type="submit" name="logout" value="logout" class="submit"/></td>
		</table>
		<?php
		if(isset($_POST['logout']))
		{
		session_destroy();
		header('location:login_page.php');
		}
		?>
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