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
	color: green;
	letter-spacing: 0px;
}
#con1{
	color: green;
	letter-spacing: 0px;
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
.text1
{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	padding: 4px;
    color:green;
	border:none;
	border-radius:2px;
	font-size:13px;
	background-color:white;
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
  <div id="right_">
<form name="can" action="cancel.php" method="POST">
<table>
<tr>
<td>
<h3 id="con1">Remove train:</h3>
</td>
</tr>
<tr>
<td id="con">train no :<br></br></td>
<td><input type ="text" name="trn_no"required/><br></br></td>
</tr>
<tr>
<td>
<input type ="submit" name="submit1" class="submit"/>
<input type ="reset" class="submit"/>
</td>
</tr>
<tr>
<td><input type ="submit" name="submit2" value="back" class="submit" formnovalidate/></td>
</tr>
</table>
<br></br>
<br></br>
<br></br>
<br></br>
</form>
<?php
if(isset($_POST['submit1']))
{
	$trn_no=$_POST['trn_no'];
	require_once 'DB1.php';
	$query1 = "select count(*) from train where train_no ='$trn_no'";
			$res1 = $db->query($query1);
			$result1 = $res1->fetch();
			$num = $result1['count(*)'];
			if($num>0)
			{
require_once 'DB1.php';

	$query = "delete from train where train_no ='$trn_no'";
	$res = $db->exec($query);
			}
			else
			{
				print'<table><tr><td><font color="red">ENTER VALID TRAIN NO.</td></tr></table>';
			}
	}
if(isset($_POST['submit2']))
{
	header('location:admin.php');
}
?>
</div>
  <div id="footer1_">&nbsp;</div>
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

