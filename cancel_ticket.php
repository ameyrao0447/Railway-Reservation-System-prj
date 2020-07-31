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
#con{
	font: 19px/24px Tahoma;
	color:green;
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
  <form name="canel" method="POST" action="cancel_ticket.php">
<table align="center" id="customers">
<?php
//ERROR_REPORTING(E_ALL^);

session_start();
$username1=$_SESSION['username'];
$username1=str_replace("'","",$username1);
require_once'DB1.php';
			$query1 = "select count(*) from registration where cancel='cancel'";
			$res1 = $db->query($query1);
			$result1 = $res1->fetch();
			$num = $result1['count(*)'];
			if($num>0)
			{
				echo'<tr>
			<th>username</th>
			<th>train name</th><th>train number</th><th>boarding</th><th>destination</th><th>time</th>
			<th>action</th>
			</tr>';
require_once'DB1.php';	
     $query = "select * from registration where cancel='cancel'";
	 $res = $db->query($query);
		$result = $res->fetch();	
		$i++;
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
			<td><?php echo $result['board']?>
			</td>
			<td><?php echo $result['destination']?>
			</td>
			<td><?php echo $result['time']?>
			</td>
			<td>
			<?php
			$user1=$result['username'];
			if(isset($_POST['sub']))
				{
					$seats=$result['seats'];
					$train=$result['train_name_r'];
			if(isset($_POST['submit'.$i.'']))
				{
			require_once 'DB1.php';
			$query1 = "DELETE FROM `registration` WHERE username='$user1' AND CANCEL='cancel' AND seats='$seats' AND train_name_r='$train'";	
			$res1 = $db->exec($query1);
			header('Location:cancel_ticket.php');
				}
				}
			print'<input type="checkbox" name="submit'.$i.'"/>';
			$i++;
			?>
			</td>
			</tr>
			<?php
			$result = $res->fetch();
		}
		echo'<tr><td><input type="submit" name="sub" class="submit"/></td><tr>';
			}
			else
			{
				print'<table align="center"><tr><td align="center"><font color="green"><h1>NO RECORDS FOUND</h1></td></tr></table>';
			}
?>
<br></br>
<br></br>
</table>
<input type="submit" name="back" value="back" class="submit">
<?php
if(isset($_POST['back']))
{
 echo '<script>window.location.href ="admin.php";</script>';
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