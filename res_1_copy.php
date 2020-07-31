<form name = "reservation" action="res_1.php" method="GET" method="POST">
<table>
<tr>
<td>TO  :</td>
<td><input type ="text" name="to"/></td>
</tr>
</tr>
<tr>
<td>FROM :</td>
<td><input type ="text" name="from"/></td>
</tr>
</tr>
<tr>
<td>
DATE :
</td>
<td>
<select name="date">
    <option value="1">1</option>
    <option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
  </select>
  <select name="month">
  <option value="jan">january</option>
  <option value="feb">febuary</option>
  <option value="mar">march</option>
  <option value="apl">april</option>
  <option value="may">may</option>
  <option value="jun">june</option>
  <option value="july">july</option>
  <option value="aug">august</option>
  <option value="sep">september</option>
  <option value="oct">october</option>
  <option value="nov">november</option>
  <option value="dec">december</option>
  </select>
<input type ="text" name="year" maxlength="4" size="1"/>
</td>
</tr>
<tr>
<td>
<input type="submit" name="sub1" value="reservation"/>
</td>
</tr>
</table>
<?php
$i=0;
$to=$_GET['to'];
	$from=$_GET['from'];
if(isset($_GET['sub1']))
{
	$date=$_GET['date'];
	$month=$_GET['month'];
	$year=$_GET['year'];
session_start();
$_SESSION["to"] = "'$to'";
$_SESSION["from"] = "'$from'";
$_SESSION["date"] = "'$date'";
$_SESSION["month"] = "'$month'";
$_SESSION["year"] = "'$year'";
	require_once'DB1.php';
     $query = "select * from train where board ='$to' and destination='$from'";
	 $res = $db->query($query);
		$result = $res->fetch();
		
		?>
		<table border="1">
		<tr border="1">
		<td>train name</td><td>train number</td><td>boarding</td><td>destination</td><td>time</td><td>ac first rate</td><td>ac first rate</td><td>ac first rate</td>
			<td>sleeper class rate</td><td>general class rates</td><td>select</td>
			</tr>
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
			print'<input type="radio" value="submit'.$i.'" name="radio" />'; 
			$i++;
			print"$i";
			?>
			</td>
			</tr>
			<?php
			
			$result = $res->fetch();
			
		}
	}
?>
<input type="submit" name="subit"/>
<?php
	
	if(isset($_GET['subit']))
	{
		session_start();
		$to=$_SESSION['to'];
		$from=$_SESSION['from'];
		$to=str_replace("'","",$to);
		$from=str_replace("'","",$from);
		print"$to";
	require_once'DB1.php';
     $query = "select * from train where board ='$to' and destination='$from'";
	 $res = $db->query($query);
		$result = $res->fetch();
		$counter=0;
		while($result)
		{
			$counter++;
			$result=$res->fetch();
		}
		print"counter is $counter";
			$hello=$_GET['radio'];
			$query1 = "select * from train where board ='$to' and destination='$from'";
	 $res1 = $db->query($query1);
		$result1 = $res1->fetch();
	
	for($j=0;$j<=$counter;$j++)
	{	
		switch($hello)
				{
					case 'submit'.$j.'':
						print"$j is pressed";
						
					      $_SESSION['trainn']=$result1['train_name'];
						  $_SESSION['traino']=$result1['train_no'];
						  header('Location:reservation.php');
						break;
				}
				$result1 = $res1->fetch();
	}
	}
	
?>
</table>  
</form>
