<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:new-dawnserver.database.windows.net,1433; Database = new-dawn", "akhilmanil", "akhil@123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "akhilmanil", "pwd" => "akhil@123", "Database" => "new-dawn", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:new-dawnserver.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

$dob =  $_POST['dob'];
$gender =  $_POST['gender']; 
$country =  $_POST['country'];
$state =  $_POST['state'];
$hometown =  $_POST['hometown'];


$params = array($dob,$gender,$country,$state,$hometown);
$sql="INSERT INTO PersonDetails (dob, gender, country, state, hometown)
VALUES (?,?,?,?,?)";

$stmt = sqlsrv_query($conn, $sql, $params);
if ($stmt === false) {  
    echo "Row insertion failed.\n";  
    die(print_r(sqlsrv_errors(), true));  
} else {  
    header('location: dashboard.php');  

} 

?>