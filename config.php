<?php
//hostname,username,password is null,db name
$db = mysqli_connect('localhost',"root","","myblogs");
if($db){
    // echo "Success";
}
else{
    die("Failed".mysqli_connect_error());
}
?>