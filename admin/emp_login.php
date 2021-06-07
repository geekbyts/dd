<?php
    session_start();
    if(isset($_POST['login'])){
        $host = "localhost";  
        $user = "root";  
        $password = '';  
        $db_name = "dd";  
        
        $con = mysqli_connect($host, $user, $password, $db_name);  
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }  
        
    // Check connection
    
        $username = $_POST['username'];  
        $_SESSION['empusername']=$_POST['username'];
        $password = $_POST['password'];  
        $field = $_POST['sub'];
        if($field == "-Select-"){
            echo "<script> alert('Please select your field'); </script>";
        }
        else{
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
    
        $sql = "select * from $field where name = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result);  
        $count = mysqli_num_rows($result);  

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_SESSION['emp'] = $_POST['username'];
            $_SESSION['field'] = $_POST['sub'];
		}


        if($count == 1){  
            echo "<script>
                            alert('Logged in successfully');
                            window.location.href='employee.php';
                        </script>"; 
        }  
        else{  
            echo "<script>alert('Login failed. Invalid username or password.')</script>";  
        } 
    }    
}
?>

<!doctype html>
<html lang="en">
<head> <link rel="stylesheet" href="../css/login_style.css"type="text/css">
<link rel="icon" href="../image/favicon.png" type="image/png">
        <title>Home Service Provider</title>
</head>
    <body >

        <br><br><br><br><br>
       
        <div class="box">
        <h2>Employee login</h2>
        <form action="" method="POST" >

            <div class="inputBox" >
                <input type="text" name="username" required  value="">
                <label>Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required value="" >
                <label>Password</label>
            </div>
             <div style="width:auto;size:inherit; padding-bottom: 10%;">
                
                    <select class="selectt" name="sub">
                        <option style="color:black;">-Select-</option>
                        <option style="color:black;">Salon</option>
                        <option style="color:black;">Carpentry</option>
                        <option style="color:black;">Cleaning</option>
                        <option style="color:black;">Electrician</option>
                    </select>
                
            </div>
            <div class="inp" align="center">
                <input type="submit" name="login" value="Sign In" align="center">
            </div>
            <div class="noacc" align="center">
                <p>Don't have an account? <a href="register.php">Sign up</a></p>
            </div>
	    </form>
        
        	</div>
        	
     

    </body>
</html>
