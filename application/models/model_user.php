<?php
    class Model_user extends Model{
        public function reg($login,$password,$email){
            $result=Model::query("INSERT INTO users(login,email,password) VALUES ('$login','$email','$password')");
        }
        public function avto($arr){
            $result=Model::query("SELECT `id`,`login` FROM `users` WHERE email='{$arr['email']}' and password='{$arr['password']}'");
            $result=mysql_fetch_array($result);
            return $result;
        }
        function select_list($user){
            $result=Model::query("SELECT `id`,`name` FROM `list` WHERE user_id='$user'");
            return $result;
        }
        function select_list_part($id) {
           $result=Model::query(" SELECT *FROM list l INNER JOIN list_user u ON u.list_id = l.id WHERE u.user_id = '$id'");
           return $result;
        }
    }
?>