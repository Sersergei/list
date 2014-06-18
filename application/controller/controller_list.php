<?php
// Клас работы со списком покупок
class Controller_list extends Controller{
    function __construct(){
        //Если пользователь неавторизирован ему запрещаеться работать со списком
        parent::__construct();
        if(!$_SESSION['user']['login']){
            header("location: / ");
        }
    }
    function action_index(){
        
    }
     function action_view(){
        header("Refresh: 10");
        $result=Model_list::list_view($_GET['id']);
        $result1=Model_list::list_goods($_GET['id']);
        $result['result']=$result1;
        $this->view->generate('list__view.php','template_view.php',$result);
      
    }
     function action_new(){
        //вункция создания нового списка
        
        if(empty($_POST['list'])){
            $this->view->generate('list_new_view.php','template_view.php',$data);
        }
        else{
            $insert=$this->validate($_POST['list']);
            $result=model_list::list_edd($insert,$_SESSION['user']['id']);
            if($result){
                header("location: /user");
            }
            
            
        }
    }
     function action_update(){
        
        if($_POST){//если переданы данные из формы редактирования
            if($_POST['del_id']){  // если нажата кнопка удалить продукт
                $result=Model_list::list_del_goods($_POST['del_id']);
                }

            elseif($_POST['del_list']){ //удалить список
                $result=Model_list::list_del($_POST['del_list']);
                if($result){
                    header("location: /user");
                }
            }
            elseif($_POST['add_user']){
                $result=Model_list::user($_POST['add_user']);
                 if(!$user_id=mysql_fetch_array($result)){
                    $error="Такой пользователь не зарегистрирован";
                }
                else{
                               
                    $result=Model_list::user_list_valid($user_id['id'],$_GET['id']);
                    if(mysql_fetch_array($result)){
                        $error="Такой пользователь уже имеет права на этот список";
                    }
                    else{
                        $result=Model_list::list_user_add($user_id['id'],$_GET['id']);
                        if($result){
                          $error="Пользователь успешно добавлен";
                             }
                    } 
                }
                
            }
            else{
            $result=Model_list::list_add_goods($_POST,$_GET['id']);
            }
        }
        $result=Model_list::list_view($_GET['id']);
        $date=date("U")-$result['last_upd'];
        if ($date<180 or ($result['bloc']==1 and $result['bloc_user_id']!=$_SESSION['user']['id']) ){     //Проверяем блокипрвку
        $result="Запись редактируеться другим пользователем";
        $this->view->generate('list_error_view.php','template_view.php',$result);
        } else{
            $date=date("U");
            $result=Model_list::list_bloc($_GET['id'],$date,$_SESSION['user']['id']);
            $result1=Model_list::list_goods($_GET['id']);
            $result['result']=$result1;
            $this->view->generate('list_update_view.php','template_view.php',$result);
            
        }
        $result['error']=$error;
        
        
    }
   
    function validate($arr) {
        //проверка введенных данных 
        $valid=trim(strip_tags($arr));
        return $valid;
        }
    function action_ajax(){
        
        $date=date("U");
        Model_list::list_ajax($_POST['data'],$date);
    }
    function action_unbloc(){
        $result=Model_list::list_bloc($_GET['id'],0,0,0);
       header("location: /list/view/?id=".$_GET['id']."");
    }
}
?>