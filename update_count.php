<?php

    $con=mysqli_connect('localhost','root','','userdata');

    $type=$_POST['type'];
    $id=$_POST['id'];

    if($type=='like'){
        $sql="UPDATE like_dislike SET like_count=like_count+1 WHERE id='$id'";
    }
    if($type=='dislike'){
        $sql="UPDATE like_dislike SET dislike_count=dislike_count+1 WHERE id='$id'";
    }
    
    $res=mysqli_query($con,$sql);

?>