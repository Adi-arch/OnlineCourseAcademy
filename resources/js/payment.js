
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}


function validateForm(){
    var cnumber= document.getElementById("cnumber").value;
    var cmonth= document.getElementById("cmonth").value;
    var cyear= document.getElementById("cyear").value;
    var ccvv= document.getElementById("ccvv").value;
    var cname =document.getElementById("cname").value;
    console.log(cnumber);

    var numErr = monthErr = yearErr = cvvErr = nameErr = true;

    if(cnumber == null){
        printError("Please enter you card number");
    }
    else{
        var regex = /^\d{16}$/;
        if(regex.test(cnumber) === false){
            prinrError("Enter 16 digit card number");
        }
        else{
            printError("numErr", "");
            numErr = false;
        }
    }

    if(cmonth == null){
        printError("Enter the month");
    }
    else{
        regex = /^(0?[1-9]|1[012])$/;
        if(regex.test(cmonth) === false){
            printError("Please enter valid month");
        }
        else{
            printError("monthErr", "");
            monthErr = false;
        }
    }
    
    if(cyear == null){
        printError("Please enter the year");
    }
    else{
        regex = /^\d{4}$/;
        if(regex.test(cyear) === false){
            printError("Please enter valid year");
        }
        else{
            printError("yearErr", "");
            yearErr = false;
        }
    }


    if(ccvv == null){
       printError("Please enter your CVV");

    }
    else{
        var regex = /^[0-9]{3,4}$/;

        if(regex.test(ccvv) ===false){
            printError("Please enter 3 or 4 digit CVV")
        }
        else
        {
            printError("cvvErr", "");
            cvvErr = false; 
        }
        
    }
    if(cname == null) {
        printError("nameErr", "Please enter your name on card");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid name on card");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
    }

    if((numErr || monthErr || yearErr || cvvErr || nameErr) == true){
        return false;
    }


    
}