<?php
// Enter your host name, database username, password, and database name.
// If you have not set database password on localhost then set empty.
$con = mysqli_connect("localhost", "root", "", "sgauth");
// $con = mysqli_connect("localhost", "root", "", "academia_tubes");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$showhint = true;  //Shows the last executed SQL query