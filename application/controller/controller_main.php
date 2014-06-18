<?php
class Controller_Main extends Controller
{
    function action_index()
    {	
        //Проверяем авторизирован ли юзер и выводим соответствующий контент
        if(!$_SESSION['user']['login']){
        $this->view->generate('main_view.php', 'template_view.php');
        }
        else{
            header("location: /user");
        }
    }
}
?>