<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
</head>
<body>
        <form method = "POST" action = "orderfor.php">
            <label> Name: <input type ="text" name = "name"></input></label><br>
            <label> Address: <input type ="text" name = "userAddress"></input></label><br>
            <label> Cold PHP Sandwhich - 4.99 : <input type ="text" name = "coldSammich"></input></label><br>
            <label> Hot PHP Sandwhich - 5.99 : <input type ="text" name = "hotSammich"></input></label><br>
            <label> PHP with a side of server - 6.99 : <input type ="text" name = "serverSide"></input></label>
            <input type="submit" value = "Submit" name = "submit">
        </form>
</body>
</html>
