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
#con{
	font: 19px/24px Tahoma;
	color:green;
	letter-spacing: 0px;
}
#con11{
	padding-top:30px;
	font: 40px/24px Tahoma;
	color: green;
	letter-spacing: 0px;
	height:78px
	width:760px;
	border:1px solid ;
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
  <form name="hello" method="POST" action="user_can.php">
<table align="center" id="customers">
			<tr>
			<th>train name</th><th>train number</th><th>boarding</th><th>destination</th><th>time</th>
			<th>rates</th><th>action</th>
			</tr>
<?php
$username1=$_SESSION['username'];
$username1=str_replace("'","",$username1);
require_once'DB1.php';
     $query = "select * from registration where username='$username1'";
	 $res = $db->query($query);
		$result = $res->fetch();	
		$i=1;
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
			<td>
			<?php
			print'<input type="checkbox" name="submit'.$i.'"/>';
			$i++;
			?>
			</td>
			</tr>
			<?php
			$result = $res->fetch();
		}
		?>
		<tr>
		<td>
		<input type="submit" name="sub"/>
		</td>
		</tr>
		<?php
		require_once'DB1.php';
     $query = "select * from registration where username='$username1'";
	 $res = $db->query($query);
		$result = $res->fetch();	
		$i=1;
		$can=0;
		 if(isset($_POST['sub']))
				{
		 while($result)
		{
			if(isset($_POST['submit'.$i.'']))
				{
				$seat=$result['seats'];
				$train=$result['train_name_r'];
			require_once 'DB1.php';
			$query1 = "UPDATE registration SET cancel='cancel' WHERE username='$username1' AND seats='$seat' AND train_name_r='$train'";			
			$res1 = $db->exec($query1);
			$can++;
				}
				$result = $res->fetch();
				$i++;
		}
				
		if($can>0)
		{
			print'<table><tr><td><font color="red">CANCEL REQUEST SEND </td></tr></table>';	
		}
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

