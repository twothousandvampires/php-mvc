<?

class Data{

    public function __construct(){

        $this->DBNAME = "exampledb";
        $this->USER = "root";
        $this->PASSWORD = "";
        $this->SERVER = "localhost";
        $this->db = new PDO("mysql:host=$this->SERVER;dbname=$this->DBNAME", $this->USER, $this->PASSWORD);

    }

    public function getData($where=false){
        if($where){
            $result = [];

            $query = "SELECT * FROM feedback WHERE id=$where";

            $query = $this->db->prepare($query);
            
            $query->execute();

            for($i = 0; $row = $query->fetch(PDO::FETCH_ASSOC); $i ++ ){
                $result[$i] = [];
                foreach($row as $k => $v){
                    $result[$i][$k] = $v;
                }
            }

            $query->closeCursor(); 

            return $result[0];
        }
        else{
        $result = [];

        $query = "SELECT * FROM feedback";

        $query = $this->db->prepare($query);
        
        $query->execute();

        for($i = 0; $row = $query->fetch(PDO::FETCH_ASSOC); $i ++ ){
            $result[$i] = [];
            foreach($row as $k => $v){
                $result[$i][$k] = $v;
            }
        }

        $query->closeCursor(); 

        return $result;
        }
        
    }

    public function saveData($items){
        $query = "INSERT INTO feedback (name, email, content, edit, picture, accepted, date) VALUES(:name, :email, :content, :edit, :picture, :accepted, :date)";
        $query = $this->db->prepare($query);
        $query->execute(array(
            ":name" => $items['name'],
            ":email" => $items['email'],
            ":content" => $items['content'],
            ":edit" => 0,
            ":picture" => $items['picture'],
            ":accepted" => 0,
            ":date" => date("Y-m-d",time())
        ));
    }

    public function getUserData($name , $pass){
        $result = [];
        $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
        $pass = crypt($pass, $salt);

        $query = "SELECT * FROM users WHERE name = ? AND password = ?";

        $query = $this->db->prepare($query);
        
        $query->execute(array($name, $pass));

        for($i = 0; $row = $query->fetch(); $i++){
            $return[$i] = array();
            foreach($row as $key => $value){
                $return[$i][$key] = $value;
            }
        }
        if(!empty($return) && !empty($return[0])){             
            return true;
        }
        else{
            return false;
        }
    }

    public function updateAccept($id, $accept){
        $query = "UPDATE feedback SET accepted=$accept WHERE id=$id";

        $query = $this->db->prepare($query);

        $query->execute();
    }

    public function editPost($id, $content){
        
        $query = "UPDATE feedback SET content='$content',edit = 1 WHERE id=$id";
        $query = $this->db->prepare($query);
        $query->execute();

    }
}