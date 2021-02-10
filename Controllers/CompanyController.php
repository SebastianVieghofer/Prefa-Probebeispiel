<?php
include_once dirname(__FILE__) . '/../Models/CompanyModel.php';
include_once dirname(__FILE__) . '/../DbConnection.php';

class CompanyController {
    private $connection; 
   
    function __construct (){
        $db = new DbConnection;
        $this->connection = $db->connect();
    }

    function getCompany($companyId){
        $sql = "Select * From companies Where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $companyId);
        $stmt->execute();
        $result = $stmt->get_result();
        $numRows = $result->num_rows;
        if($numRows > 0){
            $company = $result->fetch_assoc();
            $companyModel = new CompanyModel();

            $companyModel->setCompanyId($company['id']);
            $companyModel->setCompanyName($company['name']);
    
            return $companyModel;
        }else{
            echo("No such Company");
            return [];
        }
    }
}