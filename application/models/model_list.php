<?php
    class Model_list extends Model{
        function list_edd($name,$user){
            $result=Model::query("INSERT INTO list(name,user_id) VALUES ('$name','$user')");
            return $result;
        }
        function list_view($id){
            $result=Model::query("SELECT * FROM `list` WHERE id='$id'");
            $result=mysql_fetch_array($result);
            return $result;
        }
        function list_goods($id){
            $result=Model::query("SELECT * FROM `goods` WHERE id_list='$id'");
            return $result;           
        }
        function list_add_goods($arr,$id_list){
            $result=Model::query("INSERT INTO goods(name_goods,price,measure,qti,id_list ) VALUES('{$arr['name_goods']}','{$arr['price']}','{$arr['measure']}','{$arr['qti']}','$id_list')");
            return $result;
        }
        function list_del_goods($id){
            $result=Model::query("DELETE FROM `goods` WHERE `id`='$id'");
        }
        function list_del($id){
            $result=Model::query("DELETE FROM `list` WHERE `id`='$id'");
            if($result){
                $result=Model::query("DELETE FROM `goods` WHERE id_list='$id' ");
            }
            return $result;
        }
        function user($email){
            $result=Model::query("SELECT `id` FROM `users` WHERE email='$email'");
            return $result;
        }
        function user_list_valid($user_id,$list_id){
            $result=Model::query("SELECT * FROM list_user WHERE user_id='$user_id' and list_id='$list_id'");
            return $result;
            
        }
        function list_user_add($user_id,$list_id){
            $result=Model::query("INSERT INTO list_user(user_id,list_id) VALUES('$user_id','$list_id')");
            return $result;
        }
        function list_bloc($id,$date,$bloc_user_id,$bloc=1){
            $result=Model::query("UPDATE `list`SET `bloc`='$bloc', `last_upd`='$date', `bloc_user_id`='$bloc_user_id' WHERE `id`='$id' ");
        }
          function list_ajax($id,$date){
            $result=Model::query("UPDATE `list`SET `bloc`='1', `last_upd`='$date'  WHERE `id`='$id' ");
        }
         
    }
?>