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
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
	width:575px;
}

#customers td, #customers th {
    border: 1px solid #ddd;
	padding:6px;
  
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}

#customers th {
    text-align: left;
    background-color:green;
    color: white;
}
.submit {
    background-color:white;
    border: none;
    color: green;
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
#con{
	font: 19px/24px Tahoma;
	color: #FFFFFF;
	letter-spacing: 0px;
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
  <form name="sa" action="res_user.php" method="POST">
<table align="center" id="customers">
			<tr>
			<th>train name</th><th>train number</th><th>boarding</th><th>destination</th><th>time</th>
			<th>rates</th>
			</tr>
<?php
//ERROR_REPORTING(E_ALL^);
session_start();
$username1=$_SESSION['username'];
$username1=str_replace("'","",$username1);
require_once'DB1.php';
     $query = "select * from registration where username='$username1'";
	 $res = $db->query($query);
		$result = $res->fetch();	
		 while($result)
		{
			?>
				<tr>
			<td><?php echo $result['train_name_r']?>
			</td>
			<td><?php echo $result['train_no_r']?>
			</td>
			<td><?php echo $result['board']?>
			</td>
			<td><?php echo $result['destination']?>
			</td>
			<td><?php echo $result['time']?>
			</td>
			<td><?php echo  $result['rates']?>
			</td>
			</tr>
			<?php
			$result = $res->fetch();
		}
?>
</table>
<table>
<tr>
<td>
<input type="submit" name="back" value="BACK" class="submit"/>
<?php
if(isset($_POST['back']))
{
	header('location:res_done.php');
}
?>
</td>
</tr>
</table>
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

