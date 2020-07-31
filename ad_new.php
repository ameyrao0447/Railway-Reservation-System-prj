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
<form name="add" action="ad_new.php" method="POST">
<table>
<tr>
<td>
<h3 id="con1">TRIAN INFO:</h3>
</td>
</tr>
<tr>
<td align="center" id="con">TRIAN NAME :<br></br></td>
<td><input type ="text" name="trn_nm" required/><br></br></td>
</tr>
<tr>
<td align="center" id="con">TRAIN NO :<br></br></td>
<td><input type ="text" name="trn_no" required/><br></br></td>
</tr>
<tr>
<td align="center" id="con">TO  :</td>
<td><select name="boarding" required>
  <option value="mum">mumbai</option>
  <option value="del">delhi</option>
  <option value="pun">pune</option>
  <option value="nas">nashik</option>
  <option value="hyd">hyderabad</option>
  <option value="bang">bengaluru</option>
  <option value="kal">Kolkata</option>
  <option value="sur">surat</option>
  <option value="jai">jaipur</option>
  <option value="luck">lucknow</option>
  <option value="ind">indore</option>
  <option value="pat">patna</option>
  <option value="ran">ranchi</option>
  <option value="chen">chennai</option>
  </select>
  </td>
</tr>
</tr>
<tr>
<td align="center" id="con">FROM :</td>
<td><select name="destination" required>
  <option value="mum">mumbai</option>
  <option value="del">delhi</option>
  <option value="pun">pune</option>
  <option value="nas">nashik</option>
  <option value="hyd">hyderabad</option>
  <option value="bang">bengaluru</option>
  <option value="kal">Kolkata</option>
  <option value="sur">surat</option>
  <option value="jai">jaipur</option>
  <option value="luck">lucknow</option>
  <option value="ind">indore</option>
  <option value="pat">patna</option>
  <option value="ran">ranchi</option>
  <option value="chen">chennai</option>
  </select>
  </td>
</tr>
<tr>
<td align="center" id="con">TIME :<br></br></td>
<td><input type ="time" name="time" required/>
<br></br>
</td>
</tr>
<tr>
<td>
<h3 id="con1">RATES:</h3>
</td>
</tr>
<tr>
<td align="center" id="con">AC1 RATE :<br></br></td>
<td><input type ="text" name="ac1_rate" required/><br></br></td>
</tr>
<tr>
<td align="center" id="con">AC2 RATES :<br></br></td>
<td><input type ="text" name="ac2_rate"required/><br></br></td>
</tr>
<tr>
<td align="center" id="con">AC3 RATES :<br></br></td>
<td><input type ="text" name="ac3_rate"required/><br></br></td>
</tr>
<tr>
<td align="center" id="con">GENERAL RATES :<br></br></td>
<td><input type ="text" name="g_rate" required /><br></br></td>
</tr>
<tr>
<td align="center" id="con">SLEEPER RATES :<br></br></td>
<td><input type ="text" name="sl_rate"required/><br></br></td>
</tr>
<tr>
<td><input type ="submit" name="submit1" class="submit"/></td>
<td><input type ="submit" name="submit2" value="back" class="submit" formnovalidate/></td>
</tr>
</TABLE>

<?php
if(isset($_POST['submit1']))
{
	$name=$_POST['trn_nm'];
	$password=$_POST['trn_no'];
	$email1=$_POST['boarding'];
	$email2=$_POST['destination'];
	$name1=$_POST['time'];
	$email3=$_POST['ac1_rate'];
	$email4=$_POST['ac2_rate'];
	$email5=$_POST['ac3_rate'];
	$email6=$_POST['g_rate'];
	$email7=$_POST['sl_rate'];
	require_once 'DB1.php';
	$query = "INSERT INTO TRAIN(TRAIN_NAME,TRAIN_NO,BOARD,DESTINATION,TIME,ACF,ACS,ACT,SL,GL) VALUES ('$name','$password','$email1','$email2','$name1','$email3','$email4',
				'$email5','$email6','$email7')";
	$res = $db->exec($query);
	header('Location:admin.php');
}
if(isset($_POST['submit2']))
{
	 echo '<script>window.location.href ="admin.php";</script>';
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
