<?

class IndexController{
    public function indexAction(){
        $mc = MainController::getInstance();
        $data = new Data();
        $data = $data->getData();
        $view = new View();
        $view->data = $data;
        $view->params = $mc->getParams();
        $result = $view->render('../views/list.php');
        $mc->setBody($result);
    }
}