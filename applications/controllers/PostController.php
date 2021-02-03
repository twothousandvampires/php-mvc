<?

class PostController{
    public $pic_name, $name, $email, $content;
    
    public function newAction(){

        // если изображение больше 320 на 240
        if($_FILES['picture']['size'] != 0){

            $fileTmpName = $_FILES['picture']['tmp_name'];

            $fi = finfo_open(FILEINFO_MIME_TYPE);

            $mime = (string) finfo_file($fi, $fileTmpName);

            $formats = array('image/jpeg', ' image/png', 'image/gif');
            $type = explode('/', $mime)[1];
            if(in_array($mime, $formats)){

                $pic_name= uniqid() . '.' .$type;
                move_uploaded_file($fileTmpName,"images/$pic_name");
                
                list($w_i, $h_i, $type) = getimagesize("images/$pic_name"); // Получаем размеры и тип изображения (число)

                if($w_i > 320 || $h_i > 240){
                  $types = array("", "gif", "jpeg", "png"); 
                  $ext = $types[$type]; 
                      
                  $func = 'imagecreatefrom'.$ext;
                  $img_i = $func("images/$pic_name"); 
                   
                      
                  $img_o = imagecreatetruecolor(320, 240); 
                  imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, 320, 240, $w_i, $h_i); 
                  $func = 'image'.$ext; 
                  $func($img_o, "images/$pic_name"); 
                }                  
            }
            else{
                header("Location: ../index/index/error/wrongImageType");
            }
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $content = $_POST['content'];
        $data = new Data();
        $data->saveData(array(
          'name' => $name,
          'email' =>$email,
          'content' =>$content,
          'picture' =>$pic_name ? $pic_name : 'none'
        ));
        header("Location: ../index/index");
    }
}