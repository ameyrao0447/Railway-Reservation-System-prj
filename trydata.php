<?php
require_once'DB1.php';
     $query = "select count(*) from registration where username=''";
	 $res = $db->query($query);
	$result = $res->fetch();
	$num = $result['count(*)'];
	print"$num";
?>