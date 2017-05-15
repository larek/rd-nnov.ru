<?


$this->registerJsFile('/kladrapi/jquery.kladr.min.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/kladrapi/examples/js/simple.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/js/limit.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/js/register.js?v=1.0.2',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerCssFile('/kladrapi/jquery.kladr.min.css');

$this->title = "Регистрация ресторана";
$this->params['breadcrumbs'][] = ['label' => 'Рестораны', 'url' => ['restaurant/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

  <div class="panel panel-default">
    <div class="panel-heading">Регистрация ресторана</div>
    <div class="panel-body">

    <div class='col-md-6'>
        <div class="form-group">
            <label class="required-label control-label"><abbr title="Обязательно заполнить">*</abbr> Название ресторана</label>
          <input class="title required form-control"  placeholder="" >
        </div>


        <div class="form-group">
            <label class="control-label">Концепция ресторана <span class="text-info text-info-register" id='infodiv-concept'>Не более 140 символов</span></label>
            <textarea rows='3' id='concept' class='concept form-control'></textarea>
        </div>

        <div class="form-group ">
            <label class="control-label">Основные блюда <span class="text-info text-info-register" id='infodiv-menu'>Не более 140 символов</span></label>
            <textarea rows='3' id='menu' class='menu form-control'></textarea>
        </div>

        <div class="form-group">
            <label class="required-label control-label"><abbr title="Обязательно заполнить">*</abbr> Адрес в Нижнем Новгороде</label>
            <input class="address_street required form-control "  name="street" placeholder="Улица" >
        </div>

        <div class="form-group">
            <input class="address_building required form-control" name="building" placeholder="Номер дома" >
        </div>



        <div class="form-group">
            <label class="control-label">Пояснение к адресу</label>
        <input class="address_comment form-control" placeholder="Например, вход через арку">
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
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                        <option>13:00</option>
                        <option>13:30</option>
                        <option>14:00</option>
                        <option>14:30</option>
                        <option>15:00</option>
                        <option>15:30</option>
                        <option>16:00</option>
                        <option>16:30</option>
                        <option>17:00</option>
                        <option>17:30</option>
                        <option>18:00</option>
                        <option>18:30</option>
                        <option>19:00</option>
                        <option>19:30</option>
                        <option>20:00</option>
                        <option>20:30</option>
                        <option>21:00</option>
                        <option>21:30</option>
                        <option>22:00</option>
                        <option>22:30</option>
                        <option>23:00</option>
                    </select>

                </td>
                <td>до</td>
                <td>
                <select class='time2 required form-control'>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                        <option>13:00</option>
                        <option>13:30</option>
                        <option>14:00</option>
                        <option>14:30</option>
                        <option>15:00</option>
                        <option>15:30</option>
                        <option>16:00</option>
                        <option>16:30</option>
                        <option>17:00</option>
                        <option>17:30</option>
                        <option>18:00</option>
                        <option>18:30</option>
                        <option>19:00</option>
                        <option>19:30</option>
                        <option>20:00</option>
                        <option>20:30</option>
                        <option selected>21:00</option>
                        <option>21:30</option>
                        <option>22:00</option>
                        <option>22:30</option>
                        <option>23:00</option>
                        <option>До последней порции</option>
                    </select>
                </td>
            </tr>
        </table>
        </div>

        <div class="form-group">
            <label class="control-label">Телефон для связи</label>
        <input class="phone form-control">
        </div>

        <div class="form-group">
            <label class="control-label"><abbr title="Обязательно заполнить">*</abbr> Страница в соцсетях</label>
        <input class="soc_pagev required form-control" placeholder="Например, https://vk.com/alco4">
        </div>

        <div class="form-group">
            <label class="control-label"><abbr title="Обязательно заполнить">*</abbr> Ссылка на пост для анонса в группу ресторанного дня <span class="text-info text-info-register">Требования к анонсу: 1) Содержит информацию блюдах, месте и времени работы однодневного ресторана. 2) В тексте нет упоминаний коммерческих брендов и рекламы чего-либо, кроме самого однодневного ресторана</span></label>
        <input class="link required form-control" placeholder="Например, https://vk.com/alco4?w=wall-56539720_428%2Fall">
        </div>

        <div class="form-group">
            <label class="control-label"><abbr title="Обязательно заполнить">*</abbr> email для редактирования своей анкеты</label>
        <input class="email required form-control" placeholder="">
        </div>

         <span class="btn btn-default btn-register">Создать ресторан</span>

         <br><br>
         <div class='infowrap'></div>

    </div>







    </div>
  </div>
