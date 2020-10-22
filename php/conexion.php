<?php
//datos
$servername="localhost";
$username="root";
$password="";
$DB="imaginatio 2020";
//crear conexion
$conn= mysqli_connect($servername,$username,$password,$DB);
//revisar conexion
if ($conn->connect_error)
{
    die("Connection Failed:".$conn->connect_error);
}
else
{
    //echo "connect successfully";
}

?>