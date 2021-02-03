<?

class SortController{
    public function sortbyAction(){

        $sortby = $_POST['sort'];
        
        switch($sortby){
            case  "name":
                header('Location: ../index/index/sortby/name');
            break;
            case  "email":
                header('Location: ../index/index/sortby/email');
            break;
            case  "date":
                header('Location: ../index/index/sortby/date');
            break;
        }
    }
}