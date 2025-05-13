<?php
$username= "root";
$password= "";
$dbname= "gym-&-fitness-management";
$servername="localhost";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){
}
else{
    die("ERROR".mysqli_connect_error());
}
?>