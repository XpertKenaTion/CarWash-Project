<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "managerconfig.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM CarWashDetails WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $email = $row["email"];
                $phone = $row["phone"];
                $location = $row["location"];
                $service = $row["service"];
                $worker = $row["worker"];
               $carplateno = $row["carplateno"];
               $slot = $row["slot"];
               $payment = $row["payment"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: managererror.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: managererror.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Driver Record</title>
     <link rel="stylesheet" type="text/css" href="styling.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
     <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
     <nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li ><a href="index.html">HOME</a></li>
              <li class="active"><a href="managerread.php">MANAGER READ</a></li>
              <li><a href="signup.html">SIGN UP</a></li>
             <li><a href="login.html">LOGIN</a></li>
              <li><a href="about.html">ABOUT US</a></li>
              <li><a href="employees.html">EMPLOYEES</a></li>
              <li><a href="contactus.html">CONTACT US</a></li>
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">PAGES</a>
                <ul class="dropdown-menu">
                 <li><a href="signup.html">SIGN UP</a></li>
                  <li><a href="login.html">LOGIN</a></li>
                  <li><a href="about.html">ABOUT US</a></li>
                  <li><a href="contactus.html">CONTACT US</a></li>
                </ul>
              </li>
              
              
            </ul>
          </div>
        </div>
      </nav>
      
   <section class="probootstrap-hero" style="background-image: url(img/emile-guillemot-ci7gkM_29wA-unsplash.jpg)"  data-stellar-background-ratio="0.5">
     
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Driver Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $row["email"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <p class="form-control-static"><?php echo $row["phone"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <p class="form-control-static"><?php echo $row["location"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Service</label>
                        <p class="form-control-static"><?php echo $row["service"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Worker</label>
                        <p class="form-control-static"><?php echo $row["worker"]; ?></p>
                    </div>
                     <div class="form-group">
                        <label>Car Plate No</label>
                        <p class="form-control-static"><?php echo $row["carplateno"]; ?></p>
                    </div>
                     <div class="form-group">
                        <label>Car Slot</label>
                        <p class="form-control-static"><?php echo $row["slot"]; ?></p>
                    </div>
                     <div class="form-group">
                        <label>Means of Payment</label>
                        <p class="form-control-static"><?php echo $row["payment"]; ?></p>
                    </div>
                    <center><p><a href="managerhome.php" class="btn btn-primary">Back</a></p></center>
                    <center><p><a href="index.html" class="btn btn-primary">Home</a></p></center>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>