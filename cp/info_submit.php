<?php
session_start();
include_once('../inc/connected.php');
if(isset($_SESSION['login']) == "Owner" or isset($_SESSION['login']) == "admin"){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <?php
    if($_SESSION['run'] === 'ow'){
        $_SESSION['status_in'] = "overwatch-team";
        $_SESSION['query'] = "SELECT `username`,`Battle/PS4/xBox/ID`,`your-sr`,`your-level`,`your-main`,`platform`,`date` FROM `overwatch-team` WHERE `username` = '".$_SESSION['users']."'";
    }elseif($_SESSION['run'] === 'r6s'){
        $_SESSION['status_in'] = "r6s-team";
        $_SESSION['query'] = "SELECT `username`,`Steam/Uplay/PS4/xBox-ID`,`your-rank`,`your-level`,`platform`,`date` FROM `r6s-team` WHERE `username` = '".$_SESSION['users']."'";
    }elseif($_SESSION['run'] === 'fortnite'){
        $_SESSION['status_in'] = "fortnite-team";
        $_SESSION['query'] = "SELECT `username`,`Epic-ID`,`Your-Kills`,`Your-Wins`,`Your-K/D`,`date` FROM `fortnite-team` WHERE `username` = '".$_SESSION['users']."'";
    }elseif($_SESSION['run'] === 'rl'){
        $_SESSION['status_in'] = "rocket-league-team";
        $_SESSION['query'] = "SELECT `username`,`Steam/PS4/xBox-ID`,`Your-Level`,`Platform`,`Your-Rank-in-1v1-Solo-Duel`,`Your-Rank-in-2v2-Doubles`,`Your-Rank-in-3v3-Standard`,`Your-Rank-in-3v3-Solo-Standard`,`date` FROM `rocket-league-team` WHERE `username` = '".$_SESSION['users']."'";
    }elseif($_SESSION['run'] === 'programmer'){
        $_SESSION['status_in'] = "programmer";
        $_SESSION['query'] = "SELECT `username`,`text`,`date` FROM `programmer` WHERE `username` = '".$_SESSION['users']."'";
    }elseif($_SESSION['run'] === 'designer'){
        $_SESSION['status_in'] = "designer";
        $_SESSION['query'] = "SELECT `username`,`text`,`date` FROM `designer` WHERE `username` = '".$_SESSION['users']."'";
    }elseif($_SESSION['run'] === 'editor'){
        $_SESSION['status_in'] = "editor";
        $_SESSION['query'] = "SELECT `username`,`text`,`date` FROM `editor` WHERE `username` = '".$_SESSION['users']."'"";
    }
    ?>
    <title>Info</title>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <style>
        body{
            background-color: #555;
        }
        .selected{
            background-color: #222;
            color: #ccc;
            width: 300px;
            border-radius: 10px;
            padding: 10px;
            margin: 15px;
        }
        .selected:hover{
            background-color: #111;
        }
        .selected1{
        }
        .heading{
            padding: 25px;
            background-color: #111;
            color: #fff;
            text-transform: capitalize;
            border-radius: 5px;
            letter-spacing: 5px
        }
    </style>
</head>
<body>
<?php
//$name_id_selected = null;
if($_GET[$_SESSION['users']]){
    if($_GET[$_SESSION['users']] == 1){
?>
<div class="container">
    <h1 class="text-center heading"><?php echo $_SESSION['status_in']; ?></h1>
<?php
        $query5 = "SELECT `name`,`email`,`Country`,`age`,`twitter`,`instagram`,`status` FROM `register` WHERE `name` = '".$_SESSION['users']."' LIMIT 1";
        $result5 = mysqli_query($conn, $query5);
        if (mysqli_num_rows($result5) > 0) {
            while($row5 = mysqli_fetch_assoc($result5)){
                $result10 = mysqli_query($conn, $_SESSION['query']);
                if(mysqli_num_rows($result10) > 0){
                    while($roww = mysqli_fetch_assoc($result10)){
                        echo "<div class='row'><div class='col-lg-4'><ul class='list-group'>";
                        foreach($roww as $key => $rows){
                            echo "<li class='selected list-group-item'><span'>{$key}</span> <span class='text-center'> > <span> <br> <span style='margin-left: 80px'>$rows</span></li>";
                        }
                        echo "</ul></div><div class='col-lg-4'>";
                        echo "<form method=\"post\"><input type='submit' name='d-".$_SESSION['info']."' class=\"text-conter btn btn-danger\" value='Delete'>";
                        if(mysqli_real_escape_string($conn, $row5['status']) == 0){
                            echo "<input type=\"submit\" style='margin: 30px 0 30px 70px' name='a-".$_SESSION['info']."' class=\"text-conter btn btn-success\" value='Accepet Acceunt' />";
                        }
                        echo"</form>";
                        $delete = "d-".$_SESSION['info'];
                        $accept_isset = "a-".$_SESSION['info'];
                        if(isset($_POST[$delete])){
                            echo("<script>location.href = 'delete_submit.php';</script>");
                        }
                        if(isset($_POST[$accept_isset])){
                            echo("<script>location.href = 'accept_submit.php';</script>");
                         }
                        echo "</div><div class='col-lg-4'><ul class='list-group'>";
                        foreach($row5 as $key1 => $rows1){
                            echo "<li class='selected list-group-item'><span'>{$key1}</span> <span class='text-center'> > <span> <br> <span style='margin-left: 80px'>$rows1</span></li>";
                        }

                    }
                }
            }
        }else{
            echo "Error:";
        }
    }else{
         exit(include('../404/index.php'));
    }
}else{
     exit(include('../404/index.php'));
}
?>
</div>
</body>
</html>
<?php
mysqli_close($conn);
}else{
    exit(include_once('../404/index.php'));
}
?>
