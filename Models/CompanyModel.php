<?php

class CompanyModel{

    private $CompanyId;
    private $CompanyName;

    public function getCompanyId(){
        return $this->CompanyId;
    }

    public function getCompanyName(){
        return $this->CompanyName;
    }


    public function setCompanyId(int $CompanyId){
        $this->CompanyId = $CompanyId;
    }

    public function setCompanyName(string $CompanyName){
        $this->CompanyName = $CompanyName;
    }
}