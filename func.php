<?php
include 'dbconnect.php';
if (isset($_POST['login_submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "select * from logintb where username='$username' and password='$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        header("Location:admin-panel.php");
    } else {
        echo "<script>alert('Please Enter Correct Login Details')</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        die();
    }
}
if (isset($_POST['mem_submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $trainer = $_POST['trainer'];
    $query = "insert into members(fname,lname,email,mobile,trainer_id)values('$fname','$lname','$email','$mobile','$trainer')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Member Added Successfully!!!')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
}
if (isset($_POST['mem_update'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $trainer = $_POST['trainer'];
    $query = "update members set fname='$fname',lname='$lname',email='$email',mobile='$mobile',trainer_id='$trainer' where id='$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Member Updated Successfully!!!')</script>";
        echo "<script>window.open('member_details.php','_self')</script>";
    }
}
if (isset($_POST['trainer_submit'])) {
    $Trainer_id = $_POST['Trainer_id'];
    $Name = $_POST['Name'];
    $phone = $_POST['phone'];
    $query = "insert into Trainer(Trainer_id,Name,phone)values('$Trainer_id','$Name','$phone')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Trainer Added Successfully!!!')</script>";
        echo "<script>window.open('trainer.php','_self')</script>";
    }
}
if (isset($_POST['trainer_update'])) {
    $id = $_POST['id'];
    $Trainer_id = $_POST['Trainer_id'];
    $Name = $_POST['Name'];
    $phone = $_POST['phone'];
    $query = "update Trainer set Trainer_id='$Trainer_id',Name='$Name',phone='$phone' where Trainer_id='$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Trainer Updated Successfully!!!.')</script>";
        echo "<script>window.open('trainer.php','_self')</script>";
    }
}

function get_members_details()
{
    global $con;
    $query = "select * from members";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $contact = $row['mobile'];
        $trainer_id = $row['trainer_id'];
        echo "<tr>
        <td>$id</td>
        <td>$fname</td>
        <td>$lname</td>
        <td>$email</td>
        <td>$contact</td>
        <td>$trainer_id</td>
        <td><a name='mem_update' href='update.php?id=" . $id . "'><button class='btn btn-warning'>Update</button></a></td>
        <td><a name='mem_update' href='delete.php?id=" . $id . "'><button class='btn btn-danger'>Delete</button></a></td>
        </tr>";
    }
}

function get_trainer()
{
    global $con;
    $query = "select * from Trainer";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $Trainer_id = $row['Trainer_id'];
        $Name = $row['Name'];
        $phone = $row['phone'];
        echo "<tr>
        <td>$Trainer_id</td>
        <td>$Name</td>
        <td>$phone</td>
        <td><a name='mem_update' href='updatetrainer.php?id=".$Trainer_id."'><button class='btn btn-warning'>Update</button></a></td>
        <td><a name='mem_update' href='deletetrainer.php?id=".$Trainer_id."'><button class='btn btn-danger'>Delete</button></a></td>
        </tr>";
    }
}
