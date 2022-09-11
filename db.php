<?php 

$connect=mysqli_connect("localhost","root","","ping");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>