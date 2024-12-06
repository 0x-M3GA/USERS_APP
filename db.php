<?php
$con=new mysqli('localhost','root', '123456789', 'users_app');
if (!$con){
    die(mysqli_error($con));
}