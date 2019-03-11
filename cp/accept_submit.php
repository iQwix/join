<?php
session_start();
include('../inc/connected.php');
if(isset($_SESSION['login']) == "Owner" or isset($_SESSION['login']) == "admin"){
if(isset($_SESSION['accept'])){
$sql = "UPDATE `register` SET `status`=1 WHERE `id` = ".$_SESSION['accept'];
if(mysqli_query($conn, $sql)){
    $_SESSION['accept'] = null;
    include('index.php');
}
}else{
    include('../404/index.php');
}
?>
<?php
mysqli_close($conn);
}else{
    exit(include_once('../404/index.php'));
}
?>
