<?php
// Include config file
require_once "driverconfig.php";
 
// Define variables and initialize with empty values
$name = $email =$phone = $location = $service = $worker = $carplateno = $slot = $payment = "";
$name_err = $email_err = $phone_err = $location_err = $service_err = $worker_err = $carplateno_err = $slot_err = $payment_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
// Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter a email.";     
    } else{
        $email = $input_email;
    }
    
    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter a phone number.";     
    } else{
        $phone = $input_phone;
    }

    // Validate location
    $input_location= trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter a location.";     
    } else{
        $location = $input_location;
    }

     // Validate  service
    $input_service= trim($_POST["service"]);
    if(empty($input_service)){
        $service_err = "Please enter a service.";     
    } else{
        $service = $input_service;
    }

   
    
    // Validate worker
    $input_worker = trim($_POST["worker"]);
    if(empty($input_worker)){
        $worker_err = "Please enter the workers name.";     
    } else{
        $worker = $input_worker;
    }

   

    // Validate  carplateno
    $input_carplateno = trim($_POST["carplateno"]);
    if(empty($input_carplateno)){
        $carplateno_err = "Please enter a carplateno .";     
    } else{
        $carplateno = $input_carplateno;
    }


    // Validate  car slot
    $input_slot = trim($_POST["slot"]);
    if(empty($input_slot)){
        $slot_err = "Please choose a car slot .";     
    } else{
        $slot = $input_slot;
    }


    // Validate  payment
    $input_payment = trim($_POST["payment"]);
    if(empty($input_payment)){
        $payment_err = "Please choose a means of payment .";     
    } else{
        $payment = $input_payment;
    }


    // Check input errors before inserting in database
     if(empty($name_err) && empty($email_err) && empty($phone_err) && empty($location_err) && empty($service_err) && empty($worker_err)&& empty($carplateno_err) && empty($slot_err)&& empty($payment_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO DriverCarRequest (name,email, phone,location,service,worker, carplateno,slot,payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_name, $param_email, $param_phone, $param_location, $param_service,$param_worker,$param_carplateno,$param_slot,$param_payment,);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_location = $location;
            $param_service=$service;
            $param_worker=$worker;
            $param_carplateno = $carplateno;
            $param_slot = $slot;
            $param_payment = $payment;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: driverhome.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: drivererror.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Driver Record</title>

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
              <li class="active"><a href="driverupdate.php">DRIVER UPDATE</a></li>
              <li ><a href="signup.html">SIGN UP</a></li>
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
                        <h2>Update  Driver Record</h2>
                    </div>
                    
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone</label>
                            <textarea name="phone" class="form-control"><?php echo $phone; ?></textarea>
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                            <label>Location</label>
                            <!--<input type="text" name="location" class="form-control" value="<?php echo $location; ?>">-->
                            <select class="form-control" name = "location" >
                            
                            <option option = "" ></option>
                            <option option = "Milimani" >Milimani</option>
                            <option option = "Langata" >Langata</option>
                            <option option = "Karen" >Karen</option>
                            <option option = "Runda" >Runda</option>
                            <option option = "Kitengela" >Kitengela</option>
                            <option option = "Juja" >Juja</option>
                            <option option = "Rongai" >Rongai</option>
                            <option option = "Kilimani" >Kilimani</option>
                            <option option = "Roysambu" >Roysambu</option>
                           

               </select>
                            <span class="help-block"><?php echo $location_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($service_err)) ? 'has-error' : ''; ?>">
                            <label>Service</label>
                            <!--<input type="text" name="service" class="form-control" value="<?php echo $service; ?>">-->
                              <select class="form-control" name = "service" >
                            
                            <option option = "" ></option>
                            <option option = "Wheel Service - $100" >Wheel Wash Service - Ksh 1000</option>
                            <option option = "Steering and Dashboard Service - $100" >Steering and Dashboard Wash Service - Ksh 2000</option>
                            <option option = "Glass Wash Service -$100" >Glass Wash Service -Ksh 1500</option>
                            <option option = "Carpet Wash Service -$100" >Carpet Wash Service -Ksh 2000</option>
                            <option option = "Interior VAC Service -$100" >Interior VAC Wash Service -Ksh 3500</option>
                            <option option = "Engine Wash Service -$100" >Engine Wash Service -Ksh 5000</option>
                            <option option = "Repair Service -$100" >Repair Wash Service -Ksh 6000 </option>
                            <option option = "Repair Service -$100" >Fuel Wash Service -Ksh 4000</option>
                          

                          </select>
                            <span class="help-block"><?php echo $service_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($worker_err)) ? 'has-error' : ''; ?>">
                            <label>Worker</label>
                            <!--<input type="text" name="worker" class="form-control" value="<?php echo $worker; ?>">-->
                             <select class="form-control" name = "worker" >
                            
                            <option option = "" ></option>
                            <option option = "Amelia" >Amelia</option>
                            <option option = "Gabriella " >Gabriella</option>
                            <option option = "Brianna" >Brianna</option>
                            <option option = "Mackenzie " >Mackenzie</option>
                            <option option = "Anita" >Anita</option>
                            <option option = "Lucie " >Lucie</option>
                            <option option = "Laura" >Laura</option>
                         

               </select>
                            <span class="help-block"><?php echo $worker_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($carplateno_err)) ? 'has-error' : ''; ?>">
                            <label>CarPlate Number</label>

                     <input type="text" name="carplateno" class="form-control" value="<?php echo $carplateno; ?>">
                        <span class="help-block"><?php echo $carplateno_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($slot_err)) ? 'has-error' : ''; ?>">
                            <label>Car Wash Slot</label>
                            <!--<input type="text" name="slot" class="form-control" value="<?php echo $slot; ?>">-->
                             <select class="form-control" name = "slot" >
                            
                            <option option = "" ></option>
                            <option option = "Slot A" >Slot A</option>
                            <option option = "Slot B" >Slot B</option>
                            <option option = "Slot C" >Slot C</option>
                            <option option = "Slot D" >Slot D</option>
                            <option option = "Slot E" >Slot E</option>
                            <option option = "Slot F" >Slot F</option>
                            <option option = "Slot G" >Slot G</option>
                         

               </select>
                            <span class="help-block"><?php echo $slot_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($payment_err)) ? 'has-error' : ''; ?>">
                            <label>Means of Payment</label>
                            <!--<input type="text" name="payment" class="form-control" value="<?php echo $payment; ?>">-->
                             <select class="form-control" name = "payment" >
                            
                            <option option = "" ></option>
                            <option option = "Cash" >Cash</option>
                            <option option = "Mpesa" >Mpesa</option>
                            <option option = "Paypal" >Paypal</option>
                            <option option = "Visa" >Visa</option>
                           

               </select>
                            <span class="help-block"><?php echo $payment_err;?></span>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <center><a href="driverwelcome.php" class="btn btn-default">Cancel</a></center>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>