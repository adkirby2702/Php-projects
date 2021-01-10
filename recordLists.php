<?php
session_start();
$recordList = fopen("records.txt", "r");
$records = array();
if(!is_resource($recordList))
{
    echo "Could not open the file";
    exit();
}

while($line = fgets($recordList))
{
    $records[] = explode(",", $line);
}
fclose($recordList);
$listened = array();
if (empty($_SESSION["listenedTo"]))
{
	$_SESSION["listenedTo"] = 0;
}
if (empty($_SESSION["page"]))
{
        $_SESSION["page"] = "";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Records</title>
</head>
<body> 
<h1>Album List</h1>
<ul>
<?php 
    $listened= explode(",",$_SESSION["page"]);
    echo "<h2> Choose the record being listened to learn about it</h2>";
    foreach($records as $key => $value)
    {
	if (in_array($value[0],$listened)){
		echo "<li><a href='recordDetail.php?album=" . urlencode($key) . "'>" . $value[0] . "---Listened to </li></a>";
	}
	else
	{
		echo "<li><a href='recordDetail.php?album=" . urlencode($key) . "'>" . $value[0] . "</a></li>";
	}

    }
    
?>
</ul>
<?php
	echo "\r\n".$_SESSION["listenedTo"]. " records have been listened/learned about over this session \r\n ";
?>
    <br>
    <a href="recordAdd.php" > Don't see your record? Click here to add it to the list </a>
    </body>
</html>
