<?php

if(isset($_GET['id'])){
$id=$_GET['id'];

include 'dbconnect.php';


$qry="delete from trainer where Trainer_id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"<script>alert('Trainer Deleted Successfully!!!')</script>";
    echo "<script>window.location.href = 'trainer.php';</script>";
}else{
    echo"<script>alert('Error!!!')</script>";
}
}
?>