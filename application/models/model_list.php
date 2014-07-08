<?php
    class Model_list extends Model{
        function list_edd($name,$user){
            $result=Model::connect()->prepare("INSERT INTO list(name,user_id) VALUES (:name,:user)");
            $result->execute($data);
            return $result;
        }
        function list_view($id){
            $result['result']=Model::connect()->query("SELECT * FROM `list` WHERE id='$id'");
            $result=Model::connect()->query("SELECT * FROM `list` WHERE id='$id'");
            $result=$result->fetch();
            return $result;
        }
        function list_goods($id){
            $result=Model::connect()->prepare("SELECT * FROM `goods` WHERE id_list=?");
            $result->execute($id);
            return $result;
        }
        function list_add_goods($arr,$id_list){
            $arr['id_list']=$id_list;
            $result=Model::connect()->prepare("INSERT INTO goods(name_goods,price,measure,qti,id_list) VALUES(:name_goods,:price,:measure,:qti,:id_list)");
            $result->execute($arr);
            return $result;
        }
        function list_del_goods($id){
            $result=Model::connect()->prepare("DELETE FROM `goods` WHERE `id`=:id");
            $result->execute($id);
        }
        function list_del($id){
            $result=Model::connect()->query("DELETE FROM `list` WHERE `id`=:id");
            if($result->execute($id)){
                $result=Model::connect()->query("DELETE FROM `goods` WHERE id_list=:id ");
                $result->execute($id);
            }
            return $result;
        }
        function user($email){
            $result=Model::connect()->prepare("SELECT `id` FROM `users` WHERE email=:email");
            $result->execute($email);
            return $result;
        }
        function user_list_valid($user_id,$list_id){
            $result=Model::connect()->prepare("SELECT * FROM list_user WHERE user_id=? and list_id=?");
            $result->execute(array($user_id,$list_id));
            return $result;
            
        }
        function list_user_add($user_id,$list_id){
            $result=Model::connect()->prepare("INSERT INTO list_user(user_id,list_id) VALUES(?,?)");
            $result->execute(array($user_id,$list_id));
            return $result;
        }
        function list_bloc($id,$date,$bloc_user_id,$bloc=1){
            $result=Model::connect()->prepare("UPDATE `list`SET `bloc`=:bloc, `last_upd`=:date, `bloc_user_id`=:bloc_user_id WHERE `id`=:id ");
            $result->bindParam(":bloc",$bloc);
            $result->bindParam(":date",$date);
            $result->bindParam(":bloc_user_id",$bloc_user_id);
            $result->bindParam(":id",$id);
            $result->execute();
        }
          function list_ajax($id,$date){
            $result=Model::connect()->prepare("UPDATE `list`SET `bloc`='1', `last_upd`=?  WHERE `id`=? ");
            $result->execute(array($date,$id));
        }
         
    }
?>