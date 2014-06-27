<?php
class Model
{
     function connect(){
        require_once "config_db.php";
        try{
            $connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
            $db = new PDO($connect_str,DB_USER,DB_PASS);
            return $this->db=$db;
        }
        catch(PDOException $e) {  
            echo $e->getMessage();  
}
     }
     function __destruct(){
       // $db=null;
     }
}
?>