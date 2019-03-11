<?php
session_start();
include('../../inc/connected.php');
if(isset($_SESSION['login']) == "Owner"){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Untitled Document</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
    <section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>info Account</th>
                                <th>Accepted</th>
                            </tr>
                        </thead>
                    </div>
                        <tbody>
                            <form method="post">
                        <?php
                            $query = "SELECT `id`,`name`,`Joinas`,`status` FROM `register` WHERE 1";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    if(mysqli_real_escape_string($conn,  $row['status']) == 1){
                                        echo "
                                        <div class='col-lg-6'>
                                            <tr>
                                                <td>".mysqli_real_escape_string($conn,  $row['id'])."</td>
                                                <td>".mysqli_real_escape_string($conn,  $row['name'])."</td>
                                                <td><input type=\"submit\" name='i-".mysqli_real_escape_string($conn,  $row['id'])."' class=\"btn btn-info\" value='Info' /></td>
                                                <td><input type=\"submit\" name='ed-".mysqli_real_escape_string($conn,  $row['id'])."' class=\"btn btn-info\" value='Accepted!' /></td>
                                            </tr>
                                        </div>
                                        ";
                                        $info_submit = "i-".mysqli_real_escape_string($conn,  $row['id']);
                                        $accepted = "ed-".mysqli_real_escape_string($conn,  $row['id']);
                                        if(isset($_POST[$info_submit])){
                                            $_SESSION['info'] = mysqli_real_escape_string($conn,  $row['id']);
                                            $_SESSION['run'] = mysqli_real_escape_string($conn,  $row['Joinas']);
                                            $_SESSION['users'] = mysqli_real_escape_string($conn,  $row['name']);
                                            $_SESSION['delete'] = mysqli_real_escape_string($conn,  $row['id']);
                                            $_SESSION['accept'] = mysqli_real_escape_string($conn,  $row['id']);
                                            echo("<script>location.href = '../info_submit.php?".mysqli_real_escape_string($conn,  $row['name'])."=1';</script>");
                                        }
                                        if(isset($_POST[$accepted])){
                                            $sqled = "UPDATE `register` SET `status`=2 WHERE `id` = ".mysqli_real_escape_string($conn,  $row['id']);
                                            mysqli_query($conn, $sqled);
                                            header("Refresh:1");
                                        }
                                    }
                                }
                            }

                        ?>
                                <?php
                            $query = "SELECT `id`,`name`,`Joinas`,`status` FROM `register` WHERE 1";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    if(mysqli_real_escape_string($conn,  $row['status']) == 2){
                                        echo "
                                        <div class='col-lg-6'>
                                            <tr>
                                                <td class='btn-warning'>".mysqli_real_escape_string($conn,  $row['id'])."</td>
                                                <td>".mysqli_real_escape_string($conn,  $row['name'])."</td>
                                                <td><input type=\"submit\" name='i-".mysqli_real_escape_string($conn,  $row['id'])."' class=\"btn btn-info\" value='Info' /></td>
                                                <td>OK!</td>
                                            </tr>
                                        </div>
                                        ";
                                        $info_submit = "i-".mysqli_real_escape_string($conn,  $row['id']);
                                        $accepted = "ed-".mysqli_real_escape_string($conn,  $row['id']);
                                        if(isset($_POST[$info_submit])){
                                            $_SESSION['info'] = mysqli_real_escape_string($conn,  $row['id']);
                                            $_SESSION['run'] = mysqli_real_escape_string($conn,  $row['Joinas']);
                                            $_SESSION['users'] = mysqli_real_escape_string($conn,  $row['name']);
                                            $_SESSION['delete'] = mysqli_real_escape_string($conn,  $row['id']);
                                            $_SESSION['accept'] = mysqli_real_escape_string($conn,  $row['id']);
                                            echo("<script>location.href = '../info_submit.php?".mysqli_real_escape_string($conn,  $row['name'])."=1';</script>");
                                        }
                                    }
                                }
                            }
                        ?>
                            </form>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
<?php
}else{
    exit(include_once('../../404/index.php'));
}
?>
