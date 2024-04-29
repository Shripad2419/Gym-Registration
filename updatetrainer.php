<!DOCTYPE html>
<?php include("func.php"); ?>
<html>

<head>
    <title>Members details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
    <div class="jumbotron" style="background: url('images/2.jpg') no-repeat;background-size: cover;height: 300px;"></div>

    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
                <div class="row">
                    <div class="col-md-1">
                        <a href="admin-panel.php" class="btn btn-light ">Go Back</a>
                    </div>
                    <div class="col-md-8">
                        <h3>Update Trainer</h3>
                    </div>
                    <div class="col-md-3">
                        <form class="form-group" action="patient_search.php" method="post">
                            <div class="row">


                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
                <div class="card-body">
                <?php
                    include 'dbconnect.php';
                    $id=$_GET['id'];
                    $qry= "select * from trainer where Trainer_id='$id'";
                    $result=mysqli_query($con,$qry);
                    $row=mysqli_fetch_array($result);
                
                    ?>
                    <form class="form-group" action="func.php" method="post">
                    <input hidden type="text" name="id" value='<?php echo $row['Trainer_id']; ?>' >
                        <label>Trainer ID</label>
                        <input type="text" name="Trainer_id" id="tid" value='<?php echo $row['Trainer_id']; ?>' class="form-control"><br>
                        <label>Name</label>
                        <input type="text" name="Name" id="name" value='<?php echo $row['Name']; ?>' class="form-control"><br>
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone" value='<?php echo $row['phone']; ?>' class="form-control"><br>
                        <input type="submit" class="btn btn-primary" name="trainer_update" value="Update" onclick="return validate()">
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
  function validate() {
      var id = jQuery("#tid").val().trim();
      var name = jQuery("#name").val().trim();
      var phone = jQuery("#phone").val().trim();
      if (id == "") {
        alert("Enter Valid ID!!!");
        jQuery("#tid").focus();
        return false;
      }

      else if (IsName(name) == false) {
        alert("Enter Valid Name!!!");
        jQuery("#name").focus();
        return false;
      }
      else if (IsMobile(phone) == false) {
        alert('Enter Valid Mobile!!!');
        jQuery("#phone").focus();
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
  
  function IsMobile(mobile) {
      var regex = /^[6-9]\d{9}$/;
      if (!regex.test(mobile)) {
          return false;
      } else {
          return true;
      }
  }
</script>
    </div>
</body>

</html>