<?php 
 session_start();
 $v=0;
 $dummy3 = $_SESSION['adminusername'];
if(!empty($dummy3)){
?>

<!doctype html>
<html lang="en">
<head>
<link rel="icon" href="../image/favicon.png" type="image/png">
        <title>Home Service Provider</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
        <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
        <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
        
    </head>

    <body style="overflow-x: hidden;" >
        <!--================Header Area =================-->
        <header class="header_area" >
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="../index.php"><img src="../image/Logo.png" alt=""></a>
                   
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="../index.php">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="list.php">Employee list</a></li>
                            <li class="nav-item"><a class="nav-link" href="hire.php">Hire</a></li>
                            <li class="nav-item"><a class="nav-link" href="fire.php">Fire</a></li>
                            
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
        <!--================Header Area Finish=================-->
        <br><br><br>

       	
       	
       <br><br>
       <div style="width:auto;padding:1%; ">

        <div class="row">
        	<div class="col-md-12">
                <table class="table">
                    <?php 
                    
                    $connection = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($connection,"dd");
                    $query = "select * from salon where status = 1 union select * from carpentry where status = 1 union select * from cleaning where status = 1 union select * from electrician where status = 1;";
                    $query_run = mysqli_query($connection,$query);
                    $count=mysqli_num_rows($query_run);
                    if ($count!=null) {
                    ?>
                <thead>
                        <tr>
                            <!-- <th>S.No</th> -->
                            <th>User Name</th>
                            <th>User ID</th>
                            <th>User Mobile</th>
                            <th>Service</th>
                            <th>Sub Service</th>
                            <th>Employee Id</th>
                            <th>Employee name</th>
                            <th>User Address</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Unbook</th>
                        </tr> 

                    </thead>
        		<?php 
                    }

                    while($row = mysqli_fetch_assoc($query_run)){
                        
                        if($row){
                           $v+=1;
                        $a = $row['id'];
                        ?>
                            <tr>
                                

                            
                                <td><?php echo $row['c_name'];?></td>
                                <td><?php echo $row['c_id'];?></td>
                                <td><?php echo $row['c_phone'];?></td>
                                <td><?php echo $row['service'];?></td>
                                <td><?php echo $row['sub_service'];?></td>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['address'];?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['time'];?></td>
                                <td><a  href="unbook.php?rn=<?php echo $row['id'] . "&rt=";echo sagar2($a)?>" style="padding-top: 0px; padding-bottom: 0px;" class="btn btn-danger role="button" ?> Unbook</a></td>
                            </tr>
                            
                        <?php
                    }
                    
                    }
                if($v==0){

                    echo "<h1 style='text-align:center;margin-top: 10vh;'>No services have been booked </h1>";
                }
                else{
                   echo "<h3 style='text-align:center;padding-bottom:1cm' >Booked Users Details</h3>";
                }
            
                    ?>
                    
                   
               
            </table>
            
        	</div>
        </div></div>
        <br><br><br><br><br><br>        
        
    </body>
</html>
<?php
}
else {
    echo "<script>
    alert('YOU ARE NOT AUTHORISED TO VIEW THIS PAGE');
    window.location.href='../index.php';
</script>";
}
        function sagar2($a){

            if(($a >= ('99')) &&  ($a<= ('199'))  ){
                echo "salon";
            }
            elseif(($a >= ('200')) &&  ($a<= ('299'))  ){
                echo "Carpentry";
            }
            elseif(($a>= ('300')) &&  ($a<= ('399'))  ){
                echo "Cleaning";
            }
            elseif(($a >= ('400')) &&  ($a<= ('499'))  ){
                echo "Electrician";
            }
                else {
                    echo "idk bruh";
                }
            
        }

        ?>
