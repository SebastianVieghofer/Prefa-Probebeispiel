if(document.getElementById("firstQuestionYes").checked){
    document.getElementById('secondQuestionIfYes').style.display = "block";
}else{
    document.getElementById('secondQuestionIfNo').style.display = "none";
} 

function displaySecondQuestionYes(){
    document.getElementById('secondQuestionIfYes').style.display = "block";
    document.getElementById('secondQuestionIfNo').style.display = "none";
}

function displaySecondQuestionNo(){
    document.getElementById('secondQuestionIfNo').style.display = "block";
    document.getElementById('secondQuestionIfYes').style.display = "none";
}

function addValueToRadioBtn(){
    document.getElementById("reason6").checked = true;

    if (document.getElementById("reason6").checked == true){
        document.getElementById("reason6").value = document.getElementById("reason6Text").value;
    }
}
