<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->registerJsFile('https://code.highcharts.com/highcharts.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('https://code.highcharts.com/modules/exporting.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('js/chart.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'Ресторанный день в Нижнем Новгороде';
?>

    <div class="front-banner">
        <h1>РЕСТОРАННЫЙ ДЕНЬ 21.11.2015</h1>

        <p class="lead">Нижний Новгород</p>

        <p><?= Html::a('Создать ресторан',['site/register'],['class' => 'btn btn-success btn-front']);?></p>
    </div>
    
<div class='container'>
<div class="site-index">


<br><br><br>
    <div class="body-content">

        <div class="row">
            <div class="col-sm-4">
                <h3>Концепция</h3>

                <p>Ресторанный день - это международный карнавал еды, когда каждый желающий может создать ресторан, кафе или бар на один день. Это может случиться где угодно: дома, в офисе, на улице, в саду или вашем дворе, в парке, или на пляже.</p>

                
            </div>
            <div class="col-sm-4">
                <h3>Факты</h3>

                <p>Ресторанный день - это крупнейший в мире фестиваль еды, он проходит во всем мире четыре раза в год. Общее число открытых однодневных ресторанов по всему миру насчитывает около 22 000! Более 88 000 рестораторов обслужили около 2,5 миллионов клиентов в 72 странах.</p>

                
            </div>
            <div class="col-sm-4">
                <h3>Правила</h3>

                <p>Пожалуйста, обратите внимание, что все рестораны с чисто коммерческими, политическими или религиозными целями или рестораны, связаные с существующими коммерческими брендами или рекламой коммерческих заведений, будут удалены.</p>

                
            </div>
        </div>
        
        <div class='row'>
            <div class="col-md-12">
                <h2 class="page-header"><span class='glyphicon glyphicon-option-vertical'></span> Выпускники ресторанного дня в Нижнем Новгороде</h2>
            </div>
            <div class="col-sm-1 text-center">
                <a href='https://vk.com/noot.toot' target='_blank'><img class="img-circle img-responsive img-center" src="/images/alumni_noot.jpg" alt=""></a>
            </div>
            <div class="col-sm-1 text-center">
                <a href='https://vk.com/madlen_nn' target='_blank'><img class="img-circle img-responsive img-center" src="/images/alumni_madlen.jpg" alt=""></a>
            </div> 
            <div class="col-sm-1 text-center">
                <a href='https://vk.com/freakadely' target='_blank'><img class="img-circle img-responsive img-center" src="/images/alumni_freakadely.jpg" alt=""></a>
            </div>
            <div class="col-sm-1 text-center">
                <a href='https://vk.com/jamfactory' target='_blank'><img class="img-circle img-responsive img-center" src="/images/alumni_jamfactory.jpg" alt=""></a>
            </div>
            <div class="col-sm-1 text-center">
                <a href='https://vk.com/burritofamily' target='_blank'><img class="img-circle img-responsive img-center" src="/images/alumni_burrito.jpg" alt=""></a>
            </div>
            <div class="col-sm-1 text-center">
                <a href='https://vk.com/time4wine_nn' target='_blank'><img class="img-circle img-responsive img-center" src="/images/alumni_time4wine.jpg" alt=""></a>
            </div>
            <div class="col-sm-1 text-center">
                <a href='https://vk.com/krendelbakery' target='_blank'><img class="img-circle img-responsive img-center" src="/images/alumni_kredel.jpg" alt=""></a>
            </div>
            <div class="col-sm-1 text-center">
                <a href='https://vk.com/cakeandpie' target='_blank'><img class="img-circle img-responsive img-center" src="/images/alumni_cakepike.jpg" alt=""></a>
            </div>

            
        </div>
        
        <div class='row'>
            <div class="col-md-12">
                <h2 class="page-header"><span class='glyphicon glyphicon-option-vertical'></span> Статистика ресторанного дня в Нижнем Новгороде</h2>
            </div>        
            <div id="container" style="min-width: 810px; height: 400px; margin: 0 auto"></div>    
        </div>
        
        <br><br><br><br><br><br>
        <div class='row'>
            
            <div class="col-md-12">
                <h2 class="page-header"><span class='glyphicon glyphicon-option-vertical'></span> Следить за ресторанным днем в Нижнем Новгороде</h2>
            </div>
            
            <div class='col-md-8'>
                <h3>Instagram #restaurantdaynn</h3>
                <!-- INSTANSIVE WIDGET --><script src="//instansive.com/widget/js/instansive.js"></script><iframe src="//instansive.com/widgets/ee5831598734a6c636973465fa5b606331d4fb44.html" id="instansive_ee58315987" name="instansive_ee58315987"  scrolling="no" allowtransparency="true" class="instansive-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
            </div>
            
            <div class='col-md-4'>
                <h3>www.vk.com</h3>
                <script type="text/javascript" src="//vk.com/js/api/openapi.js?117"></script>

                <!-- VK Widget -->
                <div id="vk_groups"></div>
                <script type="text/javascript">
                VK.Widgets.Group("vk_groups", {mode: 0, width: "320", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 70270964);
                </script>
            </div>
        </div>

    </div>
</div>

</div>
