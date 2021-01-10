<!DOCTYPE html>
<html>
<head>
    <title>Subscribe here</title>
</head>
<body>
<?php
	$theEmail = urldecode($_GET['email']);
	$theThingy = $_GET['confirmation'];
	$emailList = file('eList.txt');
	$valueToCheck = $theEmail.','.$theThingy.',false';
	$ListOEmails = array();
	foreach($emailList as $line)
	{
		if(trim($line) != $valueToCheck)
		{
    			$ListOEmails[] = $line;
		}
		else{
			$ListOEmails[] = $theEmail.",".$theThingy.",true \r\n";
		}

	}
	$fp = fopen("eList.txt", "w");
     	foreach($ListOEmails as $line) {
         	fwrite($fp, $line);
     	}
     	fclose($fp);
	mail($theEmail,
	"Email verified",
	"Thank you! Email has been confirmed, you will be subscribed and will receive emails!",
	"From: no-reply@winthrop.edu");
	echo 'Email has been confirmed';
?>
</body>
<html>
