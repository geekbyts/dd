<?php 
 session_start();
 $dummy2 = $_SESSION['adminusername'];
if( $dummy2){

?>
<!doctype html>
<html lang="en">
<head>
        <link rel="icon" href="../image/favicon.png" type="image/png">
        <title>Home Service Provider</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/register.css">
    </head>
        <header class="header_area" >
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand logo_h" href="../index.php"><img src="../image/Logo.png" alt=""></a>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="../index.php">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="hire.php">Hire</a></li>
                            
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
    <body>
            
       
        <div class="row">
       	<div class="col-md-12" style="padding-top: 60px;">
       		<center><h3>Employee List</h3></center>
        </div>
        </div>
       </div><br><br>
        <div class="row">
        	<div class="col-md-12">
                <table class="table" style="font-size: large;text-align: center;">
                    <thead>
                        <tr>
                            <th>Employee Id</th>
                            <th>Employee name</th>
                            <th>Field</th>
                            <th>Phone</th>
                            <th>Unemploy</th>
                        </tr> 
                    </thead>
                    
        		<?php 
                    
                    $connection = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($connection,"dd");
                    $query = "select * from salon union select * from carpentry union select * from cleaning union select * from electrician ";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php $a = $row['id']; echo sagar2($a) ?></td>
                                <td><?php echo $row['phone'];?></td>
                                <td><a style="padding-top: 0px; padding-bottom: 0px;" class="btn btn-danger role="button"

                                href="fire.php?rn=<?php echo $row['id'] . "&rt=";
                                 echo sagar2($a)
                                 
                                 ?>"
                                        
                                 > Fire</a></td>
                            </tr>
                            
                        <?php

                    } ?> 

            </table>
        	</div>
        </div>
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

