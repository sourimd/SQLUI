<?php

$receivedquery = $_GET['querystatement'];

include_once("dbconnect.inc.php");

$thestringtobeechoed = "<html><body><a href='index.php'>GO BACK<a><br/><style>table, td, th
          {
          border:1px solid blue;
          }
          th
          {
          background-color:blue;
          color:white;
          }
          </style><table border='1'>";

$mysqli = new mysqli($host, $user, $password, $database);

$result=$mysqli->query($receivedquery);
$finfo = $result->fetch_fields();

//echo "<html><body>".$receivedquery."</body></html>";

$thestringtobeechoed=$thestringtobeechoed."<tr>";
foreach ($finfo as $val) {
             $thestringtobeechoed=$thestringtobeechoed."<th>".$val->name."</th>";
             
          }

$thestringtobeechoed=$thestringtobeechoed."<tr>";
 if($result->num_rows > 0) 
 {
	while($row = $result->fetch_row()) 
	{
		$thestringtobeechoed=$thestringtobeechoed."<tr>";
		for($i=0;$i<count($row);$i++)
         	$thestringtobeechoed=$thestringtobeechoed."<td>".utf8_encode($row[$i])."</td>";
        $thestringtobeechoed=$thestringtobeechoed."</tr>";
	}
  $thestringtobeechoed=$thestringtobeechoed."</table></body></html>";
 }

 echo $thestringtobeechoed;

?>
