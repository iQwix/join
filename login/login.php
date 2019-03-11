<?php
session_start();
include('../inc/connected.php');
if(isset($_SESSION['ip']) === true && !isset($_SESSION['login'])){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin page</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="../css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css-js/style.css" />
</head>
<body>
    <div class="container">
    <div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
                <form method="post">
                    <input type="text" name="user" placeholder="username">
                    <input type="password" name="password" placeholder="password">
                    <button type="submit" name="submit" class="btn btn-info btn-block login">Login</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $username = htmlentities(strip_tags(strtolower($_POST['user'])));
        $password = htmlentities(strip_tags(strtolower($_POST['password'])));
        if(!empty($username) and !empty($password)){
            if(
                @preg_replace("#[^a-z0-9]#i", "", $username) && @preg_replace("#[^a-z0-9]#i", "", $password) &&
                strpos($username, ' ') == false && strpos($password, ' ') == false &&
                strpos($username, "'") == false && strpos($password, "'") == false
            ){
                $sql = "SELECT username,password,permission FROM users WHERE username = ? and password = ?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    // code error
                }else{
                    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $resultCkeck = mysqli_stmt_num_rows($stmt);
                    if($resultCkeck > 0){
                        // code error
                    }else{
                        while($row = mysqli_fetch_assoc($result)){
                            if(mysqli_real_escape_string($conn, $row['permission']) === "Owner"){
                                $_SESSION['login'] = "Owner";
                                echo "ok Owner";
                                //code succss
                                header("Refresh:1");
                            }else if(mysqli_real_escape_string($conn, $row['permission']) === "admin"){
                                $_SESSION['login'] = "admin";
                                echo "ok admin";
                                //code succss
                                header("Refresh:1");
                            }else{
                                echo "null";
                            }
                        }
                    }
                }
            }
        }
    }
    ?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="css-js/main.js"></script>
</body>
</html>
<?php
}else{
    exit(include('../404/index.php'));
}
?>
