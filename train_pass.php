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
<title>INDIAN RAILYWAY</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style_table.css" type="text/css" />
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
	width:575px;
}

#customers td, #customers th {
    border: 1px solid #ddd;
	padding:4px;
  
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}

#customers th {
    text-align: left;
    background-color:green;
    color: white;
}
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
  <div>
  <form name="hello" action="train_pass.php" method="POST">
<table id="customers" align="center">
				<tr>
				<th>username</th><th>train name</th><th>train number</th><th>quota</th>
				<th>date</th>
				<th>time</th><th>class</th><th>board</th><th>destination</th>
				<th>Rates</th><th>Seats</th></tr>
<?php
require_once'DB1.php';
     $query = "select * from registration";
	 $res = $db->query($query);
	$result = $res->fetch();
	 while($result)
		{
			?>	
			<tr>
			<td><?php echo $result['username']?>
			</td>
			<td><?php echo $result['train_name_r']?>
			</td>
			<td><?php echo $result['train_no_r']?>
			</td>
			<td><?php echo $result['quota']?>
			</td>
			<td><?php echo $result['date']?>
			</td>
			<td><?php echo $result['time']?>
			</td>
			<td><?php echo $result['class']?>
			</td>
			<td><?php echo $result['board']?>
			</td>
			<td><?php echo $result['destination']?>
			</td>
			<td><?php echo $result['rates']?>
			</td>
			<td><?php echo $result['seats']?>
			</td>
			</tr>
			<?php
			$result = $res->fetch();
		}
	
?>
</table>
<table align="center">
<tr>
<td><input type="submit" name="back" value="Back" class="submit"/></td>
</tr>
</table>
<?php
if(isset($_POST['back']))
{
 echo '<script>window.location.href ="pass.php";</script>';
}
?>
</form>
</div>
 <div id="footer1_"> &nbsp;</div>
 <div id="footer2_">
    <p>&nbsp;</p>
    <p>Designed by Amey Rao<br/>
      <br/>
      </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div id="footer3_">&nbsp;</div>
  </div>
</body>
</html>