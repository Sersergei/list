<?php
    class Model_user extends Model{
        public function reg($data){
            $result=Model::connect()->prepare("INSERT INTO users(login,email,password) VALUES (:login,:email,:password)");
            $result->execute($data);
        }
        public function avto($arr){
            $result=Model::connect()->prepare("SELECT `id`,`login` FROM `users` WHERE email=:email and password=password");
            $result->execute($arr);
            $result=$result->fetch();
            return $result;
        }
        function select_list($user){
            $result=Model::connect()->prepare("SELECT `id`,`name` FROM `list` WHERE user_id=?");
            $result->execute($user);
            return $result;
        }
        function select_list_part($id) {
           $result=Model::connect()->prepare(" SELECT *FROM list l INNER JOIN list_user u ON u.list_id = l.id WHERE u.user_id =?");
           $result->execute($id);
           return $result;
        }
    }
?>