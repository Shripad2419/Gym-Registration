<?php

if(isset($_GET['id'])){
$id=$_GET['id'];

include 'dbconnect.php';


$qry="delete from members where id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"<script>alert('Member Deleted Successfully!!!')</script>";
    echo "<script>window.location.href = 'member_details.php';</script>";
}else{
    echo"<script>alert('Error!!!')</script>";
}
}
?>