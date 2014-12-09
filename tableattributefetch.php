<?php
$tablename=$_GET["attributestobefetchedfrom"];
include_once("dbconnect.inc.php");

$mysqli = new mysqli($host, $user, $password, $database);

if (mysqli_connect_errno()) 
{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$originaltocustom="{";
//$customtooriginal="";

 $query = "select * from TableAttributeMapping where OriginalTableName="."'".$tablename."'";
 $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

 if($result->num_rows > 0) 
 {  $i=1;
	while($row = $result->fetch_row()) 
	{
         $originaltocustom = $originaltocustom.'"'.$i .'":['.'"'.$tablename.'.'.$row[1].'"'.','.'"'.$row[2].'"],';
         $i++;
	}
		 $originaltocustom=substr($originaltocustom,0,-1);
		 $originaltocustom=$originaltocustom."}";
 }



echo $originaltocustom;
?>







