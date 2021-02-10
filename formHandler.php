<?php
include_once 'DbConnection.php';

$databaseConnect = new DbConnection();
$conn = $databaseConnect->connect();

if(isset($_POST['submitBtnQuest1'])){
    $company1 = $_POST['Handwerker1'];
    $company2 = $_POST['Handwerker2'];
    $company3 = $_POST['Handwerker3'];
    $secondeMailInMonths = $_POST['secondeMail'];
    $reasonForNoSecondMail = $_POST['textarea'];
    $userId = $_POST['userId'];   
    $cid1 = $_POST['cid1'];
    $cid2 = $_POST['cid2'];   
    $cid3 = $_POST['cid3'];  
    $firstEmailReceived = 1;     
}  

if($company1 === '1'){
    insertCustomersCompaniesOffers($conn, $userId, $cid1);
}
if($company2 === '1'){
    insertCustomersCompaniesOffers($conn, $userId, $cid2);
}
if($company3 === '1'){
    insertCustomersCompaniesOffers($conn, $userId, $cid3);
}

$nextMailTimestamp = calculateNextMailTimestamp($secondeMailInMonths);

$stmt = $conn->prepare("UPDATE customers SET second_email_on = ?, reason_for_no_contact = ?, first_email_received = ? WHERE id = ?");
$stmt->bind_param("ssss", $nextMailTimestamp, $reasonForNoSecondMail, $firstEmailReceived, $userId);

$stmt->execute();


function insertCustomersCompaniesOffers($conn, $customerId, $companyId){
    $stmt = $conn->prepare("INSERT INTO customers_companies (_id_customer, _id_company) VALUES (?, ?)");
    $stmt->bind_param("ss", $customerId, $companyId);
    
    $stmt->execute();
}

function calculateNextMailTimestamp($secondeMailInMonths){
    if($secondeMailInMonths === 0){
        $nextMailOn = null;
    }else{
        $nextMailOn = strtotime('now + ' . $secondeMailInMonths .' month' );
    }
    return $nextMailOn;
}

$stmt->close();
header('Location: https://www.prefa.at/');