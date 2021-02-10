<?php
  class DbConnection{

    const SERVERNAME = "localhost";
    const DBNAME = "prefa";
    const USERNAME = "root";
    const PASSWORD = "";

    function connect(){      
      $conn = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);
      return $conn; 
    }
  }