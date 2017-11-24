<?php
/**
 * Created by PhpStorm.
 * User: virk04
 * Date: 24-11-2017
 * Time: 09:57
 */


//This is our instance Variable
$method = $_SERVER['REQUEST_METHOD'];
$array = [];
parse_str ($_SERVER['QUERY_STRING'], $array);

// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'progexam_1');
mysqli_set_charset($link,'utf8');




// This If statement will give us information regarding Customer, If ID is requested in the URL
// I will be shown in JSON format, since its JSON encoded.
if ($method == 'GET' && array_key_exists('CUSTOMER_ID',$array)) {
    $sql = "Select * FROM orders WHERE CUSTOMER_ID =".$array['CUSTOMER_ID'];
    $result = mysqli_query($link,$sql);
    if (!$result){
        http_response_code(404);
        die(mysqli_error());

    }
    echo json_encode($result->fetch_assoc());

} else{
    echo "One like = one fuck off";
}
// close mysql connection
mysqli_close($link);
exit;