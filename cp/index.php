<?php
session_start();
include("../inc/connected.php");
if(isset($_SESSION['login']) == "Owner" or isset($_SESSION['login']) == "admin"){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gsonsksa</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/table.css" />
    <style>
        .img1{
            width: 40px
        }
    </style>
</head>
<body>
    <div class="container text-center" style="margin-top: 40px">
        <div id="myBtnContainer">
          <button class="btn active" onclick="filterSelection('all')"> Show all</button>
          <button class="btn" onclick="filterSelection('games')" style="margin-left: 20px"> Games</button>
          <button class="btn" onclick="filterSelection('programmer')"> Progammers</button>
          <button class="btn" onclick="filterSelection('designer')"> Designer</button>
          <button class="btn" onclick="filterSelection('editer')">Editer</button>
            <?php
            if($_SESSION['login'] == "Owner"){
            ?>
                <a class="btn btn-info" href="accepted/">Accepted</a>
            <?php
            }
            ?>
            <form method="post" style="display: inline-block">
                <button class="btn btn-info" name='loggout'>Loggout</button>
            </form>
            <?php
            if(isset($_POST['loggout'])){
                $_SESSION['login'] = null;
                header("Refresh:1");
            }
            ?>
        </div>
    </div>

    <div class="table">

        <div class="container" style="margin-top: 40px">
            <!-- Control buttons -->

              <div class="filterDiv games">

                  <h2 class="filterDiv all">Table All</h2><hr class="filterDiv all" />
                  <h2>Table Games</h2>

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Age</th>
                        <th>Joinas</th>
                        <th>info Acceunt</th>
                        <th>Accepet Acceunt</th>
                        <th>Delete Acceunt</th>
                      </tr>
                        <form method="post">
                        <?php
                         $query = "SELECT `id`,`name`,`email`,`Country`,`age`,`Joinas`,`status` FROM `register` WHERE 1";
                         $result = mysqli_query($conn, $query);
                         $_SESSION['all'] = mysqli_num_rows($result);
                         if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                $games = mysqli_real_escape_string($conn, $row['Joinas']);
                                 if($games === "r6s" or $games === "rl" or $games === "ow" or $games === "fortnite"){
                                     if(mysqli_real_escape_string($conn, $row['status']) == 0){
                                         echo "
                                         <tr>
                                         <td>".mysqli_real_escape_string($conn, $row['name'])."</td>
                                         <td>".mysqli_real_escape_string($conn, $row['email'])."</td>
                                         <td><i class='glyphicon glyphicon-user'>".mysqli_real_escape_string($conn, $row['Country'])."</i></td>

                                         <td>".mysqli_real_escape_string($conn, $row['age'])."</td>
                                         <td>".mysqli_real_escape_string($conn, $row['Joinas'])."</td>
                                         <td><input type=\"submit\" name='i-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-info\" value='Info' /></td>
                                         <td><input type=\"submit\" name='a-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-success\" value='Accepet Acceunt'></td>
                                         <td><input type='submit' name='d-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-danger\" value='Delete'></td></tr>
                                         ";
                                         $delete_isset = "d-".mysqli_real_escape_string($conn, $row['id']);
                                         $info_isset = "i-".mysqli_real_escape_string($conn, $row['id']);
                                         $accept_isset = "a-".mysqli_real_escape_string($conn, $row['id']);
                                         echo $accept_isset;
                                         if(isset($_POST[$info_isset])){
                                             $_SESSION['info'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['run'] = mysqli_real_escape_string($conn, $row['Joinas']);
                                             $_SESSION['users'] = mysqli_real_escape_string($conn, $row['name']);
                                             $_SESSION['delete'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['accept'] = mysqli_real_escape_string($conn, $row['id']);
                                             echo("<script>location.href = 'info_submit.php?".$_SESSION['users']."=1';</script>");
                                         }
                                         if(isset($_POST[$delete_isset])){
                                             $_SESSION['delete'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['run'] = mysqli_real_escape_string($conn, $row['Joinas']);
                                             $_SESSION['users'] = mysqli_real_escape_string($conn, $row['name']);
                                             echo("<script>location.href = 'delete_submit.php';</script>");
                                         }
                                         if(isset($_POST[$accept_isset])){
                                             $_SESSION['accept'] = mysqli_real_escape_string($conn, $row['id']);
                                             echo("<script>location.href = 'accept_submit.php';</script>");
                                         }

                                     }
                                 }
                            }
                         }else{
                            echo "No records";
                         }
                         ?>
                        </form>
                      </thead>
                  </table>
              </div>




              <div class="filterDiv programmer">
                  <h2>Table Programmers</h2>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Age</th>
                        <th>info Acceunt</th>
                        <th>Accepet Acceunt</th>
                        <th>Delete Acceunt</th>
                      </tr><form method="post">
                        <?php
                         $query = "SELECT `id`,`name`,`email`,`Country`,`age`,`Joinas`,`status` FROM `register` WHERE 1";
                         $result = mysqli_query($conn, $query);
                         if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                $games = mysqli_real_escape_string($conn, $row['Joinas']);
                                 if($games === "programmer"){
                                     if(mysqli_real_escape_string($conn, $row['status']) == 0){
                                         echo "
                                         <tr>
                                         <td>".mysqli_real_escape_string($conn, $row['name'])."</td>
                                         <td>".mysqli_real_escape_string($conn, $row['email'])."</td>
                                         <td><i class='glyphicon glyphicon-user'>".mysqli_real_escape_string($conn, $row['Country'])."</i></td>
                                         <td>".mysqli_real_escape_string($conn, $row['age'])."</td>
                                         <td><input type=\"submit\" name='i-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-info\" value='Info' /></td>
                                         <td><input type=\"submit\" name='a-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-success\" value='Accepet Acceunt' /></td>
                                           <td><input type='submit' type=\"button\" name='d-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-danger\" value='Delete'></td></tr>
                                         ";
                                         $delete_isset = "d-".mysqli_real_escape_string($conn, $row['id']);
                                         $info_isset = "i-".mysqli_real_escape_string($conn, $row['id']);
                                         $accept_isset = "a-".mysqli_real_escape_string($conn, $row['id']);
                                         if(isset($_POST[$info_isset])){
                                             $_SESSION['info'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['run'] = mysqli_real_escape_string($conn, $row['Joinas']);
                                             $_SESSION['users'] = mysqli_real_escape_string($conn, $row['name']);
                                             $_SESSION['delete'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['accept'] = mysqli_real_escape_string($conn, $row['id']);
                                             echo("<script>location.href = 'info_submit.php?".mysqli_real_escape_string($conn, $row['name'])."=1';</script>");
                                         }
                                         if(isset($_POST[$delete_isset])){
                                             $_SESSION['delete'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['run'] = mysqli_real_escape_string($conn, $row['Joinas']);
                                             $_SESSION['users'] = mysqli_real_escape_string($conn, $row['name']);
                                             echo("<script>location.href = 'delete_submit.php';</script>");
                                         }
                                         if(isset($_POST[$accept_isset])){
                                             $_SESSION['accept'] = mysqli_real_escape_string($conn, $row['id']);
                                             echo("<script>location.href = 'accept_submit.php';</script>");
                                         }
                                     }
                                 }
                            }
                         }else{
                            echo "No records";
                         }
                         ?>
                        </form>
                  </table>
              </div>

                  <div class="filterDiv designer">
                  <h2>Table Designer</h2>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Age</th>
                        <th>info Acceunt</th>
                        <th>Accepet Acceunt</th>
                        <th>Delete Acceunt</th>
                      </tr>
                        <form method="post">
                         <?php
                         $query = "SELECT `id`,`name`,`email`,`Country`,`age`,`Joinas`,`status` FROM `register` WHERE 1";
                         $result = mysqli_query($conn, $query);
                         if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                $games = mysqli_real_escape_string($conn, $row['Joinas']);
                                 if($games === "designer"){
                                     if(mysqli_real_escape_string($conn, $row['status']) == 0){
                                         echo "
                                         <tr>
                                         <td>".mysqli_real_escape_string($conn, $row['name'])."</td>
                                         <td>".mysqli_real_escape_string($conn, $row['email'])."</td>
                                         <td><i class='glyphicon glyphicon-user'>".mysqli_real_escape_string($conn, $row['Country'])."</i></td>

                                         <td>".mysqli_real_escape_string($conn, $row['age'])."</td>
                                         <td><input type=\"submit\" name='i-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-info\" value='Info' /></td>
                                         <td><input type=\"submit\" value='Accepet Acceunt' class=\"btn btn-success\" name='a-".mysqli_real_escape_string($conn, $row['id'])."' value='Accepet Acceunt'></td>
                                         <td><input type='submit' type=\"button\" name='d-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-danger\" value='Delete'></td></tr>
                                         ";
                                         $delete_isset = "d-".mysqli_real_escape_string($conn, $row['id']);
                                         $info_isset = "i-".mysqli_real_escape_string($conn, $row['id']);
                                         $accept_isset = "a-".mysqli_real_escape_string($conn, $row['id']);
                                         if(isset($_POST[$info_isset])){
                                             $_SESSION['info'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['run'] = mysqli_real_escape_string($conn, $row['Joinas']);
                                         $_SESSION['users'] = mysqli_real_escape_string($conn, $row['name']);
                                             $_SESSION['delete'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['accept'] = mysqli_real_escape_string($conn, $row['id']);
                                             echo("<script>location.href = 'info_submit.php?".mysqli_real_escape_string($conn, $row['name'])."=1';</script>");
                                         }
                                         if(isset($_POST[$delete_isset])){
                                             $_SESSION['delete'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['run'] = mysqli_real_escape_string($conn, $row['Joinas']);
                                             $_SESSION['users'] = mysqli_real_escape_string($conn, $row['name']);
                                             echo("<script>location.href = 'delete_submit.php';</script>");
                                         }
                                         if(isset($_POST[$accept_isset])){
                                             $_SESSION['accept'] = mysqli_real_escape_string($conn, $row['id']);
                                             echo("<script>location.href = 'accept_submit.php';</script>");
                                         }
                                     }
                                 }
                            }
                         }else{
                            echo "No records";
                         }
                         ?>
                        </form>
                  </table>
              </div>


                <div class="filterDiv editer">
                  <h2>Table Editer</h2>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Age</th>
                        <th>info Acceunt</th>
                        <th>Accepet Acceunt</th>
                        <th>Delete Acceunt</th>
                      </tr>
                        <form method="post">
                         <?php
                         $query = "SELECT `id`,`name`,`email`,`Country`,`age`,`Joinas`,`status` FROM `register` WHERE 1";
                         $result = mysqli_query($conn, $query);
                         if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                $games = mysqli_real_escape_string($conn, $row['Joinas']);
                                 if($games === "editor"){
                                     if(mysqli_real_escape_string($conn, $row['status']) == 0){
                                         echo "
                                         <tr>
                                         <td>".mysqli_real_escape_string($conn, $row['name'])."</td>
                                         <td>".mysqli_real_escape_string($conn, $row['email'])."</td>
                                         <td><i class='glyphicon glyphicon-user'>".mysqli_real_escape_string($conn, $row['Country'])."</i></td>

                                         <td>".mysqli_real_escape_string($conn, $row['age'])."</td>
                                         <td><input type=\"submit\" name='i-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-info\" value='Info' /></td>
                                         <td><input type=\"submit\" name='a-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-success\" value='Accepet Acceunt' / ></td>
                                         <td><input type='submit' type=\"button\" name='d-".mysqli_real_escape_string($conn, $row['id'])."' class=\"btn btn-danger\" value='Delete'></td></tr>
                                         ";
                                         $delete_isset = "d-".mysqli_real_escape_string($conn, $row['id']);
                                         $info_isset = "i-".mysqli_real_escape_string($conn, $row['id']);
                                         $accept_isset = "a-".mysqli_real_escape_string($conn, $row['id']);
                                         if(isset($_POST[$info_isset])){
                                             $_SESSION['info'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['run'] = mysqli_real_escape_string($conn, $row['Joinas']);
                                             $_SESSION['users'] = mysqli_real_escape_string($conn, $row['name']);
                                             $_SESSION['delete'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['accept'] = mysqli_real_escape_string($conn, $row['id']);
                                             echo("<script>location.href = 'info_submit.php?".mysqli_real_escape_string($conn, $row['name'])."=1';</script>");
                                         }
                                         if(isset($_POST[$delete_isset])){
                                             $_SESSION['delete'] = mysqli_real_escape_string($conn, $row['id']);
                                             $_SESSION['run'] = mysqli_real_escape_string($conn, $row['Joinas']);
                                             $_SESSION['users'] = mysqli_real_escape_string($conn, $row['name']);
                                             echo("<script>location.href = 'delete_submit.php';</script>");
                                         }
                                         if(isset($_POST[$accept_isset])){
                                             $_SESSION['accept'] = mysqli_real_escape_string($conn, $row['id']);
                                             echo("<script>location.href = 'accept_submit.php';</script>");
                                         }
                                     }
                                 }
                            }
                         }else{
                            echo "No records";
                         }
                         ?>
                        </form>
                  </table>
              </div>
                <!-- all items -->
                <div class="filterDiv all text-center" style="margin: 100px auto 0;" style="width: 18rem;">
                    <img class="card-img-top" style="width: 100px" src="img/all_item.png" alt="Card image all">
                    <div class="card-body">
                        <h2 class="card-title">جميع العضاء المسجليين</h2>
                        <h4 class="card-text"><?php echo '( '.$_SESSION['all'].' )'; ?></h4>
                    </div>
                </div>
                <!-- games item -->
                <div class="row">
                    <div class="text-center filterDiv games col-lg-3" style="margin: 90px auto 0;" style="width: 18rem;">
                        <img class="card-img-top" style="width: 100px" src="img/overwatch.png" alt="Card image all">
                        <div class="card-body">
                            <h2 class="card-title">Overwatch</h2>
                            <?php
                                $item = "SELECT `id` FROM `overwatch-team` WHERE 1";
                                $result_item = mysqli_query($conn, $item);
                                $item_run = mysqli_num_rows($result_item);
                            ?>
                            <h4 class="card-text"><?php echo '( '.$item_run.' )'; ?></h4>
                        </div>
                     </div>
                    <div class="text-center filterDiv games col-lg-3" style="margin: 90px auto 0;" style="width: 18rem;">
                        <img class="card-img-top" style="width: 100px" src="img/r6s.png" alt="Card image all">
                        <div class="card-body">
                            <h2 class="card-title">Rainbow Six Siege</h2>
                            <?php
                                $item = "SELECT `id` FROM `r6s-team` WHERE 1";
                                $result_item = mysqli_query($conn, $item);
                                $item_run = mysqli_num_rows($result_item);
                            ?>
                            <h4 class="card-text"><?php echo '( '.$item_run.' )'; ?></h4>
                        </div>
                     </div>
                    <div class="text-center filterDiv games col-lg-3" style="margin: 90px auto 0;" style="width: 18rem;">
                        <img class="card-img-top" style="width: 100px" src="img/Fortnite.png" alt="Card image all">
                        <div class="card-body">
                            <h2 class="card-title">Fortnite</h2>
                            <?php
                                $item = "SELECT `id` FROM `fortnite-team` WHERE 1";
                                $result_item = mysqli_query($conn, $item);
                                $item_run = mysqli_num_rows($result_item);
                            ?>
                            <h4 class="card-text"><?php echo '( '.$item_run.' )'; ?></h4>
                        </div>
                     </div>
                    <div class="text-center filterDiv games col-lg-3" style="margin: 90px auto 0;" style="width: 18rem;">
                        <img class="card-img-top" style="width: 100px" src="img/Rocket.png" alt="Card image all">
                        <div class="card-body">
                            <h2 class="card-title">Rocket League</h2>
                            <?php
                                $item = "SELECT `id` FROM `rocket-league-team` WHERE 1";
                                $result_item = mysqli_query($conn, $item);
                                $item_run = mysqli_num_rows($result_item);
                            ?>
                            <h4 class="card-text"><?php echo '( '.$item_run.' )'; ?></h4>
                        </div>
                     </div>
                </div>
                <div class="row">
                    <!-- programmer itme -->
                    <div class="filterDiv programmer text-center col-lg-4" style="margin: 100px auto;" style="width: 18rem;">
                        <img class="card-img-top" style="width: 100px" src="img/programmers.png" alt="Card image all">
                        <div class="card-body">
                            <h2 class="card-title">Programmers</h2>
                            <?php
                                $item = "SELECT `id` FROM `programmer` WHERE 1";
                                $result_item = mysqli_query($conn, $item);
                                $item_run = mysqli_num_rows($result_item);
                            ?>
                            <h4 class="card-text"><?php echo '( '.$item_run.' )'; ?></h4>
                        </div>
                     </div>
                    <!-- designer itme -->
                    <div class="filterDiv designer text-center col-lg-4" style="margin: 100px auto;" style="width: 18rem;">
                        <img class="card-img-top" style="width: 100px" src="img/designers.png" alt="Card image all">
                        <div class="card-body">
                            <h2 class="card-title">Designers</h2>
                            <?php
                                $item = "SELECT `id` FROM `designer` WHERE 1";
                                $result_item = mysqli_query($conn, $item);
                                $item_run = mysqli_num_rows($result_item);
                            ?>
                            <h4 class="card-text"><?php echo '( '.$item_run.' )'; ?></h4>
                        </div>
                     </div>
                    <!-- editor itme -->
                    <div class="filterDiv editer text-center col-lg-4" style="margin: 100px auto;" style="width: 18rem;">
                        <img class="card-img-top" style="width: 100px" src="img/editors.png" alt="Card image all">
                        <div class="card-body">
                            <h2 class="card-title">Editors</h2>
                            <?php
                                $item = "SELECT `id` FROM `editor` WHERE 1";
                                $result_item = mysqli_query($conn, $item);
                                $item_run = mysqli_num_rows($result_item);
                            ?>
                            <h4 class="card-text"><?php echo '( '.$item_run.' )'; ?></h4>
                        </div>
                     </div>
                </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../js/table.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
}else{
    exit(include_once('../404/index.php'));
}
?>
