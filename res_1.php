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
	padding: 3px;
    color:green;
	font-size:13px;
} 
input[type=text], select {
    width: 100%;
    margin: 8px 0;
	padding: 4px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	color:green;

}
input[type=date], select {
    width: 100%;
    margin: 8px 0;
	padding: 4px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	color:green;
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
<form name="reservation" action="res_1.php" method="GET">
<table cellpadding="6" align=center>
<tr>
<td>TO  :</td>
<td><input type="text" name="to" class="" required/></td>
</tr>
</tr>
<tr>
<td>FROM :</td>
<td><input type="text" name="from" required/></td>
</tr>
</tr>
<tr>
<td>
DATE :
</td>
<td>
<input type="date" name="date"  required/>
</td>
</tr>
<tr>
<td></td>
<td align=center>
<input type="submit" name="sub1" value="RESERVATION" class="submit" required/>
</td>
</tr>
</table>
<br></br>
<br></br>
<?php
$i=0;
if(isset($_GET['sub1']))
{
	$to=$_GET['to'];
	$from=$_GET['from'];
	$date=$_GET['date'];
$timezone = date('Y-m-d');
	if($date>$timezone)
	{
$_SESSION["to"] = $to;
$_SESSION["from"] = $from;
$_SESSION["date"] = $date;
require_once'DB1.php';
			$query1 = "select count(*) from train where board ='$to' and destination='$from'";
			$res1 = $db->query($query1);
			$result1 = $res1->fetch();
			$num = $result1['count(*)'];
			if($num>0)
			{
	require_once'DB1.php';
     $query = "select * from train where board ='$to' and destination='$from'";
	 $res = $db->query($query);
		$result = $res->fetch();
		
		?>
<br></br>
		<table border="1" width="575px" align="center" id="customers">
		<tr border="1">
		<?php
		echo'<th>train name</th><th>train number</th><th>boarding</th><th>destination</th><th>time</th><th>ac first rate</th><th>ac first rate</th><th>ac first rate</th>
			<th>sleeper class rate</th><th>general class rates</th><th>select</th>
			</tr>';
			?>
		<?php
	 while($result)
		{
			?>
				<tr>
			<td><?php echo $result['train_name']?>
			</td>
			<td><?php echo $result['train_no']?>
			</td>
			<td><?php echo $result['board']?>
			</td>
			<td><?php echo $result['destination']?>
			</td>
			<td><?php echo $result['time']?>
			</td>
			<td><?php echo $result['acf']?>
			</td>
			<td><?php echo $result['acs']?>
			</td>
			<td><?php echo $result['act']?>
			</td>
			</td>
			<td><?php echo $result['sl']?>
			</td>
			<td><?php echo $result['gl']?>
			</td>
			<td>
			<?php
			print'<input type="radio" value="submit'.$i.'" name="radio"/>'; 
			$i++;
			?>
			</td>
			</tr>
			<?php
			$result = $res->fetch();
		}
		
		?>
		<table align="center">
		<tr>
		<td>
<?php
			
		print'<input type="submit" name="subit" class="submit" value="TRAIN" formnovalidate/>';
		}
			else
			{
				print'<table><tr><td><font color="red">TRAIN NOT AVAILABLE</td></tr></table>';	
			}
	}
	else
	{
		echo'<font color="red">INVALID DATE';
	}
		?>
		</td>
		</tr>
		</table>
<?php
	}
?>
<?php
	if(isset($_GET['subit']))
	{	
		
		$to=$_SESSION["to"];
		$from=$_SESSION["from"];
		$to=str_replace("'","",$to);
		$from=str_replace("'","",$from);
	require_once'DB1.php';
     $query ="select * from train where board ='$to' and destination='$from'";
	 $res = $db->query($query);
		$result = $res->fetch();
		$counter=0;
		while($result)
		{
			$counter++;
			$result=$res->fetch();
		} 
			$hello=$_GET['radio'];
			$query1="select * from train where board ='$to' and destination='$from'";
	 $res1 = $db->query($query1);
		$result1=$res1->fetch();
		$not=0;
	for($j=0;$j<=$counter;$j++)
	{	
		switch($hello)
				{
					case 'submit'.$j.'':
					      $_SESSION["trainn"]=$result1['train_name'];
						  $_SESSION["traino"]=$result1['train_no'];
						  $_SESSION["ratea"]=$result1['acf'];
						 $_SESSION["rateb"]=$result1['acs'];
						 $_SESSION["ratec"]=$result1['act'];
						 $_SESSION["rated"]=$result1['gl'];
						 $_SESSION["ratee"]=$result1['sl'];
						header('Location:reservation.php');
						break;
						default:
						$not++;
				}
				$result1=$res1->fetch();
					
	}
	if($not>0)
	{
		print'<table align=center><tr><td><font color="red">please select train</td></tr></table>';
	}
}
?>
</table>  
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