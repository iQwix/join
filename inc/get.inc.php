<?php
if($_GET['error']){
    $errorLogName = array();
    $errorLogEmail = array();
    $errorLogLink1 = array();
    $errorLogLink2 = array();

    // start edit for input name
    if($_GET['error'] === "mixname"){
        $errorLogName[] = "<span style='color:#fff'>لايمكن استخدام عدد الحروف اكثر من 30</span>";
    }else if($_GET['error'] === "stringname"){
        $errorLogName[] = "<span style='color:#fff'>هذا المكان لايقبل الا نص وما يقبل ارقام</span>";
    }else if($_GET['error'] === "strnumname"){
        $errorLogName[] = "<span style='color:#fff'>هذا المكان لا يقبل الى ارقام وحروف فقط!!</span>";
    }else if($_GET['error'] === "spacename"){
        $errorLogName[] = "<span style='color:#fff'>لا يسمح لك في عمل مسافه</span>";
    // end edit for input name


    // start edit for input email
    }else if($_GET['error'] === "mixemail"){
        $errorLogEmail[] = "<span style='color:#fff'>لايمكن استخدام عدد الحروف اكثر من 100</span>";
    }else if($_GET['error'] === "strnumemail"){
        $errorLogEmail[] = "<span style='color:#fff'>هذا المكان لا يقبل الى ارقام وحروف فقط!!</span>";
    }else if($_GET['error'] === "spaceemail"){
        $errorLogEmail[] = "<span style='color:#fff'>لا يسمح لك في عمل مسافه</span>";
    }else if($_GET['error'] === "email"){
        $errorLogEmail[] = "<span style='color:#fff'>هذا ليس ايميل</span>";
    // end edit for input email

    // start edit for input link1
    }else if($_GET['error'] === "mixlink1"){
        $errorLogLink1[] = "<span style='color:#fff'>لايمكن استخدام عدد الارقام اكثر من 40</span>";
    }else if($_GET['error'] === "strnumlink1"){
        $errorLogLink1[] = "<span style='color:#fff'>هذا المكان لا يقبل الى ارقام وحروف فقط!!</span>";
    }else if($_GET['error'] === "spacelink1"){
        $errorLogLink1[] = "<span style='color:#fff'>لا يسمح لك في عمل مسافه</span>";
    // end edit for input link1


    // start edit for input link1
    }else if($_GET['error'] === "mixlink2"){
        $errorLogLink2[] = "<span style='color:#fff'>لايمكن استخدام عدد الارقام اكثر من 40</span>";
    }else if($_GET['error'] === "strnumlink2"){
        $errorLogLink2[] = "<span style='color:#fff'>هذا المكان لا يقبل الى ارقام وحروف فقط!!</span>";
    }else if($_GET['error'] === "spacelink2"){
        $errorLogLink2[] = "<span style='color:#fff'>لا يسمح لك في عمل مسافه</span>";
    // end edit for input link1
    }


}else if($_GET['signup']){
    if($_GET['signup'] == "success"){
        echo "";
    }
}
?>
