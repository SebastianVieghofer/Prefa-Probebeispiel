<?php   
    require_once 'UI-Parts/Layout.php';
    require_once '../Controllers/UserController.php';
    require_once '../Controllers/CompanyController.php';

    $uid = $_GET['uid'];
    $userController = new UserController($uid);
    $user = $userController->getUser();

    $cid1 = $_GET['cid1'];
    $cid2 = $_GET['cid2'];
    $cid3 = $_GET['cid3'];
    $companyController = new CompanyController();
    $company1 = $companyController->getCompany($cid1);
    $company2 = $companyController->getCompany($cid2);
    $company3 = $companyController->getCompany($cid3);
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fragebogen</title>
    <link rel="stylesheet" href="../CSS/stylesheet.css">
  </head>

  <body>
    <div class="container">
    
        <?php 
            $header = new Layout();
            $header->createHeader();
        ?>   

        <main>
            <div class="main-container">
                <div>
                    <h2>Endkunden Statusabfrage Teil 2</h2>
                    <p>Sehr geehrter Herr <?php echo($user->getUserSurname()) ?>!</p>
                    <p>Um Sie weiterhin bestmöglich unterstützen zu können, bitten wir Sie um folgende Informationen bezüglich Ihrer Angebotsanfrage über die PREFA Website.</p>
                </div>

                <form action="../formHandlerQuestionnaire2.php" method="POST">
                    <fieldset>
                        <div>
                            <h2>1.Haben Sie den Auftrag bereits vergeben?</h2>
                            
                                <input type="radio" id="firstQuestionYes" name="alreadyAssigned" value="1" onclick="displaySecondQuestionYes();" checked>
                                <label for="firstQuestionYes">Ja</label>
                                
                            
                                <input type="radio" id="firstQuestionNo" name="alreadyAssigned" value="0" onclick="displaySecondQuestionNo();">
                                <label for="firstQuestionNo">Nein</label>  
                        </div>
                    </fieldset>  

                    <div id=secondQuestionIfYes>
                        <fieldset>
                            <div>
                                <h2>2.Für welchen Betrieb haben Sie sich entschieden?</h2> 
                                <div>
                                    <input type="radio" id="Company1" name="Company" value="<?php echo($company1->getCompanyId()) ?>">
                                    <label for="Company1"><?php echo($company1->getCompanyName()) ?></label>   
                                </div>
                                <div>
                                    <input type="radio" id="Company2" name="Company" value="<?php echo($company2->getCompanyId()) ?>">
                                    <label for="Company2"><?php echo($company2->getCompanyName()) ?></label>  
                                </div>
                                <div>   
                                    <input type="radio" id="Company3" name="Company" value="<?php echo($company3->getCompanyId()) ?>">
                                    <label for="Company3"><?php echo($company3->getCompanyName()) ?></label> 
                                </div>
                            </div>                      
                        </fieldset>  
                    </div>

                    <div id=secondQuestionIfNo>
                        <fieldset>
                                <div>
                                    <h2>2.Warum fiel die Wahl nicht auf einen der genannten Handwerker?</h2> 
                                    <div>
                                        <input type="radio" id="reason1" name="reasonForNoCompany" value="Zu teuer">
                                        <label for="reason1">Zu teuer</label>   
                                    </div>
                                    <div>
                                        <input type="radio" id="reason2" name="reasonForNoCompany" value="Keine Angebote erhalten">
                                        <label for="reason2">Keine Angebote erhalten</label>  
                                    </div>
                                    <div>   
                                        <input type="radio" id="reason3" name="reasonForNoCompany" value="Projekt wird nicht mit PREFA Produkten umgesetzt">
                                        <label for="reason3">Projekt wird nicht mit PREFA Produkten umgesetzt</label> 
                                    </div>
                                    <div>   
                                        <input type="radio" id="reason4" name="reasonForNoCompany" value="Projekt wird überhaupt nicht umgesetzt">
                                        <label for="reason4">Projekt wird überhaupt nicht umgesetzt</label> 
                                    </div>
                                    <div>   
                                        <input type="radio" id="reason5" name="reasonForNoCompany" value="Entscheidung noch offen">
                                        <label for="reason5">Entscheidung noch offen</label> 
                                    </div>
                                    <!--
                                    <div>   
                                        <input type="radio" id="reason6" name="reasonForNoCompany" value="">
                                        <input type="text" name="reasonForNoCompany" id="reason6Text" value="" onclick="addValueToRadioBtn()">
                                    </div>
                                    -->
                                </div>                      
                            </fieldset> 
                    </div>

                    <fieldset>
                        <div>
                            <h2>3.Können wir noch weiter behilflich sein?</h2> 
                            <div>
                                <input type="radio" id="helpYes" name="help" value="1">
                                <label for="helpYes">Ja, bitte rufen Sie mich an um offene Fragen zu klären</label>   
                            </div>
                            <div>
                                <input type="radio" id="helpNo" name="help" value="0" checked>
                                <label for="helpNo">Nein, danke</label>  
                            </div>
                        </div>                      
                    </fieldset>  
                    <div class="submit-button">
                        <input type="submit" value="Absenden" name="submitBtnQuest2">        
                    </div>  
                    <input type="text" value="<?php echo($uid)?>" name="userId" class="hiddenField">  
                    <input type="text" value="<?php echo($cid1)?>" name="cid1" class="hiddenField">  
                    <input type="text" value="<?php echo($cid2)?>" name="cid2" class="hiddenField">  
                    <input type="text" value="<?php echo($cid3)?>" name="cid3" class="hiddenField">    
                </form>
            </div>
        </main> 
    </div>
    <script src="../JS/main.js"></script>
  </body>
</html>