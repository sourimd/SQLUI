<?php

include_once("dbconnect.inc.php");

$mysqli = new mysqli($host, $user, $password, $database);

if (mysqli_connect_errno()) 
{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$originaltocustom="{";
//$customtooriginal="";

 $query = "select * from TableNameMetaData";
 $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

 if($result->num_rows > 0) 
 {
	while($row = $result->fetch_row()) 
	{
         $originaltocustom = $originaltocustom.'"'.$row[0].'"'.':'.'"'.$row[1].'",';
	}
		 $originaltocustom=substr($originaltocustom,0,-1);
		 $originaltocustom=$originaltocustom."}";
 }



echo $originaltocustom;
?>







