<?php
$db = mysqli_connect("localhost","root","","dashboard");

if(!$db){
    echo ('connection failed'.mysqli_connect_error());
}
else{
    echo 'connected successfully';
}
?>