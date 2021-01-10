<!doctype html>
<html>
<head>
    <title>Add record to the list</title>
</head>
<body>
<h1> Add the record </h1>
<?php
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
        ?>
        <form method = "POST" action = "recordAdd.php">
	    <label> Input the album title: <input type ="text" name = "albumTitle"></input></label><br>
	    <label> Input the band: <input type ="text" name = "albumArtist"></input></label><br>
	    <label> Input the genre: <input type ="text" name = "genre"></input></label><br>
	    <label> Input the year released: <input type ="text" name = "released"></input></label><br>
	    <label> Input the runtime: <input type ="text" name = "runTime"></input></label><br>
	    <label> Input the grade: <input type ="text" name = "grade"></input></label><br>
            <input type="submit" value = "Submit" name = "submit">
        </form>
        <?php
        }
        else{
		//open the file with append then add to file
		$file = fopen('records.txt', 'a');
		$record = $_POST['albumTitle']." by ".$_POST['albumArtist'].",".$_POST['genre'].",".$_POST['released'].",".$_POST['runTime'].",".$_POST['grade'];
		fwrite($file, $record);
		fclose($file);
		echo "Record has been added to file";
	}
?>
<a href="recordList.php" > Back to list </a>
</body>
</html>
