<?
use yii\helpers\Html;
use yii\helpers\Url;

 $time_array = [
                        '09:00',
                        '09:30',
                        '10:00',
                        '10:30',
                        '11:00',
                        '11:30',
                        '12:00',
                        '12:30',
                        '13:00',
                        '13:30',
                        '14:00',
                        '14:30',
                        '15:00',
                        '15:30',
                        '16:00',
                        '16:30',
                        '17:00',
                        '17:30',
                        '18:00',
                        '18:30',
                        '19:00',
                        '19:30',
                        '20:00',
                        '20:30',
                        '21:00',
                        '21:30',
                        '22:00',
                        '22:30',
                        '23:00'
                            
                            ]; 
                            
 $time_array2 = [
                        '09:00',
                        '09:30',
                        '10:00',
                        '10:30',
                        '11:00',
                        '11:30',
                        '12:00',
                        '12:30',
                        '13:00',
                        '13:30',
                        '14:00',
                        '14:30',
                        '15:00',
                        '15:30',
                        '16:00',
                        '16:30',
                        '17:00',
                        '17:30',
                        '18:00',
                        '18:30',
                        '19:00',
                        '19:30',
                        '20:00',
                        '20:30',
                        '21:00',
                        '21:30',
                        '22:00',
                        '22:30',
                        '23:00',
                        'До последней порции',    
                            ]; 
                            
$this->registerJsFile('/kladrapi-jsclient/jquery.kladr.min.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/kladrapi-jsclient/examples/js/simple.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/js/limit.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/js/register.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerCssFile('/kladrapi-jsclient/jquery.kladr.min.css');

$this->title = "Обновление ресторана ". $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Рестораны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?
if($model->is_active == 0 || $model->is_active == 2){
    echo Html::beginTag('div',['class' => 'alert alert-info']);
    echo "<span class='glyphicon glyphicon-info-sign'></span> Ваша анкета успешно зарегистрирована и должна пройти модерацию. <br>Сохраните ссылку на эту страницу для того, чтобы иметь возможность редактировать информацию" ;
    echo Html::endTag('div');
}
else{
    echo Html::beginTag('div',['class' => 'alert alert-success']);
    echo "<span class='glyphicon glyphicon-ok'></span> Ваша анкета успешно прошла модерацию. <br>Если вы хотите обновить информацию, то анкета будет заново отправлена на модерацию" ;
    echo Html::endTag('div');    
}
?>
  <div class="panel panel-default">
    <div class="panel-heading">Обновление информации о ресторане</div>
    <div class="panel-body">
    
    <div class='col-md-6'>
        <div class="form-group">
            <label class="required-label control-label"><abbr title="Обязательно заполнить">*</abbr> Название ресторана</label>
          <input class="title required form-control"  placeholder="" value='<?= $model->title?>'>
        </div>
        
        
        <div class="form-group">
            <label class="control-label">Концепция ресторана <span class="text-info text-info-register" id='infodiv-concept'>Не более 140 символов</span></label>
            <textarea rows='3' id='concept' class='concept form-control'><?= $model->concept?></textarea>
        </div>
        
        <div class="form-group ">
            <label class="control-label">Основные блюда <span class="text-info text-info-register" id='infodiv-menu'>Не более 140 символов</span></label>
            <textarea rows='3' id='menu' class='menu form-control'><?= $model->menu?></textarea>
        </div>
        
        <div class="form-group">
            <label class="required-label control-label"><abbr title="Обязательно заполнить">*</abbr> Адрес в Нижнем Новгороде</label>
            <input class="address_street required form-control "  name="street" placeholder="Улица" value='<?= $model->address_street?>' >
        </div>

        <div class="form-group">
            <input class="address_building required form-control" name="building" placeholder="Номер дома" value='<?= $model->address_building?>'>
        </div>
        
        
        
        <div class="form-group">
            <label class="control-label">Пояснение к адресу</label>
        <input class="address_comment form-control" placeholder="Например, вход через арку" value='<?= $model->address_comment?>'>
        </div>
    
    </div>
    <div class='col-md-6'>
    
        <div class="form-group">
            <label class=" control-label"><abbr title="Обязательно заполнить">*</abbr> Режим работы</label>
        <table>
            <tr>
                <td>от</td>
                <td>
                    <select class='time required form-control'>
                        
                        <?
                        foreach($time_array as $item){
                            echo $item == $model->time ? Html::tag('option',$item,['selected' => 'selected']) : Html::tag('option',$item);
                        }
                        ?>
                        
                    </select>
                    
                </td>
                <td>до</td>
                <td>
                <select class='time2 required form-control'>
                        <?
                        foreach($time_array2 as $item){
                            echo $item == $model->time2 ? Html::tag('option',$item,['selected' => 'selected']) : Html::tag('option',$item);
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        </div>
    
        <div class="form-group">
            <label class="control-label">Телефон для связи</label>
        <input class="phone form-control" value='<?= $model->phone?>'>
        </div>
        
        <div class="form-group">
            <label class="control-label"><abbr title="Обязательно заполнить">*</abbr> Страница в соцсетях</label>
        <input class="soc_pagev required form-control" placeholder="Например, https://vk.com/alco4" value='<?= $model->soc_pagev?>'>
        </div>
        
        <div class="form-group">
            <label class="control-label"><abbr title="Обязательно заполнить">*</abbr> Ссылка на пост для анонса в группу ресторанного дня</label>
        <input class="link required form-control" placeholder="Например, https://vk.com/alco4?w=wall-56539720_428%2Fall" value='<?= $model->link?>'>
        </div>
        
        <div class="form-group">
            <label class="control-label"><abbr title="Обязательно заполнить">*</abbr> email для редактирования своей анкеты</label>
        <input class="email required form-control" placeholder="" value='<?= $model->email?>'>
        </div>
        
         <span class="btn btn-default btn-updaterest" id="<?= $model->id?>">Обновить информацию</span>
         
         <br><br>
         <div class='infowrap'></div>
    
    </div>
    

   

 
 

    </div>
  </div>

