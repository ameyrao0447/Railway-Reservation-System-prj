<?php 
session_start();
if(!isset($_SESSION['username']))
{
 header('Location:login_page.php');	
}
ERROR_REPORTING(E_ALL^E_NOTICE);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
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
</style> 
<style>
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
  <div align="center">
    <form name="reservation" action="reservation.php" method="POST">
<table cellpadding="7">
<tr>
<td id="con">NAME :</td>
<td><input type="text" name="name" required class="text"/></td>
</tr>
<tr>
<td id="con">MIDDLENAME :</td>
<td><input type="text" name="middle_name" required class="text"/></td>
</tr>
<tr>
<tr>
<td id="con">LASTNAME :</td>
<td><input type="text" name="last_name" required class="text"/></td>
</tr>
<tr>
<td id="con"> AGE:</td>
<td><input type="text" name="age" required class="text" maxlength="3"/></td>
</tr>
</tr>
<tr>
<td id="con"> GENDER:</td>
<td><input type="radio" name="fn" value="male" required/>MALE<input type ="radio" name="fn" value="female" required/>FEMALE</td>
</tr>
<tr>
<td id="con">OCCUPATION :</td>
<td><input type="text" name="occ" required class="text"/></td>
</tr id="con">
</tr>
<tr>
<td id="con">TRAIN NAME :</td>
<td><?php
ERROR_REPORTING(E_ALL^E_NOTICE);
session_start();
$trian1=$_SESSION['trainn'];
$train1=str_replace("'","",$trian1);
echo'<input type="text" name="train_n" value="'.$train1.'" readonly required class="text"/>'?></td>
</tr>
</tr>
<tr>
<td id="con">TRAIN NUMBER :</td>
<td><?php
$trian=$_SESSION['traino'];
$train=str_replace("'","",$trian);
echo'<input type="text" name="train_no" value="'.$train.'" readonly required class="text"/>'?></td>
</tr>
</tr>
<tr>
<td id="con">QUOTA :</td>
<td><input type="text" name="quota" required class="text"/></td>
</tr>
</tr>
<tr>
<td id="con">TIME :</td>
<td><input type="time" name="time" required class="text"/></td>
</tr>
</tr>
<tr>
<td id="con">CLASS:</td>
<td>
<select name="class">
  <option value="acf">AC FIRST CLASS</option>
  <option value="acs">AC SECOND CLASS</option>
  <option value="ast">AC T CLASS</option>
  <option value="gl">GENERAL</option>
  <option value="sl">SLEEPER</option>
  </select>
</td>
</tr>
</tr>
<tr>
<td id="con">MOBILE NO :</td>
<td><input type ="text" name="mob_no" maxlength="10" required class="text"/></td>
</tr>
<tr>
<td id="con">TELEPHONE NO :</td>
<td><input type ="text" name="tel_no" maxlength="10" required class="text"/></td>
</tr>
<tr>
<td id="con">ADDRESS LINE 1 :</td>
<td><input type ="text" name="add_l1" required class="text"/></td>
</tr>
<tr>
<td id="con">ADDRESS LINE 2 :</td>
<td><input type ="text" name="add_l2" required class="text"/></td>
</tr>
<tr>
<td id="con">ADDRESS LINE 3 :</td>
<td><input type ="text" name="add_l3" required class="text"/></td>
</tr>
<tr>
<td id="con">SEATS :</td>
<td><input type ="text" name="seats" required class="text" maxlength="2"/></td>
</tr>
<tr>
<td>
<input type ="submit" name="submit1" class="submit"/>
</td>
</tr>
</table>
<?php
if(isset($_POST['submit1']))
{ 
	$name=$_POST['name'];
	$m_name=$_POST['middle_name'];
	$last_name=$_POST['last_name'];
	$age=$_POST['age'];
	$occ=$_POST['occ'];
	$train_n=$_POST['train_n'];
	$t_no=$_POST['train_no'];
	$quota=$_POST['quota'];
	$time=$_POST['time'];
	$class=$_POST['class'];
	$m_no=$_POST['mob_no'];
	$t_no=$_POST['tel_no'];
	$ad_l=$_POST['add_l1'];
	$ad_l_l=$_POST['add_l2'];
	$ad_l_l_l=$_POST['add_l3'];
	$gen=$_POST['fn'];
	$class=$_POST['class'];
	$seats=$_POST['seats'];
	if(preg_match('/^\d{10}+$/',$_POST['mob_no'])) {
		if(preg_match('/^\d{10}+$/',$_POST['tel_no'])) {
	if(preg_match('/^\d+$/',$_POST['age'])) {
		if(preg_match('/^\d+$/',$_POST['seats']))
		{
	$date=$_SESSION["date"];
	$date=str_replace("'","",$date);
	$to=$_SESSION["to"];
	$to=str_replace("'","",$to);
	$from=$_SESSION["from"];
	$from=str_replace("'","",$from);
	$train_no=$_SESSION['traino'];
	$train_no=str_replace("'","",$train_no);
	$trian_name=$_SESSION['trainn'];
	$trian_name=str_replace("'","",$trian_name);
	$acf=$_SESSION['ratea'];
	$acf=str_replace("'","",$acf);
	$acs=$_SESSION['rateb'];
	$acs=str_replace("'","",$acs);
	$act=$_SESSION['ratec'];
	$act=str_replace("'","",$act);
	$sl=$_SESSION['rated'];
	$sl=str_replace("'","",$sl);
	$gl=$_SESSION['ratee'];
	$gl=str_replace("'","",$gl);
	$username1=$_SESSION['username'];
	$username1=str_replace("'","",$username1);
	$class1=0;
	switch($class)
	{
		case 'acf':
		$class1=$acf;
		break ;
		case 'acs':
		$class1=$acs;
		break ;
		case 'act':
		$class1=$act;
		break ;
		case 'sl':
		$class1=$sl;
		break ;
		case 'gl':
		$class1=$gl;
		break ;
		default :
		$class1=00;
	}
	print"$class1";
	print"$class";
	print"$username1";
	$cane="not";
	require_once 'DB1.php';
	$query = "INSERT INTO registration (name, middle,last,gender,age,occupation,train_name_r,train_no_r,quota,
	date,time,class,board,destination,addres_l,addres_l_l,addres_l_l_l,username,rates,cancel,seats)
	VALUES ('$name','$m_name','$last_name','$gen','$age',
	'$occ','$trian_name','$train_no','$quota','$date','$time',
	'$class','$to','$from',
	'$ad_l','$ad_l_l','$ad_l_l_l','$username1','$class1','$cane','$seats')";	
	$res = $db->exec($query);
    header('Location:res_done.php');
	}
	else
	{
		ECHO'<font color="red">NOT VALID SEAT ';
	}
	}
	else
	{
		ECHO'<font color="red">NOT VALID AGE ';
	}
		}
	else
	{
		ECHO'<font color="red">NOT VALID TELEPHONE NO.';
	}
	}
	else
	{
		ECHO'<font color="red">NOT VALID MOBILE NO.';
	}
}

?>
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
</form>
</body>
</html>
