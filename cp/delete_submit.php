<?php
session_start();
include("../inc/connected.php");
if(isset($_SESSION['login']) == "Owner" or isset($_SESSION['login']) == "admin"){
?>
<?php
if($_SESSION['run'] === 'ow'){
    $_SESSION['status_in'] = "overwatch-team";
}elseif($_SESSION['run'] === 'r6s'){
    $_SESSION['status_in'] = "r6s-team";
}elseif($_SESSION['run'] === 'fortnite'){
    $_SESSION['status_in'] = "fortnite-team";
}elseif($_SESSION['run'] === 'rl'){
    $_SESSION['status_in'] = "rocket-league-team";
}elseif($_SESSION['run'] === 'programmer'){
    $_SESSION['status_in'] = "programmer";
}elseif($_SESSION['run'] === 'designer'){
    $_SESSION['status_in'] = "designer";
}elseif($_SESSION['run'] === 'editor'){
    $_SESSION['status_in'] = "editor";
}else{

    include('../404/index.php');
}
$sql6 = "DELETE FROM `".$_SESSION['status_in']."` WHERE `username` = '".$_SESSION['users']."'";
if(mysqli_query($conn, $sql6)){
    $sql7 = "SET @autoid :=0";
    $sql8 = "UPDATE `".$_SESSION['status_in']."` SET `id` = @autoid := (@autoid+1)";
    $sql9 = "alter table `".$_SESSION['status_in']."` Auto_increment = 1";
    if(mysqli_query($conn, $sql7) && mysqli_query($conn, $sql8) && mysqli_query($conn, $sql9)){
        $sql = "DELETE FROM `register` WHERE `id` = '".$_SESSION['delete']."'";
        $result5 = mysqli_query($conn, $sql);
        if(empty(@mysqli_num_rows($result5))){
            $sql3 = "SET @autoid :=0";
            $sql4 = "UPDATE `register` SET `id` = @autoid := (@autoid+1)";
            $sql5 = "alter table `register` Auto_increment = 1";
            if(mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4) && mysqli_query($conn, $sql5)){
                echo("<script>location.href = 'index.php';</script>");
                $_SESSION['status_in'] = null;
                $_SESSION['users'] = null;
                $_SESSION['run'] = null;
                $_SESSION['delete'] = null;
            }
        }
    }
}
?>
<?php
mysqli_close($conn);
}else{
    exit(include_once('../404/index.php'));
}
?>
