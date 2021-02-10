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
                    <h2>Endkunden Statusabfrage Teil 1</h2>
                    <p>Sehr geehrter Herr <?php echo($user->getUserSurname()) ?>!</p>
                    <p>Um Sie weiterhin bestmöglich unterstützen zu können, bitten wir Sie um folgende Informationen bezüglich Ihrer Angebotsanfrage über die PREFA Website.</p>
                </div>

                <form action="../formHandler.php" method="POST">
                    <fieldset>
                        <div>
                            <h2>1.Haben Sie bereits ein Angebot erhalten?</h2>
                            <table>
                                <tr>
                                    <td></td>
                                    <td>Ja</td>
                                    <td>Nein</td>
                                </tr>
                                <tr>
                                    <td><label for="handwerker1"><?php echo($company1->getCompanyName()) ?></label></td>
                                    <td><input type="radio" id="handwerker1" name="Handwerker1" value="1"></td>
                                    <td><input type="radio" id="handwerker1" name="Handwerker1" value="0" checked></td>
                                </tr>
                                <tr>
                                    <td><label for="handwerker2"><?php echo($company2->getCompanyName()) ?></label></td>
                                    <td><input type="radio" id="handwerker2" name="Handwerker2" value="1"></td>
                                    <td><input type="radio" id="handwerker2" name="Handwerker2" value="0" checked></td>
                                </tr>
                                <tr>
                                    <td><label for="handwerker3"><?php echo($company3->getCompanyName()) ?></label></td>
                                    <td><input type="radio" id="handwerker3" name="Handwerker3" value="1"></td>
                                    <td><input type="radio" id="handwerker3" name="Handwerker3" value="0" checked></td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>  

                    <fieldset>
                        <div>
                            <h2>2.Wann dürfen wir uns wieder bei Ihnen melden?</h2> 
                            <div>
                                <input type="radio" id="1Monat" name="secondeMail" value="1" checked>
                                <label for="1Monat">1 Monat</label>   
                            </div>
                            <div>
                                <input type="radio" id="2Monat" name="secondeMail" value="2">
                                <label for="2Monat">2 Monat</label>  
                            </div>
                            <div>   
                                <input type="radio" id="3Monat" name="secondeMail" value="3">
                                <label for="3Monat">3 Monat</label> 
                            </div>
                            <div>
                                <input type="radio" id="6Monat" name="secondeMail" value="6">
                                <label for="6Monat">6 Monat</label> 
                            </div>
                            <div>
                                <input type="radio" id="donot-notify-again" name="secondeMail" value="0"> 
                                <label for="donot-notify-again">Gar nicht mehr</label> 
                                <div id="additional-question-donot-notify-again-text">
                                    <h2>3.Warum möchten Sie von uns nicht mehr kontaktiert werden?</h2>
                                    <textarea id="donot-notify-again-text" name="textarea" placeholder="Bitte geben Sie Ihre Antwort ein."></textarea>
                                </div>
                            </div> 
                        </div>                      
                    </fieldset>  
                    <div class="submit-button">
                        <input type="submit" value="Absenden" name="submitBtnQuest1">        
                    </div>  
                    <input type="text" value="<?php echo($uid)?>" name="userId" class="hiddenField">  
                    <input type="text" value="<?php echo($cid1)?>" name="cid1" class="hiddenField">  
                    <input type="text" value="<?php echo($cid2)?>" name="cid2" class="hiddenField">  
                    <input type="text" value="<?php echo($cid3)?>" name="cid3" class="hiddenField">    
                </form>
            </div>
        </main> 
    </div>
  </body>
</html>