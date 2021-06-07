<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<?php
include("headder.php");
?>
    <body class="banner_area1">
    <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php"><img src="image/Logo.png" alt=""></a>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="index.html">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                            <li class="nav-item " ><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
    
    <section class="section mt-5" style="padding-top: 50px;">
    <h2 style="color: #110549; padding-left:600px; padding-bottom:20px;">Beauticians</h2>
        <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection,"dd");
                $query = "select * from salon ";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
    
        <div class="container">
            <div class="row" style="background-color: #110549;border-radius: 20px;">
                <div class="col-md-2">
                    <div>
                    <img alt="Web Studio" class="img" src="image/default.png" height=180px" style="padding-top: 25px; padding-bottom: 20px;  border-radius: 50px;"/>
                    </div>
                </div>
                <div class="col-md-4 col-lg-10 ml-auto align-items-center mt-md-0" style="padding-bottom: 20px; "> <!--add d-flex to align vertically center -->
                    <div class="row">
                    <h2 style="color: #8AB9FF;"><?php echo $row["name"]?></h2><p class="card-text" style="padding-top: 15px; padding-left:20px">Status: <?php if($row["status"]==0){echo "<b>Available</b>";}else{echo "<b>Booked</b>";}?></p>
                    </div>
                    <p class="row">Whether you’re a full stack web developer, content author, or business professional – </p>
                    <h5>Services provided</h5>
                    <div class="row"><h3 style="color: #8AB9FF; padding-top:5px; padding-right:20px;">⭐4.5/5</h3><a href="admin/booking.php?rn=<?php echo $row['name'] . "&rt=a";?>" 
                    class="btn theme_btn_small button_hover <?php 
                    if($row["status"]==0){echo "active";}
                    else{echo "disabled";}?>"
                     role="button" aria-disabled="<?php
                      if($row['status']==0){echo "false";}
                      else{echo "true";}?>" style=" padding-top:7px; padding-right:30px;" >Book Now</a>
                      </div>
                    
                </div>
            </div>
        </div>
        <br></br>
        <?php 
                    }    
                ?>
        
        
    </section>
    </body>
    <!-- <style>
        .align-items-center {
  -ms-flex-align: center!important;
  align-items: center!important;
}
.d-flex {
  display: -ms-flexbox!important;
  display: flex!important;
}
    </style> -->

</html>