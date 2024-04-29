<!DOCTYPE html>
<?php
include('dbconnect.php');
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>



    <div class="jumbotron" style="border-radius:0;background:url('images/3.jpg');background-size:cover;height:400px;"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="" class="list-group-item active">Members</a>
                    <a href="member_details.php" class="list-group-item">Member details</a>
                    <a href="package.php" class="list-group-item">Package details</a>
                    <a href="payment.php" class="list-group-item">Payments</a>
                </div>
                <hr>
                <div class="list-group">
                    <a href="trainer.php" class="list-group-item active">Trainer</a>
                    <a href="trainer.php" class="list-group-item active">Trainer details</a>
                    <a href="trainer.php" class="list-group-item active">Add new Trainer</a>
                    <a href="index.php" class="btn btn-primary mt-5">Logout</a>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body" style="background-color:#3498DB;color:FFFFFF;">
                        <h3>Update Member</h3>
                    </div>
                    <div class="card-body"></div>
                    <?php
                    include 'dbconnect.php';
                    $id=$_GET['id'];
                    $qry= "select * from members where id='$id'";
                    $result=mysqli_query($con,$qry);
                    $row=mysqli_fetch_array($result);
                
                    ?>
                    <form class="form-group" style="margin: 0px 15px 32px;" action="func.php" method="post">
                        <input hidden type="text" name="id" value='<?php echo $row['id']; ?>' >
                        <label>First Name:</label>
                        <input type="text" id="fname" name="fname" value='<?php echo $row['fname']; ?>' class="form-control"><br>
                        <label>Last Name:</label>
                        <input type="text" id="lname" name="lname" value='<?php echo $row['lname']; ?>' class="form-control"><br>
                        <label>Email</label>
                        <input type="text" id="email" name="email" value='<?php echo $row['email']; ?>' class="form-control"><br>
                        <label>Mobile No:</label>
                        <input type="text" id="mobile" name="mobile" value='<?php echo $row['mobile']; ?>' class="form-control"><br>
                        <label>Trainer </label>
                        <select class="form-control" name="trainer" selected='<?php echo $row['trainer_id']; ?>'>
                            <?php
                            $query = "SELECT * FROM trainer";
                            $res1 = mysqli_query($con, $query);
                            while ($row1 = mysqli_fetch_array($res1)) :; ?>
                                <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                            <?php endwhile; ?>
                        </select><br>
                        <div>
                            <button type="submit" id="reg_btn" name="mem_update" class="btn btn-primary" onclick="return validate()">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>

</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    function validate() {
        var fname = jQuery("#fname").val().trim();
        var lname = jQuery("#lname").val().trim();
        var email = jQuery("#email").val().trim();
        var mobile = jQuery("#mobile").val().trim();

        if (IsName(fname) == false) {
            alert("Enter Valid Name!!!");
            jQuery("#fname").focus();
            return false;
        } else if (IsName(lname) == false) {
            alert("Enter Valid Name!!!");
            jQuery("#lname").focus();
            return false;
        } else if (IsEmail(email) == false) {
            alert("Enter Valid Email!!!");
            jQuery("#email").focus();
            return false;
        } else if (IsMobile(mobile) == false) {
            alert('Enter Valid Mobile!!!');
            jQuery("#mobile").focus();
            return false;
        }
    }

    function IsName(name) {
        var regex = /^[a-zA-Z]{2,15}$/;
        if (!regex.test(name)) {
            return false;
        } else {
            return true;
        }
    }

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }

    function IsMobile(mobile) {
        var regex = /^[6-9]\d{9}$/;
        if (!regex.test(mobile)) {
            return false;
        } else {
            return true;
        }
    }
</script>