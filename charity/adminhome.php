<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Driver Dashboard</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="styling.css">
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

   <style type="text/css">
        body{ font: 14px Century Gothic; text-align: center; }
        .wrapper{ width: 1200px; padding: 20px; margin-left: 70px; margin-top: 70px; color: #000000; background-color: #ffffff; opacity: 0.8; border-radius: 20px; }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
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
              <li class="active"><a href="driverhome.php">DRIVER HOME</a></li>
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
      
   <!--<section class="probootstrap-hero" style="background-image: url(img/emile-guillemot-ci7gkM_29wA-unsplash.jpg)"  data-stellar-background-ratio="0.5">-->
     
    <div class="wrapper">
        
                        <h2 class="pull-left">Driver Safari Car Wash Details</h2>
                        
                        
                       
                        
                        <a href="driverwelcome.php" class="btn btn-success pull-right">BACK</a><br>

                
                    <?php
                    // Include config file
                    require_once "foodieadminconfig.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM FoodieCustomerRequest";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Location</th>";
                                        echo "<th>Service</th>";
                                        echo "<th>Foodmenu</th>";
                                        echo "<th>Action</th>";
                                       
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['location'] . "</td>";
                                        echo "<td>" . $row['service'] . "</td>";
                                        echo "<td>" . $row['foodmenu'] . "</td>";
                                       
                                        echo "<td>" . $row['payment'] . "</td>";
                                        echo "<td>";

                                         echo "<a href='driverread.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='driverupdate.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='driverdelete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                            
                                           
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

 
                    // Close connection
                    mysqli_close($link);
                    ?>
                        
                </div>
          
</body>
</html>