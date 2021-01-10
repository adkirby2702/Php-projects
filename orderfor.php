<!doctype html>
<html>
<head>
    <title>Receipt</title>
</head>
<body>
<?php
   //assess if the user has entered information into the form 
   if(isset($_POST['name']))
   {
	//set variables as placeholders in case the user enters no info
	$name = "Bruce Wayne";
        $address = "1939, Kane Street, Gotham City";
        $hotSammich = 0;
        $hotsammichTotal = 0;
        $coldSammich = 0;
        $coldSammichTotal = 0;
        $serverSide = 0;
        $serverSideTotal = 0;
        $total = 0;
        $subtotal = 0;
        $york = .01;
        $rockHill = 0.02;
        $state = 0.06;

	//set the variables to the information the user filled out
        if ($_POST['name'] != '')
        {
            $name = $_POST['name'];
        }
        if ($_POST['userAddress'] != '')
        {
            $address = $_POST['userAddress'];
        }

	if ($_POST['hotSammich']!= '' )
        {
            $hotSammich = $_POST['hotSammich'];
        }
        if ($_POST['coldSammich']!= '' )
        {
            $coldSammich = $_POST['coldSammich'];
        }
        if ($_POST['serverSide']!= '' )
        {
            $serverSide = $_POST['serverSide'];
        }

	//Add up the costs of all the food items
        $hotsammichTotal = $hotSammich * 5.99;
        $coldSammichTotal = $coldSammich * 4.99;
        $serverSideTotal = $serverSide * 6.99;
        $subtotal = $hotsammichTotal + $coldSammichTotal + $serverSideTotal;
        $state = $subtotal * 0.06;
        $rockHill = $subtotal * 0.02;
        $york = $subtotal * 0.01;
        $total = $subtotal + $state + $rockHill +$york;

	//print out the user receipt
        echo "Receipt for $name<br> ";
        echo "$address <br> <br>";
        echo "$coldSammich Cold Php Sandwich: $coldSammichTotal <br>";
        echo "$hotSammich Hot Php Sandwich: $hotsammichTotal <br>";
        echo "$serverSide PHP with a side of Server: $serverSideTotal <br>";
        echo "<br>";
        echo "Subtotal: $subtotal <br> <br>";
        echo "SC tax: $state <br>";
        echo "York County Tax: $york <br>";
        echo "Rock Hill Tax: $rockHill <br>";
        echo "Total: $total";
   }
   //if the user accesses the page without using the order form, give an error
   else
   {
	echo "Please fill out the form to access this page";
   }
?>
</body>
</html>

