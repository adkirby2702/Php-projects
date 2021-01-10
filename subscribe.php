<!DOCTYPE html>
<html>
<head>
    <title>Subscribe here</title>
</head>
<body>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
	?>
        <form method = "POST" action = "subscribe.php">
            <label> Email: <input type ="text" name = "Email"></input></label><br>
            <input type="submit" value = "Submit" name = "submit">
        </form>
	<?php
	}
	else{
	$confirmationThing = bin2hex(random_bytes(10));
	$file = fopen("eList.txt", "a");
	fwrite($file, $_POST['Email'].",".$confirmationThing.",false\r\n");
	fclose($file);
	$emailConfirm = "http://deltona.birdnest.org/~acc.kirbya4/email-subscription/confirm.php?email=".urlencode("kirbya4@winthrop.edu")."&confirmation=".$confirmationThing; 
	mail("kirbya4@winthrop.edu",
	"Confirm Email",
	"Please confirm your email at the following link: \r\n".$emailConfirm,
	"From: no-reply@winthrop.edu");
	echo "Confirmation email sent";
	}
?>
</body>
</html>
