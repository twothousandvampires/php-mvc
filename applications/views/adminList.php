<?
    require_once('modules/admin_header.php');
?>

<? foreach($this->data as $item){ ?>
    <? if($item['accepted'] != '2'): ?>
    <div class = 'post border mb-5 border border-secondary p-4'>
        <div class='container-fluid d-flex flex-row align-items-center'>
            <h3 class = 'mr-3'><?=$item['name']?></h3>
            <? if($item['edit'] === '1'): ?>
            <p class = 'text-muted'>редактировано</p>
            <? endif; ?>
        </div>
        <div class = 'container-fluid'>
            <p><?= $item['content']?></p>
        </div>     
        <div  class = 'container-fluid'>
        <? if($item['picture'] != 'none'): ?>
            <img src='http://task1/images/<?=$item['picture']?>' alt="">
            <? endif; ?>
            <hr>
            <blockquote><?=$item['email']?></blockquote>
        </div>                        
        <div class = 'container-fluid'>
            <? if($item['accepted'] === '0'): ?>
            <a  class= 'btn btn-success' href="/admin/accept/id/<?=$item['id']?>">Подвердить</a>
            <a class= 'btn btn-danger' href="/admin/decline/id/<?=$item['id']?>">Отклонить</a>
            <? endif; ?>
            <a class= 'btn btn-warning' href="/admin/edit/id/<?=$item['id']?>">редактировать</a>
        </div>       
        </div>
    <? endif; ?>
<?}?>

<?
    require_once('modules/admin_footer.php')
?>