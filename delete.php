<?php
    include 'dbconnection.php';
    $id=$_GET['id'];
    $q="DELETE FROM allusers WHERE id=$id";
    mysqli_query($conn,$q);
    header('location:index.php');
?>