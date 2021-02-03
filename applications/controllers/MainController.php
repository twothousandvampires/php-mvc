<?

class MainController{

    protected $_controller, $_action, $_params, $_body;
    static $_instance;

    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct(){

        $request= $_SERVER['REQUEST_URI'];
        $split_req = explode('/' , trim($request, '/'));

        // получение контроллера или назначение по умолчанию

        $this->_controller = $split_req[0] ? ucfirst($split_req[0])."Controller" : "IndexController";
        $this->_action = $split_req[1] ? $split_req[1]. "Action" : "IndexAction";

        // если есть параметры

        if($split_req[2]){
            $keys = $values = [];
            for($i = 2; $i < count($split_req); $i++){
                if($i % 2 == 0){
                    $keys[] = $split_req[$i];
                }
                else{
                    $values[] = $split_req[$i];
                }
            }
            $this->_params = array_combine($keys, $values);
        }
    }

    // роутинг

    public function route(){
        if(class_exists($this->getController())){
            $reflect = new ReflectionClass($this->getController());
            if($reflect->hasMethod($this->getAction())){
                $controller = $reflect->newInstance();
                $method = $reflect->getMethod($this->getAction());
                $method->invoke($controller);
            }
        }
    }


    // вспомогательные методы

    public function getController(){
        return $this->_controller;
    }
    public function getAction(){
        return $this->_action;
    }
    public function getParams(){
        return $this->_params;
    }
    public function setBody($body){
        $this->_body = $body;
    }
    public function getBody(){
        return $this->_body;
    }
}