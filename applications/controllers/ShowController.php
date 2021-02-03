<?

class ShowController{
    public function showAction(){
        
        $mc = MainController::getInstance();
        $params = $mc->getParams();
        foreach($params as $k => $v){
            echo "$k : $v\n";
        }
    }
   
}