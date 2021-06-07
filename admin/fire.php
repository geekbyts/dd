<?php 
    session_start();
$dummy2 = $_SESSION['adminusername'];
if( $dummy2){

    $admin=$_SESSION['admin'];
    $id=$_SESSION['id'];
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"dd");
    if($_GET['rt'] == 'salon'){
    	$query = "delete from salon where id = $_GET[rn]";
    }
    if($_GET['rt'] == 'carpentry'){
    	$query = "delete from carpentry where id = $_GET[rn]";
    }
    if($_GET['rt'] == 'cleaning'){
    	$query = "delete from cleaning where id = $_GET[rn]";
    }
    if($_GET['rt'] == 'electrician'){
    	$query = "delete from electrician where id = $_GET[rn]";
    }
    $query_run = mysqli_query($connection,$query);
    if ($_SESSION = 'admin'){
    header("location:list.php");   
    }
}
else {
    echo "<script>
    alert('YOU ARE NOT AUTHORISED TO VIEW THIS PAGE');
    window.location.href='../index.php';
</script>";
}
?>