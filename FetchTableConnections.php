<?php

include_once("dbconnect.inc.php");

$whereclausetobeechoed = "";
$inbetweentables = "|";
$mysqli = new mysqli($host, $user, $password, $database);

$jsonfortables=$_GET["jsonfortables"];

//echo $jsonfortables;

$tablesused = explode("|",$jsonfortables);

//echo $tablesused[1];

if(count($tablesused)>1){

for($i=0;$i<count($tablesused)-1;$i++){

	$query = "Select TheConnection, InBetweenTables From InterTableConnectionMetaData where FromTable='".$tablesused[$i]."' and ToTable='".$tablesused[$i+1]."'";
	//echo $query;
	$result = $mysqli->query($query);
	$rowfetched = $result->fetch_row();
	
	$whereclausetobeechoed=$whereclausetobeechoed.$rowfetched[0]." and ";
	$inbetweentables = $inbetweentables.$rowfetched[1]."|";

}

	$whereclausetobeechoed=substr($whereclausetobeechoed,0,-5);
	$inbetweentables=substr($inbetweentables,0,-1);
	$whereclausetobeechoed=$whereclausetobeechoed.$inbetweentables;
	echo $whereclausetobeechoed;
}
else {
	echo "";
}

?>