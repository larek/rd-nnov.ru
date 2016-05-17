<?php
/* @var $this yii\web\View */

$this->title = 'Лайки';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/js/like.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


?>
<h1>Лайки</h1>

<div class="row">

<div class="col-md-5">
	<h3>Лаки-мальчики</h3>
	<textarea class='like-boy form-control'  rows="5"><?= $model->boy?></textarea>
</div>



<div class="col-md-5">
	<h3>Лайки-девочки</h3>
	<textarea class='like-girl form-control'  rows="5"><?= $model->girl?></textarea>
</div>

<div class="col-md-2">
	<img src="/images/russko_evropeyskie_layki.jpg" class='thumbnail img-responsive img' style='margin: 54px 0px 0px 0px;'>	
	<span class='btn btn-default btn-update-like' style='width:100%'>Обновить</span>
</div>

</div>

<br>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
	<table class="table table-striped">
		<tr>
			<th></th>
			<th>Среднее</th>
			<th>Медианное</th>
		</tr>		<tr>
			<td>Мальчики</td>
			<td>
				<? 
					$boy_array = explode(",",$model->boy);
					$middle_boy = array_sum($boy_array)/count($boy_array); 
					echo $middle_boy;
				?>
			</td>
			<td>
				<?
					sort($boy_array, SORT_NUMERIC);
					$count = count($boy_array);
					if ($count % 2 != 0){
					    $med = floor($count/2);
					    //echo "медиана массива: позиция $med, элемент $boy_array[$med]";
					    echo $boy_array[$med];
					}
					else {
					    $med = $count/2;
					    $two = $boy_array[$med];
					    $one = $boy_array[$med-1];
					    // echo "медиана массива: позиция " . ($med-1) . " и " .$med. ", сумма " . ($one+$two)/2;
						echo ($one+$two)/2;
					}
				?>
			</td>
		</tr>		<tr>
			<td>Девочки</td>
			<td>
			<? 
					$girl_array = explode(",",$model->girl);
					$middle_girl = array_sum($girl_array)/count($girl_array); 
					echo $middle_girl;
				?>
			</td>
			<td>
				
				<?
					sort($girl_array, SORT_NUMERIC);
					$count = count($girl_array);
					if ($count % 2 != 0){
					    $med = floor($count/2);
					    // echo "медиана массива: позиция $med, элемент $girl_array[$med]";
					    echo $girl_array[$med];
					}
					else {
					    $med = $count/2;
					    $two = $girl_array[$med];
					    $one = $girl_array[$med-1];
					    // echo "медиана массива: позиция " . ($med-1) . " и " .$med. ", сумма " . ($one+$two)/2;
					    echo ($one+$two)/2;
					}
				?>
			</td>
		</tr>
	</table>
	</div>
</div>
