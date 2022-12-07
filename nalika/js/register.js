/*
Program validates user signup details
*/
/* First name validation - Required */
function validateFullName(inputTxt){
    const fullname = document.getElementById("fullname");
    const message = document.getElementById("1");
    var fname_regex = /(^[A-Za-z]{3,16})([ ]{0,1})([A-Za-z]{3,16})?([ ]{0,1})?([A-Za-z]{3,16})?([ ]{0,1})?([A-Za-z]{3,16})/
    ;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(fname_regex))){
            message.textContent = "invalid fullname";
            fullname.focus();
        }
        else{
            message.textContent = "";
        }
    }
}
/* email - required */
function validateEmail(inputTxt){
    const email = document.getElementById("email");
    const message = document.getElementById("2");
    var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    // for gmail only /^[\w-\.]+@(gmail.com)$/
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(email_regex))){
            message.textContent = "invalid GMAIL";
            email.focus();
        }
        else{
            message.textContent = "";
        }
    }
}

/* country - required */
/* First name validation - Required */
function validateCountry(inputTxt){
    const country = document.getElementById("country");
    const message = document.getElementById("4");
    var country_regex = /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(country_regex))){
            message.textContent = "invalid Country name";
            country.focus();
        }
        else{
            message.textContent = "";
        }
    }
}

/* Phone number validation */
function validatePhone(inputTxt){
    const phone = document.getElementById("contact");
    const message = document.getElementById("6");
    var phone_regex = /^\+?([0-9]{1,3})\)?([\d ]{9,15})$/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(phone_regex))){
            message.textContent = "invalid phone number";
            phone.focus();
        }
        else{
            message.textContent = "";
        }
    }
   
}

/* Password validation */
function validatePassword(){
    const password = document.getElementById("pass");
    const password1 = document.getElementById("pass1");
    if(password.value !="" && password1.value !=""){
        if(password1.value.trim()!=password.value.trim()){
            password1.setCustomValidity("Passwords do not match");
        }
        else{
            password1.setCustomValidity("");
        }
    }
   
}