<?php
/**
 * Created by PhpStorm.
 * User: Noah Davidian
 * Date: 24-11-2017
 * Time: 08:51
 */

?>


// This is our CSS code, this is the style of the table shown in our Localhost... Fancy!
<style>
table {
    border: 2px solid lawngreen;
    border-radius: 5px;
}

    th{
        background-color: #4CAF50;
        color: white;
        border: 2px solid lawngreen;
        font-style: oblique;
        font-size: large;

    }

    td{
        border: 2px solid lawngreen;
        border-radius: 5px;
        padding: 6px;
        text-align: center;

    }
</style>

<?php
// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'progexam_1');
mysqli_set_charset($link,'utf8');
// If connection Failed, it close

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} ?>

<html>
<h2>Welcome <?php echo $_POST["name"]; ?><br></h2>
<h4> Your email address is: <?php echo $_POST["email"]; ?><br></h4>
<h4> Your Current Gender is: <?php echo $_POST["gender"];?></h4>
</html>

<?php

// This is a SQL query we are asking from our database, we are asking for specific information inside
// The orders Table
// Although the
$sql = "SELECT ORD_ID, ORD_DATE, ORD_AMOUNT FROM orders";

// here executes our SQL variable
$result = $link->query($sql);

// Here is our Table with a list of Order ID, Date and Amount
if ($result->num_rows > 0) {

    echo "<table><tr><th>ID</th><th>Order Date</th><th>Order Amount</th></tr>";
 echo " <br><h4>Here Is a list of Order ID's, Order Dates & the amount ordered:</h4><br>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["ORD_ID"]."</td><td> ". $row["ORD_DATE"]."</td><td>". $row["ORD_AMOUNT"] . "</td></tr>";
    }
} else {

    echo "0 results";
}
$conn->close();
?>



