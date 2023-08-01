<?php
    $HostName='localhost';
    $UserName='root';
    $Password='';
    $Database='signup';

    $con=mysqli_connect( $HostName,$UserName,$Password,$Database);

    if(!$con){
        die(mysqli_error($con));
    }
   

?>