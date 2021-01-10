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
if(isset($_GET["album"]))
    {
        if(isset($records[$_GET["album"]]))
        {
            $newPage = $records[$_GET["album"]][0];
        }
    }
if (empty($_SESSION["page"]))
{
        $_SESSION["page"] = "";
}

$_SESSION["page"] = $_SESSION["page"].$newPage.",";

fclose($recordList);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Records</title>
</head>
<body> 
<h1>Record Details</h1>
<?php
    $listened = array();
    if(isset($_GET["album"]))
    {
        if(isset($records[$_GET["album"]]))
        {
            echo "<h2>" . $records[$_GET["album"]][0] . "</h2>";
            echo "<p>Genre: " . $records[$_GET["album"]][1] . "</p>";
	    echo "<p>Year Released: " . $records[$_GET["album"]][2] . "</p>";
            echo "<p>RunTime: " . $records[$_GET["album"]][3] . "</p>";
	    echo "<p>Record grading: " . $records[$_GET["album"]][4] . "</p>";
	    if( isset( $_SESSION["listenedTo"] ) ) 
	    {
      		$_SESSION["listenedTo"] += 1;
   	    }
            else
            {
                $_SESSION["listenedTo"] = 1;
   	    }		
        }
        else
        {            //Default text
             echo "The album was not in the list.";
        }
    }
    else
    {
        //Default text
        echo "The album was not in the list.";
    }
?>
    <a href="recordLists.php" > Back to list </a>
    </body>
</html>
