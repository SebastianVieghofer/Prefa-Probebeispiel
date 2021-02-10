<?php
include_once dirname(__FILE__) . '/UserController.php';
include_once dirname(__FILE__) . '/CompanyController.php';
// include_once 'Controllers/UserController.php';
// include_once 'Controllers/CompanyController.php';


class MailController{

    const URL_QUESTIONNAIRE_1 = "http://localhost/prefa-projekt/Views/questionnaire-1.php";
    const URL_QUESTIONNAIRE_2 = "http://localhost/prefa-projekt/Views/questionnaire-2.php";

    function __construct (){
    }

    function sendMail($receiverId, $companyId1, $companyId2, $companyId3){
        $userController = new UserController($receiverId);
        $companyController = new CompanyController(); 

        $user = $userController->getUser();
        $email = $user->getUserEmail();
        $hasReceivedFirstQuestionnaire = $user->getUserFirstEmailReceived();
        
        $company1 = $companyController->getCompany($companyId1);
        $company2 = $companyController->getCompany($companyId2);
        $company3 = $companyController->getCompany($companyId3);
        $companyId1 = $company1->getCompanyId();
        $companyId2 = $company2->getCompanyId();
        $companyId3 = $company3->getCompanyId();

        $urlWithUid = $this->addUidToUrl($receiverId, $hasReceivedFirstQuestionnaire);
        $urlWithUidAndCids = $this->addCidToUrl($urlWithUid, $companyId1, $companyId2, $companyId3);

        $empfaenger = $email;
        $betreff = "Fragebogen Statusabfrage 1";
        $from = "From: Prefa <sebastian@prefa.at>";
        $text = "Bitte füllen Sie folgenden Fragebogen aus: " . $urlWithUidAndCids;
        
        //mail($empfaenger, $betreff, $text, $from);
        $file = fopen("../emailSimulator/email.txt","w");
        fwrite($file, $empfaenger . $betreff . $from . $text);
        fclose($file);
    }

    function addUidToUrl($id, $hasReceivedFirstQuestionnaire){
        if($hasReceivedFirstQuestionnaire == false){
            $newUrl = self::URL_QUESTIONNAIRE_1 . '?uid=' . $id;
            return $newUrl;
        }elseif($hasReceivedFirstQuestionnaire == true){
            $newUrl = self::URL_QUESTIONNAIRE_2 . '?uid=' . $id;
            return $newUrl;
        }
    }

    function addCidToUrl($urlWithUid, $companyId1, $companyId2, $companyId3){
        $completeUrl = $urlWithUid . '&cid1=' . $companyId1 . '&cid2=' . $companyId2 . '&cid3=' . $companyId3;
        return $completeUrl;
    }
}



$test = new MailController();
$test->sendMail('1', '1', '2', '3');
