<?php

class UserModel{

    private $UserId;
    private $UserName;
    private $UserSurname;
    private $UserEmail;
    private $UserFirstEmailReceived;
    private $UserReasonForNoContact;

    public function getUserId(){
        return $this->UserId;
    }

    public function getUserName(){
        return $this->UserName;
    }

    public function getUserSurname(){
        return $this->UserSurname;
    }

    public function getUserEmail(){
        return $this->UserEmail;
    }

    public function getUserFirstEmailReceived(){
        return $this->UserFirstEmailReceived;
    }

    public function getUserReasonForNoContact(){
        return $this->UserReasonForNoContact;
    }



    public function setUserId(int $UserId){
        $this->UserId = $UserId;
    }

    public function setUserName(string $UserName){
        $this->UserName = $UserName;
    }

    public function setUserSurname(string $UserSurname){
        $this->UserSurname = $UserSurname;
    }

    public function setUserEmail(string $UserEmail){
        $this->UserEmail = $UserEmail;
    }

    public function setUserFirstEmailReceived(bool $userFirstEmailReceived){
        $this->UserFirstEmailReceived = $userFirstEmailReceived;
    }

    public function setUserReasonForNoContact(string $userReasonForNoContact){
        $this->UserReasonForNoContact = $userReasonForNoContact;
    }
}