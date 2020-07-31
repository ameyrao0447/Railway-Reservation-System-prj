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
	color: #FFFFFF;
	letter-spacing: 0px;
}
.submit {
    background-color:white;
    border: none;
    color: green;
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
<table class="container">
<tr>
				<th>username</th><th>name</th><th>middle name</th><th>lastname</th>
				<th>gender</th><th>age</th><th>occupation</th>
				<th>address line</th>
				<th>address line</th><th>address line</th>
				</tr>
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
			<td><?php echo $result['name']?>
			</td>
			<td><?php echo $result['middle']?>
			</td>
			<td><?php echo $result['last']?>
			</td>
			<td><?php echo $result['gender']?>
			</td>
			<td><?php echo $result['age']?>
			</td>
			<td><?php echo $result['occupation']?>
			</td>
			<td><?php echo $result['addres_l']?>
			</td>
			<td><?php echo $result['addres_l_l']?>
			</td>
			<td><?php echo $result['addres_l_l_l']?>
			</td>
			</tr>
			<?php
			
			$result = $res->fetch();
			
		}
	
?>
</table>
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
<div align=center>This template  downloaded form </div>
</body>
</html>