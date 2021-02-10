<?php
include_once dirname(__FILE__) . '/../Models/UserModel.php';
include_once dirname(__FILE__) . '/../DbConnection.php';

class UserController {
    private $connection; 
    private $uid;

    function __construct ($id){
        $db = new DbConnection;
        $this->connection = $db->connect();
        $this->uid = $id;
    }

    function getUser(){
        $sql = "Select * From customers Where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $this->uid);
        $stmt->execute();
        $result = $stmt->get_result();
        $numRows = $result->num_rows;
        if($numRows > 0){
            $user = $result->fetch_assoc();
            $userModel = new UserModel();

            $userModel->setUserId($user['id']);
            $userModel->setUserName($user['name']);
            $userModel->setUserSurname($user['surname']);
            $userModel->setUserEmail($user['email']);
            $userModel->setUserFirstEmailReceived($user['first_email_received']);
            $userModel->setUserReasonForNoContact($user['reason_for_no_contact']);
    
            return $userModel;
        }else{
            echo("No such User");
            return [];
        }
    }
}