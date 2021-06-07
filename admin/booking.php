<?php 
    
    session_start();
    $c_name = $_SESSION['user'];
        if(isset($_POST['book'])){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"dd");
        $c_name=$_SESSION['user'];
        $query = "select * from customers where username = '$c_name'";
        $query_run = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($query_run)){
            echo $row['id'];
            $c_id = $row['id'];
        }
        $name = $_GET['rn'];
        if($_POST['service'] == 'Salon'){     
                $query = "update salon set c_id = '$c_id', c_name = '$c_name', service = '$_POST[service]', sub_service = '$_POST[sub]', c_phone = $_POST[c_phone],address = '$_POST[c_address]',date = '$_POST[date]', time = '$_POST[time]', status = 1 where name = '$name'";
        }

        elseif($_POST['service'] == 'Carpentry'){
                    $query = "update carpentry set c_id = '$c_id', c_name = '$c_name',service = '$_POST[service]', sub_service = '$_POST[sub]', c_phone = '$_POST[c_phone]',address = '$_POST[c_address]',date = '$_POST[date]', time = '$_POST[time]', status = 1 where name = '$name'";   
            }

        elseif($_POST['service'] == 'Cleaning'){     
                    $query = "update cleaning set c_id = '$c_id', c_name = '$c_name',service = '$_POST[service]', sub_service = '$_POST[sub]', c_phone = '$_POST[c_phone]',address = '$_POST[c_address]',date = '$_POST[date]', time = '$_POST[time]', status = 1 where name = '$name'";    
            }
            
        elseif($_POST['service'] == 'Electrician'){
                    $query = "update electrician set c_id = '$c_id', c_name = '$c_name',service = '$_POST[service]', sub_service = '$_POST[sub]', c_phone = '$_POST[c_phone]',address = '$_POST[c_address]',date = '$_POST[date]', time = '$_POST[time]', status = 1 where name = '$name'";
            }

        $query_run = mysqli_query($connection,$query);
        if($_SESSION['name'] == 'admin'){
            header("location:redirect_page.php");   
        }
        else{
            header("location:booked.php");   
        }
   } 
    
?>
<!doctype html>
<html lang="en">
    <head>
  
        <link rel="icon" href="../image/favicon.png" type="image/png">
        <title>Booking page</title>
        <!-- main css -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">

        
    </head>
    <body>
        <!--================Header Area =================-->
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="../image/Logo.png" alt=""></a>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="../index.php">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
        <!--================Header Area Finish=================-->
        <br><br><br><br><br><br>
        
        <!--================Banner Area END =================-->
       <div class="row">
       	<div class="col-md-12">
       		<center><b><h2 style="color: blue;">Service Booking Page</h2></b></center>
       	</div>
       </div><br><br>
        <div class="row">
        	<div class="col-md-4"></div>
        	<div class="col-md-4">
        	<form action="" method="post">
			
			<div class="form-group">
		    <h5 style="margin-bottom: -3px;"><label for="email">Service:</label></h5>	
            <input type="text" class="form-control" name="service" value="<?php 
                if($_GET['rt'] == 'a') {echo 'Salon';} 
                elseif($_GET['rt'] == 'b' ) {echo 'Carpentry';} 
                elseif($_GET['rt'] == 'c') {echo 'Cleaning';}  
                else {echo 'Electrician';}
                
                ?>" >
            </div>

              <?php if($_GET['rt'] == 'a'){ ?>
                <div class="form-group" style="padding-top: 10px;">
                <h5 style="margin-bottom: -3px;"><label for="email">Sub Service:</label></h5>
                <select class="form-control" name="sub">
                    <option >Haircut</option>
                    <option >Facial and Hair Styling</option>
                    <option >Waxing and Threading</option>
                    <option >Manicure and Pedicure</option>
                </select>
                <?php 
                    }
                  elseif ($_GET['rt'] == 'b'){ ?>
                    <div class="form-group" style="padding-top: 10px;">
                    <h5 style="margin-bottom: -3px;"><label for="email">Sub Service:</label></h5>
                    <select class="form-control" name="sub">
                        <option >Framing</option>
                        <option >Roofing</option>
                        <option >Structural work</option>
                        <option >Flooring</option>
                    </select>
                <?php 
                    }
                    elseif ($_GET['rt'] == 'c' ){ ?>
                    <div class="form-group" style="padding-top: 10px;">
                    <h5 style="margin-bottom: -3px;"><label for="email">Sub Service:</label></h5>
                    <select class="form-control" name="sub">
                        <option >Couch</option>
                        <option >Bed</option>
                        <option >Floor</option>
                        <option >Full-Package</option>
                    </select>
                    <?php 
                    }
                  else { ?>
                  <div class="form-group" style="padding-top: 10px;">
                    <h5 style="margin-bottom: -3px;"><label for="email">Sub Service:</label></h5>
                    <select class="form-control" name="sub">
                        <option >Repair and fixes</option>
                        <option >Electricity breakdown</option>
                        <option >Electrical wiring</option>
                        <option >Installation Services</option>
                    </select>
                    <?php 
                        }
                   ?>

            </div>
            <div class="form-group" style="padding-top: 10px;">
                <h5 style="margin-bottom: -3px;"><label >Employee name:</label></h5>
                
                    <input type="text" class="form-control" name="e_name" value="<?php echo $_GET['rn'];?>" >
                
                </div>
            <?php 
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection,"dd");
                
                $query = "select * from customers where username = '$c_name'";
                $query_run = mysqli_query($connection,$query); 
                if ($row = mysqli_fetch_assoc($query_run)) {
            ?>

            <div class="form-group" style="padding-top: 10px;">
                <h5 style="margin-bottom: -3px;"><label >Phone</label></h5>
                <input type="text" class="form-control" name="c_phone" value="<?php echo $row["phone"]; ?>" >
            </div>

            <div class="form-group " style="padding-top: 10px;">
                <h5 style="margin-bottom: -3px;"><label >Address:</label></h5>
                <input type="text" class="form-control" name="c_address" value="<?php echo $row["address"]; ?>" >
            </div>

            <div class="form-group " style="padding-top: 10px;">
                <h5 style="margin-bottom: -3px;"><label >e-mail:</label></h5>
                <input type="email" class="form-control" name="email" value="<?php echo $row["email"];?>" required="">
            </div>

                <?php } ?>

            <div class="form-group" style="padding-right: 300px;">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" required>
            </div>
            <div class="form-group">
                <label for="email">Time:</label>
                <input type="time" class="form-control" name="time" required>
            </div>
            <br><br>
			<button type="submit" name="book" style="margin-right: 15px;" class="btn btn-warning">Book Now</button>
		</form>
        	
        <br><br><br><br><br><br>
        
    </body>
</html>

