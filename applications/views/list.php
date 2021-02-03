<?
    require_once('modules/header.php');
    if(isset($this->params['sortby'])){
        $by = $this->params['sortby'];
        switch($by){
            case 'name':
                function compare($a, $b){
                    if($a['name'] == $b['name']){
                        return 0;
                    }
                    return $a['name']  < $b['name'] ? -1 : 1;
                } 
                
            break;
            case 'email':
                function compare($a, $b){
                    if($a['email'] == $b['email']){
                        return 0;
                    }
                    return $a['email']  < $b['email'] ? -1 : 1;
                } 
                
            break;
            case 'date':
                function compare($a, $b){
                    if($a['date'] == $b['date']){
                        return 0;
                    }
                    return $a['date']  < $b['date'] ? 1 : -1;
                } 
            break;
        }            
        usort($this->data, 'compare');
    }
?>

<? foreach($this->data as $item){ ?>
    <? if($item['accepted'] === '1') :?>
    <div class = 'post border mb-5 border border-secondary'>
        <div class='container-fluid d-flex flex-row align-items-center'>
            <h3 class = 'mr-3'><?=$item['name']?></h3>
            <? if($item['edit'] === '1'): ?>
            <p class = 'text-muted'>редактировано</p>
            <? endif; ?>
        </div>
        <div class = 'container-fluid'>
            <p class= 'p-4'><?= $item['content']?></p>
        </div>
        <div class = 'container-fluid'>
            <? if($item['picture'] != 'none'): ?>
            <img src='http://task1/images/<?=$item['picture']?>' alt="">
            <? endif; ?>
            <hr>
            <blockquote><?=$item['email']?></blockquote>
        </div>          
        <? endif;?>
    </div>
<?}?>

<form method="post" enctype="multipart/form-data" action='/post/new'>
    <div class = 'container-fluid d-flex flex-column mb-2'>
        <label for="content">Ваш отзыв:</label>
        <textarea id='content' name="content" cols="100" rows="10" minlength = '20' required=''></textarea >
    </div>
    <div class = 'container-fluid d-flex justify-start flex-column'>
        <div>
            <label class='mr-2' for="name">Ваше имя:</label>
            <input  id= 'name' type="text" name="name" placeholder='ваше полное имя' required=''>
        </div> 
        <br>
        <div>
            <label class='mr-2' for="email">Ваша почта:</label>
            <input  id='email' type="email" name="email" placeholder='адрес почты' required=''>
        </div>
    <br>
    </div>
    <div class = 'container-fluid d-flex flex-column justify-start'>
        <label for="pic">Прикрепить файл. Допустимые форматы: JPG, GIF, PNG.</label>
        <input  class = 'btn' id ='pic' type="file" name="picture">
    </div>
    <br>
    <div class = 'd-flex flex-row justify-start'>
        <p class= 'mr-3'> <button class="btn btn-success" type="submit">Отправить</button></p>   
        <p class="btn btn-info" id = 'preview'>Предварительный просмотр</p>
    </div>
 </form>

<?
    require_once("modules/footer.php");
?>