function joinAs(id) {
    "use strict";

    var selections = ["ow", "r6s", "fortnite", "rl", "programmer", "designer", "editor"],
        joinList = $('select#joinUsSelect'),
        selectedOption = $('option:selected', joinList),
        i;

    for (i = 0; i  < selections.length; i++) {
        document.getElementsByClassName(selections[i])[0].style.display = "none";
    }
    
    

    // Check What's the pressed option
    switch (selectedOption.val()) {

    case "ow":
        $('.ow').show();
        break;

    case "r6s":
        $('.r6s').show();
        break;

    case "fortnite":
        $('.fortnite').show();
        break;

    case "rl":
        $('.rl').show();
        break;

    case "programmer":
        $('.programmer').show();
        break;

    case "designer":
        $('.designer').show();
        break;

    case "editor":
        $('.editor').show();
        break;
    }

}

function formValidate() {
    
        var name = document.getElementById("name").value,
        email = document.getElementById("email").value,
        twitter = document.getElementById("twitter").value,
        insta = document.getElementById("insta").value;
    
        
    
    
        if (name == "") {
            document.getElementById("nameError").innerHTML = "Please fill the Name field";
            
            return false;
            
        } if (name.length > 30 || name.length < 3) {
            document.getElementById("nameError").innerHTML = "Name length must be between 3 and 30";
            
            return false;
            
        } if (email == "") {
            document.getElementById("emailError").innerHTML = "Please fill the Email field";
            
            return false;
            
        } if (email.length > 100 || email.length < 5) {
            document.getElementById("emailError").innerHTML = "Email length must be between 5 and 100";
            
            return false;
            
        } if (email.indexOf("@") <= 0) {
            document.getElementById("emailError").innerHTML = "@ Invalid";
            
            return false;
            
        } if (twitter == "") {
            document.getElementById("twitterError").innerHTML = "Please fill the Twitter field";
            
            return false;
            
        } if (twitter.length > 25 || twitter.length < 1) {
            document.getElementById("twitterError").innerHTML = "Twitter length must be between 1 and 25";
            
            return false;
            
        } if (insta == "") {
            document.getElementById("instaError").innerHTML = "Please fill the Instagram field";
            
            return false;
            
        } if (insta.length > 25 || insta.length < 1) {
            document.getElementById("instaError").innerHTML = "Instagram length must be between 1 and 25";
            
            return false;
            
        }
    
}
