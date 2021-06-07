<?php 
    
    session_start();
    $e_name=$_SESSION['emp'];
    $field=$_SESSION['field'];
$V=0;
?>

<!doctype html>
<html lang="en">
    <head>
        <link rel="icon" href="../image/favicon.png" type="image/png">
        <title>Home service provider</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="banner_area1">
    <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand logo_h" href="index.html"><img src="../image/Logo.png" alt=""></a>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="../index.php">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                            <li class="nav-item " ><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
    
        <section class="section mt-5" style="padding-top: 50px;">
        <h2 style="color: #110549; text-align:center; padding-bottom:20px;"><?php echo"$e_name" ?>'s Bookings</h2>
            <?php
               $connection = mysqli_connect("localhost","root","","dd");
                $query = "select * from $field where name='$e_name' ";
                $query_run = mysqli_query($connection,$query);
                $rows = mysqli_num_rows($query_run);



                while($row = mysqli_fetch_assoc($query_run)){
                    if($row['c_name']!=null){
                        $V+=$rows;
                        $a=$row['id'];
                        $c_name1 = $row['c_name'];
                        
                        $query2 = "select email from customers where username='$c_name1' ";
                        $query_run2 = mysqli_query($connection,$query2);
                        $row2 = mysqli_fetch_assoc($query_run2);
                        
                    ?>





                        <div class="container">
                       

                       <div class="row" style="background-color: #110549;border-radius: 20px;">
                        
                               <div style="width: 100%; padding-left:47%;">
                               <img alt="Web Studio" class="img" src="../image/default.png" height=180px style="padding-top: 25px; padding-bottom: 20px;  border-radius: 50px;"/>
                               </div>

                           <div class=" col-lg-8 ml-auto align-items-center " style="padding-bottom: 20px; "> 
                               <div class="table">
                                   <div style=" font-size:large; font-weight:500">
                                       <div style="width:100%; padding-left:0%;">
                                       <table >
                                           <tr>
                                               <td align="right">Service:</td>
                                               <td><?php echo $row["service"]; ?></td>
                                           </tr>
                                           <tr>
                                               <td align="right">Sub-service:</td>
                                               <td><?php echo $row["sub_service"]; ?></td>
                                           </tr>

                                           <tr>
                                               <td align="right">Address:</td>
                                               <td><?php echo $row["address"]; ?></td>
                                           </tr>
                                           
                                           <tr>
                                               <td align="right">Phone:</td>
                                               <td><?php echo $row["c_phone"]; ?></td>
                                           </tr>
                                           <tr>
                                               <td align="right">Email:</td>
                                               <td><?php echo $row2['email']; ?></td>
                                           </tr>
                                           <tr>
                                               <td >Booked date/time:</td>
                                               <td><?php echo $row["date"]; ?>,  <?php echo $row["time"]; ?></td>
                                           </tr>
                                       </table>
                                       <div class="row"><a class="btn theme_btn_small button_hover" role="button"
                            href="unbook.php?rn=<?php echo $row['id'] . "&rt=";
                                 echo sagar2($a)
                            ?>"
                            
                            >Service Completed</a></div>
                                       </div>
                                   </div>
                               </div>      

                 <?php 
                   }    
                


                   else{
                    echo "<h1 style='text-align:center;margin-top: 10vh;'>You do not have any service to be done. </h1>";
                   }    
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