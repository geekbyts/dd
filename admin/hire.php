<?php
session_start();
$dummy = $_SESSION['adminusername'];
if( $dummy){
?>

<?php
    
    if(isset($_POST['signup'])){
        $id = filter_input(INPUT_POST, 'id');
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $conf_password = filter_input(INPUT_POST, 'confpassword');
        $phone = filter_input(INPUT_POST, 'phone');
        $field = filter_input(INPUT_POST, 'field');
     
        if (!empty($username)){
            if (!empty($password)){
                $host = "localhost";
                $dbusername = "root";
                $dbpassword = "";
                $dbname = "dd";
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()){
                    die('Connect Error ('. mysqli_connect_errno() .') '
                    . mysqli_connect_error());
                }
                else{
                      if($password!=$conf_password){
                        echo "<script>
                            alert('Passwords donot match');
                            window.location.href='register.php';
					    </script>";
                    }
                    else{
                          $sql = "INSERT INTO $field (id,name, password, phone )
                          values ('$id','$username','$password','$phone')";
                          if ($conn->query($sql)){
      
                          // header("Location: login.html");
                          echo "<script>
                              alert('Account created successfully');
                              window.location.href='list.php';
                          </script>";
                        }
                        else{
                            echo "Error: ". $sql ."
                            ". $conn->error;
                        }
                }
                $conn->close();
                }
            }
            else{
                echo "Password should not be empty";
                die();
            }
        }
        else{
            echo "Username should not be empty";
            die();
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <link rel="icon" href="../image/favicon.png" type="image/png">
        <title>Home Service Provider</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/register.css">
    </head>
    <body id="bdy">

        <br><br><br><br><br>
       
        <div class="box">
        <h2>Employee register</h2>
        <link rel="stylesheet" href="css/register.css">
        <form action="" method="POST" >
            <div class="inputBox" style="padding-bottom: 20px;">
                    <select class="form-control" style="background-color: transparent; color:white;" name="field">
                        <option style="color:black;">Salon</option>
                        <option style="color:black;">Carpentry</option>
                        <option style="color:black;">Cleaning</option>
                        <option style="color:black;">Electrician</option>
                    </select>
            </div>
            <div class="inputBox" >
                <input type="text" name="id" required  value="">
                <label>Employee Id</label>
            </div>
            <div class="inputBox" >
                <input type="text" name="username" required  value="">
                <label>Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required value="" >
                <label>Password</label>
            </div>
            <div class="inputBox">
                <input type="password" name="confpassword" required value="" >
                <label>Confirm Password</label>
            </div>
            <div class="inputBox" >
                <input type="text" name="phone" required  value="">
                <label>Phone</label>
            </div>
            
            <div class="inp" align="center">
                <input type="submit" name="signup" value="Register" align="center">
            </div>
            <br>
	    </form>
    
        
        
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

?>

