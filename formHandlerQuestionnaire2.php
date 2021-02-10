<?php
include_once 'DbConnection.php';

$databaseConnect = new DbConnection();
$conn = $databaseConnect->connect();

if(isset($_POST['submitBtnQuest2'])){
    $alreadyAssigned = $_POST['alreadyAssigned'];
    if(!isset($_POST['Company'])){
        $companyId = NULL;
    }
    if(isset($_POST['Company'])){
        $companyId = $_POST['Company'];
    }
    if(!isset($_POST['reasonForNoCompany'])){
        $reasonForNoCompany = NULL;
    }
    if(isset($_POST['reasonForNoCompany'])){
        $reasonForNoCompany = $_POST['reasonForNoCompany'];
    }
    $helpNeeded = $_POST['help'];
    $userId = $_POST['userId'];   
    $secondEmailReceived = 1;     
}  

$stmt = $conn->prepare("UPDATE customers SET second_email_received = ?, offer_taken = ?, _chosen_company = ?, no_deal_text = ? WHERE id = ?");
$stmt->bind_param("sssss", $secondEmailReceived, $alreadyAssigned, $companyId, $reasonForNoCompany, $userId);

$stmt->execute();

$stmt->close();

if($helpNeeded === 1){
    //Code falls ein Kunde hilfe braucht. 
    //z.B. Email an Mitarbeiter
}

header('Location: https://www.prefa.at/');