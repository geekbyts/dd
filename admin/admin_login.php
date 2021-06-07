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
        $username = $_POST['username']; 
          $_SESSION['adminusername'] = $_POST['username']; 

        $password = $_POST['password'];  
    
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
    
        $sql = "select * from admin where name = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result);  
        $count = mysqli_num_rows($result);  

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$_SESSION['admin'] = $_POST['username'];
		}


        if($count == 1){  
            echo "<script>
                            alert('Logged in successfully');
                            window.location.href='admin_dashboard.php';
                        </script>"; 
        }  
        else{  
            echo "<script>alert('Login failed. Invalid username or password.')</script>";  
        }     
}
?>

<!doctype html>
<html lang="en">  
    

<head> <link rel="stylesheet" href="../css/login_style.css"type="text/css">
  
<link rel="icon" href="../image/favicon.png" type="image/png">
        <title>Admin Login</title>
</head>
    <body>
       
    
        <br><br><br><br><br>
       
        <div class="box">
        <h2>Admin Login</h2>
        
        <form action="" method="POST">
            <div class="inputBox" >
                <input type="text" name="username" required  value="">
                <label>Username</label> 
            </div>

            <div class="inputBox">
                <input type="password" name="password" required value="" >
                <label>Password</label>
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