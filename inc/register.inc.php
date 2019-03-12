<?php
session_start;
session_regenerate_id();
    $http = $_SERVER['REQUEST_URI'];
    $http = strstr($http, "join");
    if(strpos($http, '?') != false){
        $http = str_replace(strstr($http, "?"),'', $http);
    }
    $http = str_replace(" ",'', $http);
    if($http === "" or $http === "index.php" or $http === "index.php "){
            exit("<script>location.href = 'index.php';</script>");
        }else if($_SERVER['REQUEST_METHOD'] !== "POST"){
            exit("<script>location.href = 'index.php';</script>");
        }else if(isset($_POST['submit'])){
            // تعريف الأنبوت مع حماية من
            // xss
            $name = htmlentities(strip_tags(strtolower($_POST['name'])));
            $email = htmlentities(strip_tags(strtolower($_POST['email'])));
            $country = htmlentities(strip_tags($_POST['country']));
            $age = htmlentities(strip_tags($_POST['age']));
            $link1 = htmlentities(strip_tags(strtolower($_POST['link1'])));
            $link2 = htmlentities(strip_tags(strtolower($_POST['link2'])));
            $joinas = htmlentities(strip_tags($_POST['joinas']));

            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['link1'] = $link1;
            $_SESSION['link2'] = $link2;

            // معرفه الانبوت افارغه
            if(empty($name) || empty($email) || $country == "0" || empty($age) || empty($link1) || empty($link2) || $joinas == "0"){
                exit("<script>location.href = 'index.php?error=empty';</script>");

            }else if(strlen($name) >= 30){ // حجم لارقام و الحروف في الانبوت
                $_SESSION['name'] = $name;
                exit("<script>location.href = 'index.php?error=mixname&name=".strlen($name)."';</script>");
            }else if(strlen($email) >= 100){
                $_SESSION['email'] = $email;
                exit("<script>location.href = 'index.php?error=mixemail&strlen=".strlen($email)."';</script>");
            }else if(strlen($link1) >= 40){
                $_SESSION['link1'] = $link1;
                exit("<script>location.href = 'index.php?error=mixlink1&strlen=".strlen($link1)."';</script>");
            }else if(strlen($link2) >= 40){
                $_SESSION['link2'] = $link2;
                exit("<script>location.href = 'index.php?error=mixlink2&strlen=".strlen($link2)."';</script>");

            }else if(!is_string($name)){ // تاكيد من انه استرينق
                $_SESSION['name'] = $name;
                exit("<script>location.href = 'index.php?error=stringname&name=".$name."';</script>");
            }else if(!is_string($link1)){
                $_SESSION['link1'] = $link1;
                exit("<script>location.href = 'index.php?error=stringlink1&string=".$link1."';</script>");
            }else if(!is_string($link2)){
                $_SESSION['link2'] = $link2;
                exit("<script>location.href = 'index.php?error=stringlink2&string=".$link2."';</script>");

            }else if(!preg_replace("#[^a-zA-Z0-9]#i", "", $name)){ // هنا فقط يبل الحروف الانقلينزي والارقام
                $_SESSION['name'] = $name;
                exit("<script>location.href = 'index.php?error=strnumname&name=".$name."';</script>");
            }else if(!preg_replace("#[^a-zA-Z0-9]#i", "", $email)){
                $_SESSION['email'] = $email;
                exit("<script>location.href = 'index.php?error=strnumemail&strnum=".$email."';</script>");
            }else if(!preg_replace("#[^a-zA-Z0-9]#i", "", $link1)){
                $_SESSION['link1'] = $link1;
                exit("<script>location.href = 'index.php?error=strnumlink1&strnum=".$link1."';</script>");
            }else if(!preg_replace("#[^a-zA-Z0-9]#i", "", $link2)){
                $_SESSION['link2'] = $link2;
                exit("<script>location.href = 'index.php?error=strnumlink2&strnum=".$link2."';</script>");

            }else if(strpos($name, ' ') != false){ // هنا تاككيد ان لا يوجد سبيس في الانبوت
                $_SESSION['name'] = $name;
                exit("<script>location.href = 'index.php?error=spacename&name=".str_replace(' ', '', $name)."';</script>");
            }else if(strpos($email, ' ') != false){
                $_SESSION['email'] = $email;
                exit("<script>location.href = 'index.php?error=spaceemail&space=".str_replace(' ', '', $email)."';</script>");
            }else if(strpos($link1, ' ') != false){
                $_SESSION['link1'] = $link1;
                exit("<script>location.href = 'index.php?error=spacelink1&space=".str_replace(' ', '', $link1)."';</script>");
            }else if(strpos($link2, ' ') != false){
                $_SESSION['link2'] = $link2;
                exit("<script>location.href = 'index.php?error=spacelink2&space=".str_replace(' ', '', $link2)."';</script>");

            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // هنا فلتره الايميل
                $_SESSION['email'] = $email;
                exit("<script>location.href = 'index.php?error=email&uid=".$email."';</script>");
            }else{
                include_once('connected.php');


                // create joinas in databases
                switch($joinas){
                    case $joinas === "ow":
                        $_SESSION['overwatch'] = 'ow';

                        // تعرييف الانبوت
                        $battleid1 = htmlentities(strip_tags($_POST['battleid1']));
                        $sr1 = htmlentities(strip_tags($_POST['sr1']));
                        $level1 = htmlentities(strip_tags($_POST['level1']));
                        $your_main1 = htmlentities(strip_tags($_POST['your-main1']));
                        $platform1 = htmlentities(strip_tags($_POST['platform1']));

                        // اتحقق من الانبوت
                        if(empty($battleid1) || empty($sr1) || empty($level1) || $your_main1 == "0" || $platform1 == "0"){
                            exit("<script>location.href = 'index.php?error=joinas&err=empty';</script>");
                        }else if (!preg_replace("#[^a-zA-Z0-9]#i", "", $battleid1)){// مسماح لل انبوت فقط خروف والارقام
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$battleid1."';</script>");
                        }else if (!preg_replace("#[^0-9]#i", "", $sr1)){
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$sr1."';</script>");
                        }else if (!preg_replace("#[^0-9]#i", "", $level1)){
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$level1."';</script>");

                        }else if (strpos($battleid1, ' ') != false){ // ممنوع المسافات
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$battleid1."';</script>");
                        }else if (strpos($sr1, ' ') != false){
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$battleid1."';</script>");
                        }else if (strpos($level1, ' ') != false){
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$battleid1."';</script>");

                        }else if(!filter_var($sr1, FILTER_VALIDATE_INT)){// يتاكد انه رقم
                            exit("<script>location.href = 'index.php?error=numbersr1&uid=".$sr1."';</script>");

                        }else if(!filter_var($level1, FILTER_VALIDATE_INT)){// يتاكد انه رقم
                            exit("<script>location.href = 'index.php?error=numberl1&uid=".$level2."';</script>");

                        }else if (strlen($battleid1) >= 40){ // ممنوع يكثر عن 40 حرف
                            exit("<script>location.href = 'index.php?error=mix&uid=".$sr1."';</script>");
                        }else if (strlen($sr1) >= 5){ // ممنوع يكثر عن 99999
                            exit("<script>location.href = 'index.php?error=mix&uid=".$sr1."';</script>");
                        }else if (strlen($level1) >= 5){ // ممنوع يكثر عن 99999
                            exit("<script>location.href = 'index.php?error=mix&uid=".$level1."';</script>");

                        }else if ($level1 <= 25){ // ممننوع يقل عن 25
                            exit("<script>location.href = 'index.php?error=min&uid=".$level1."';</script>");

                        }else{
                            // تعرف للقواعد البينات
                            $sql_select_ow = "SELECT username FROM `overwatch-team` WHERE username=?";
                            $stmt_select = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt_select, $sql_select_ow)){
                                exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");

                            }else{
                                mysqli_stmt_bind_param($stmt_select, "s", $name);

                                // يتم الارسال واستقبل البينات
                                mysqli_stmt_execute($stmt_select);
                                mysqli_stmt_store_result($stmt_select);
                                $resultCheck = mysqli_stmt_num_rows($stmt_select);
                                if($resultCheck > 0){
                                    exit("<script>location.href = 'index.php?error=userTaken';</script>");

                                }else{
                                    // تعريف المعلومات
                                    $sql_ow = "INSERT INTO `overwatch-team` (username,`Battle/PS4/xBox/ID`,`your-sr`,`your-level`,`your-main`,platform)VALUES(?,?,?,?,?,?)";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($stmt, $sql_ow)){
                                        exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");
                                    }else{
                                        mysqli_stmt_bind_param($stmt, "ssiiss", $name, $battleid1, $sr1, $level1, $your_main1, $platform1);

                                        // اارسل المعلومات
                                        mysqli_stmt_execute($stmt);
                                    }
                                }
                            }
                        }
                    break;

                    case $joinas === "r6s":
                        $_SESSION['r6s'] = 'r6s';

                        // تعرييف الانبوت
                        $r6sid = htmlentities(strip_tags(strtolower($_POST['r6sid'])));
                        $your_rank1 = htmlentities(strip_tags($_POST['your-rank1']));
                        $level2 = htmlentities(strip_tags($_POST['level2']));
                        $platform2 = htmlentities(strip_tags($_POST['platform2']));

                        // اتحقق من الانبوت
                        if(empty($r6sid) || $your_rank1 == "0" || empty($level2) || $platform2 == "0"){
                            exit("<script>location.href = 'index.php?error=joinas&err=empty';</script>");

                        }else if (!preg_replace("#[^a-zA-Z0-9]#i", "", $r6sid)){// مسماح لل انبوت فقط خروف والارقام
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$r6sid."';</script>");
                        }else if (!preg_replace("#[^0-9]#i", "", $level2)){
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$level2."';</script>");

                        }else if (strpos($r6sid, ' ') != false){ // ممنوع المسافات
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$r6sid."';</script>");
                        }else if (strpos($level2, ' ') != false){
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$level2."';</script>");

                        }else if(!filter_var($level2, FILTER_VALIDATE_INT)){// يتاكد انه رقم
                            exit("<script>location.href = 'index.php?error=numberl2&uid=".$level2."';</script>");

                        }else if (strlen($r6sid) >= 40){ // ممنوع يكثر عن 40 حرف
                            exit("<script>location.href = 'index.php?error=mix&uid=".$r6sid."';</script>");
                        }else if (strlen($level2) >= 5){ // ممنوع يكثر عن 99999
                            exit("<script>location.href = 'index.php?error=mix&uid=".$level2."';</script>");

                        }else{// تعرف للقواعد البينات
                            $sql_select_r6s = "SELECT username FROM `r6s-team` WHERE username=?";
                            $stmt_select = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt_select, $sql_select_r6s)){
                                exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");

                            }else{
                                mysqli_stmt_bind_param($stmt_select, "s", $name);

                                // يتم الارسال واستقبل البينات
                                mysqli_stmt_execute($stmt_select);
                                mysqli_stmt_store_result($stmt_select);
                                $resultCheck = mysqli_stmt_num_rows($stmt_select);
                                if($resultCheck > 0){
                                    exit("<script>location.href = 'index.php?error=userTaken';</script>");

                                }else{
                                    // تعريف المعلومات
                                    $sql_r6s = "INSERT INTO `r6s-team` (username,`Steam/Uplay/PS4/xBox-ID`,`your-rank`,`your-level`,platform)VALUES(?,?,?,?,?)";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($stmt, $sql_r6s)){
                                        exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");
                                    }else{
                                        mysqli_stmt_bind_param($stmt, "sssis", $name, $r6sid, $your_rank1, $level2, $platform2);

                                        // اارسل المعلومات
                                        mysqli_stmt_execute($stmt);
                                    }
                                }
                            }
                        }
                    break;


                    case $joinas === "fortnite":
                        $_SESSION['fortnite'] = 'fortnite';

                        // تعرييف الانبوت
                        $epicid = htmlentities(strip_tags(strtolower($_POST['epicid'])));
                        $kills = htmlentities(strip_tags($_POST['kills']));
                        $wins = htmlentities(strip_tags($_POST['wins']));
                        $kd = htmlentities(strip_tags($_POST['kd']));
                        // اتحقق من الانبوت
                        if(empty($epicid) || empty($kills) || empty($wins) || empty($kd)){
                            exit("<script>location.href = 'index.php?error=joinas&err=empty';</script>");

                        }else if (!preg_replace("#[^a-zA-Z0-9]#i", "", $epicid)){// مسماح لل انبوت فقط خروف والارقام
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$epicid."';</script>");
                        }else if (!preg_replace("#[^0-9]#i", "", $kills)){
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$kills."';</script>");
                        }else if (!preg_replace("#[^0-9]#i", "", $wins)){
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$wins."';</script>");
                        }else if (!preg_replace("#[^0-9]#i", "", $kd)){
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$kd."';</script>");

                        }else if (strpos($epicid, ' ') != false){ // ممنوع المسافات
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$epicid."';</script>");
                        }else if (strpos($kills, ' ') != false){
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$kills."';</script>");
                        }else if (strpos($wins, ' ') != false){
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$wins."';</script>");
                        }else if (strpos($kd, ' ') != false){
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$kd."';</script>");

                        }else if(!filter_var($kills, FILTER_VALIDATE_INT)){// يتاكد انه رقم
                            exit("<script>location.href = 'index.php?error=numberki&uid=".$kills."';</script>");
                        }else if(!filter_var($wins, FILTER_VALIDATE_INT)){// يتاكد انه رقم
                            exit("<script>location.href = 'index.php?error=numberw&uid=".$wins."';</script>");
                        }else if (strlen($epicid) >= 50){ // ممنوع يكثر عن 50 حرف
                            exit("<script>location.href = 'index.php?error=mix&uid=".$epicid."';</script>");
                        }else if (strlen($kills) >= 7){ // ممنوع يكثر عن 999999
                            exit("<script>location.href = 'index.php?error=mix&uid=".$kills."';</script>");
                        }else if (strlen($wins) >= 8){ // ممنوع يكثر عن 999999
                            exit("<script>location.href = 'index.php?error=mix&uid=".$wins."';</script>");
                        }else if (strlen($kd) >= 6){ // ممنوع يكثر عن 999999
                            exit("<script>location.href = 'index.php?error=mix&uid=".$kd."';</script>");

                        }else{// تعرف للقواعد البينات
                            $sql_select_fortnite = "SELECT username FROM `fortnite-team` WHERE username=?";
                            $stmt_select = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt_select, $sql_select_fortnite)){
                                exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");

                            }else{
                                mysqli_stmt_bind_param($stmt_select, "s", $name);

                                // يتم الارسال واستقبل البينات
                                mysqli_stmt_execute($stmt_select);
                                mysqli_stmt_store_result($stmt_select);
                                $resultCheck = mysqli_stmt_num_rows($stmt_select);
                                if($resultCheck > 0){
                                    exit("<script>location.href = 'index.php?error=userTaken';</script>");

                                }else{
                                    // تعريف المعلومات
                                    $sql_fortnite = "INSERT INTO `fortnite-team` (username,`Epic-ID`,`Your-Kills`,`Your-Wins`,`Your-K/D`)VALUES(?,?,?,?,?)";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($stmt, $sql_fortnite)){
                                        exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");
                                    }else{
                                        mysqli_stmt_bind_param($stmt, "ssiid", $name, $epicid, $kills, $wins, $kd);

                                        // اارسل المعلومات
                                        mysqli_stmt_execute($stmt);
                                    }
                                }
                            }
                        }
                    break;

                    case $joinas === "rl":
                        $_SESSION['rocket'] = 'rl';

                        // تعرييف الانبوت
                        $r6sid1 = htmlentities(strip_tags(strtolower($_POST['r6sid1'])));
                        $level3 = htmlentities(strip_tags($_POST['level3']));
                        $platform3 = htmlentities(strip_tags($_POST['platform3']));
                        $solo_duel = htmlentities(strip_tags($_POST['solo-duel']));
                        $doubles = htmlentities(strip_tags($_POST['doubles']));
                        $standard = htmlentities(strip_tags($_POST['standard']));
                        $solo_standard = htmlentities(strip_tags($_POST['solo-standard']));

                        // اتحقق من الانبوت
                        if(empty($r6sid1) || empty($level3) || $platform3 == "0" || $solo_duel == "0" || $doubles == "0" || $standard == "0" || $solo_standard == "0"){
                            exit("<script>location.href = 'index.php?error=joinas&err=empty';</script>");

                        }else if (!preg_replace("#[^a-zA-Z0-9]#i", "", $r6sid1)){// مسماح لل انبوت فقط خروف والارقام
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$r6sid1."';</script>");
                        }else if (!preg_replace("#[^0-9]#i", "", $level3)){
                            exit("<script>location.href = 'index.php?error=joinas&err=strnum&uid=".$level3."';</script>");

                        }else if (strpos($r6sid1, ' ') != false){ // ممنوع المسافات
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$r6sid1."';</script>");
                        }else if (strpos($level3, ' ') != false){
                            exit("<script>location.href = 'index.php?error=joinas&err=space&uid=".$level3."';</script>");

                        }else if(!filter_var($level3, FILTER_VALIDATE_INT)){// يتاكد انه رقم
                            exit("<script>location.href = 'index.php?error=numberl3&uid=".$level3."';</script>");

                        }else if (strlen($r6sid1) >= 50){ // ممنوع يكثر عن 50 حرف
                            exit("<script>location.href = 'index.php?error=mix&uid=".$r6sid1."';</script>");
                        }else if (strlen($level3) >= 6){ // ممنوع يكثر عن 999999
                            exit("<script>location.href = 'index.php?error=mix&uid=".$level3."';</script>");

                        }else{// تعرف للقواعد البينات
                            $sql_select_rl = "SELECT username FROM `rocket-league-team` WHERE username=?";
                            $stmt_select = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt_select, $sql_select_rl)){
                                exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");

                            }else{
                                mysqli_stmt_bind_param($stmt_select, "s", $name);

                                // يتم الارسال واستقبل البينات
                                mysqli_stmt_execute($stmt_select);
                                mysqli_stmt_store_result($stmt_select);
                                $resultCheck = mysqli_stmt_num_rows($stmt_select);
                                if($resultCheck > 0){
                                    exit("<script>location.href = 'index.php?error=userTaken';</script>");

                                }else{
                                    // تعريف المعلومات
                                    $sql_rl = "INSERT INTO `rocket-league-team` (username,`Steam/PS4/xBox-ID`,`Your-Level`,Platform,`Your-Rank-in-1v1-Solo-Duel`,`Your-Rank-in-2v2-Doubles`,`Your-Rank-in-3v3-Standard`,`Your-Rank-in-3v3-Solo-Standard`)VALUES(?,?,?,?,?,?,?,?)";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($stmt, $sql_rl)){
                                        exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");
                                    }else{
                                        mysqli_stmt_bind_param($stmt, "ssisssss", $name,$r6sid1, $level3, $platform3, $solo_duel, $doubles, $standard, $solo_standard);

                                        // اارسل المعلومات
                                        mysqli_stmt_execute($stmt);
                                    }
                                }
                            }
                        }
                    break;

                    case $joinas === "programmer":
                        $_SESSION['programmer'] = 'programmer';

                        // تعرييف الانبوت
                        $programmer = htmlentities(strip_tags($_POST['programmer']));

                        // اتحقق من الانبوت
                        if(empty($programmer)){
                            exit("<script>location.href = 'index.php?error=joinas&err=empty';</script>");

                        }else if (strlen($programmer) >= 1201){ // ممنوع يكثر عن 50 حرف
                            exit("<script>location.href = 'index.php?error=mix';</script>");

                        }else{// تعرف للقواعد البينات
                            $sql_select_programmer = "SELECT username FROM programmer WHERE username=?";
                            $stmt_select = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt_select, $sql_select_programmer)){
                                exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");

                            }else{
                                mysqli_stmt_bind_param($stmt_select, "s", $name);

                                // يتم الارسال واستقبل البينات
                                mysqli_stmt_execute($stmt_select);
                                mysqli_stmt_store_result($stmt_select);
                                $resultCheck = mysqli_stmt_num_rows($stmt_select);
                                if($resultCheck > 0){
                                    exit("<script>location.href = 'index.php?error=userTaken';</script>");

                                }else{
                                    // تعريف المعلومات
                                    $sql_programmer = "INSERT INTO programmer (username,text)VALUES(?,?)";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($stmt, $sql_programmer)){
                                        exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");
                                    }else{
                                        mysqli_stmt_bind_param($stmt, "ss", $name, $programmer);

                                        // اارسل المعلومات
                                        mysqli_stmt_execute($stmt);
                                    }
                                }
                            }
                        }
                    break;

                    case $joinas === "designer":
                        $_SESSION['designer'] = 'designer';

                        // تعرييف الانبوت
                        $designer = htmlentities(strip_tags($_POST['designer']));

                        // اتحقق من الانبوت
                        if(empty($designer)){
                            exit("<script>location.href = 'index.php?error=joinas&err=empty';</script>");

                        }else if (strlen($designer) >= 1201){ // ممنوع يكثر عن 50 حرف
                            exit("<script>location.href = 'index.php?error=mix';</script>");

                        }else{// تعرف للقواعد البينات
                            $sql_select_designer = "SELECT username FROM designer WHERE username=?";
                            $stmt_select = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt_select, $sql_select_designer)){
                                exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");

                            }else{
                                mysqli_stmt_bind_param($stmt_select, "s", $name);

                                // يتم الارسال واستقبل البينات
                                mysqli_stmt_execute($stmt_select);
                                mysqli_stmt_store_result($stmt_select);
                                $resultCheck = mysqli_stmt_num_rows($stmt_select);
                                if($resultCheck > 0){
                                    exit("<script>location.href = 'index.php?error=userTaken';</script>");

                                }else{
                                    // تعريف المعلومات
                                    $sql_designer = "INSERT INTO designer (username,text)VALUES(?,?)";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($stmt, $sql_designer)){
                                        exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");
                                    }else{
                                        mysqli_stmt_bind_param($stmt, "ss", $name, $designer);

                                        // اارسل المعلومات
                                        mysqli_stmt_execute($stmt);
                                    }
                                }
                            }
                        }
                    break;

                    case $joinas === "editor":
                        $_SESSION['editor'] = 'editor';

                        // تعرييف الانبوت
                        $editor = htmlentities(strip_tags($_POST['editor']));

                        // اتحقق من الانبوت
                        if(empty($editor)){
                            exit("<script>location.href = 'index.php?error=joinas&err=empty';</script>");

                        }else if (strlen($editor) >= 1201){ // ممنوع يكثر عن 50 حرف
                            exit("<script>location.href = 'index.php?error=mix';</script>");

                        }else{// تعرف للقواعد البينات
                            $sql_select_editor = "SELECT username FROM editor WHERE username=?";
                            $stmt_select = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt_select, $sql_select_editor)){
                                exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");

                            }else{
                                mysqli_stmt_bind_param($stmt_select, "s", $name);

                                // يتم الارسال واستقبل البينات
                                mysqli_stmt_execute($stmt_select);
                                mysqli_stmt_store_result($stmt_select);
                                $resultCheck = mysqli_stmt_num_rows($stmt_select);
                                if($resultCheck > 0){
                                    exit("<script>location.href = 'index.php?error=userTaken';</script>");
                                }else{
                                    // تعريف المعلومات
                                    $sql_editor = "INSERT INTO editor (username,text)VALUES(?,?)";
                                    $stmt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($stmt, $sql_editor)){
                                        exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");
                                    }else{
                                        mysqli_stmt_bind_param($stmt, "ss", $name, $editor);

                                        // اارسل المعلومات
                                        mysqli_stmt_execute($stmt);
                                    }
                                }
                            }
                        }
                    break;
                }
                $query = "SELECT name FROM register WHERE name = ?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $query)){
                    exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");
                }else{
                    mysqli_stmt_bind_param($stmt, "s" ,$name);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if($resultCheck > 0){
                        exit("<script>location.href = 'index.php?error=userTaken';</script>");
                    }else{
                        $query1 = "SELECT email FROM register WHERE email = ?";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $query1)){
                            exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");
                        }else{
                            mysqli_stmt_bind_param($stmt, "s", $email);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $resultCheck = mysqli_stmt_num_rows($stmt);
                            if($resultCheck > 0){
                                exit("<script>location.href = 'index.php?error=emailTaken';</script>");
                            }else{
                                $status = 0;
                                $query2 = "INSERT INTO register (name,email,Country,age,twitter,instagram,Joinas,status)VALUES(?,?,?,?,?,?,?,?)";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $query2)){
                                    exit("<script>location.href = 'index.php?error=sqlerror". __LINE__ ."';</script>");
                                }else{
                                    mysqli_stmt_bind_param($stmt, "sssisssi", $name, $email, $country, $age, $link1, $link2, $joinas, $status);
                                    mysqli_stmt_execute($stmt);
                                    exit("<script>location.href = 'index.php?signup=success';</script>");
                                }
                            }
                        }
                    }
                }
            }
            mysqli_stmt_close($stmt_select);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }

?>
