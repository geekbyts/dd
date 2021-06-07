<?php 
    session_start();
    
    $c_name=$_SESSION['user'];
    $empnme=$_SESSION['empusername'];
    $admne=$_SESSION['adminusername'];
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"dd");
    $query = "update $_GET[rt] set c_name = null, c_id = null, service = null,sub_service = null,c_phone = null,address = null,date = null,time = null,status = 0 where id = $_GET[rn]";
    $query_run = mysqli_query($connection,$query);
    if ($_SESSION = $c_name){
    header("location:booked.php");   
    }
    else if($_SESSION = $empnme){
        header("location:employee.php");  
    }
    else if($_SESSION = $admne){
        header("location:admin_dashboard.php");
    }
    else {

        header("location:../index.php");
    }

?>