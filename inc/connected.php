<?php
$http = $_SERVER['REQUEST_URI'];
$http = strstr($http, "join");
if(strpos($http, '?') != false){
    $http = str_replace(strstr($http, "?"),'', $http);
}
if(!($http === "join/connected.php")){
    /* The settings are private | BY Rainbow */
    $hostname = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "join_devilz";


    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if(!$conn){
    //    die("Connection failed: ". mysqli_connect_error(). "Error NO: ". mysqli_connect_errno());
    }else{
        // echo "Connected";
    }
}else{
    exit(include('/404/index.php'));
}
?>
