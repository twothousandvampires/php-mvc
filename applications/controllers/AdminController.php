<?
session_start();

class AdminController{
    
    public function indexAction(){
        $mc = MainController::getInstance();
        $view = new View();
        $result = $view->render('../views/adminLogin.php');
        $mc->setBody($result); 
    }
    
    // вход в админ кабинет
    
    public function loginAction(){
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $data = new Data();
            if($data->getUserData($_POST['name'], $_POST['password'])){
                $_SESSION['login'] = true;
                header("Location: ../admin/list");
            }
            else{
                header("Location: ../admin/index");
            }
        }
        else{
            header("Location: ../admin/index");
        }
        
    }

    //вывод всех постов

    public function listAction(){
        if($_SESSION['login']){
            $mc = MainController::getInstance();
            $view = new View();
            $data = new Data();
            $view->data = $data->getData();
            $result = $view->render('../views/adminList.php');
            $mc->setBody($result); 
        }    
        else{
            $this->loginAction();
        }  
    }

     //подтверждение поста

    public function acceptAction(){
        $mc = MainController::getInstance();
        $id = $mc->getParams()['id'];
        $data = new Data();
        $data->updateAccept($id, 1);
        header("Location: /admin/list");
    }

     //отклонение поста 

    public function declineAction(){
        $mc = MainController::getInstance();
        $id = $mc->getParams()['id'];
        $data = new Data();
        $data->updateAccept($id, 2);
        header("Location: /admin/list");
    }

    //редатирование поста 

    public function editAction(){
        if($_SESSION['login']){
            $mc = MainController::getInstance();
            $id = $mc->getParams()['id'];
            $data = new Data();
            $view = new View();
            $view->data = $data->getData($id);
            $result = $view->render('../views/adminEdit.php');
            $mc->setBody($result); 
        }
        else{
            $this->loginAction();
        }
    }

    public function saveEditAction(){

        $mc = MainController::getInstance();
        $id = $mc->getParams()['id'];
        $content = $_POST['content'];
        $data = new Data();
        $data->editPost($id, $content);
        
        header("Location: /admin/list");
             
    }

    public function logoutAction(){
        $_SESSION['login'] = false;
        header("Location: /");
    }
}