<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading<?= $model->id;?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $model->id?>" aria-expanded="true" aria-controls="collapse<?= $model->id?>">
          <?= $model->title;?>
        </a>
      </h4>
    </div>
    <div id="collapse<?= $model->id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?= $model->id;?>">
      <div class="panel-body">
        <?= $model->content;?>
      </div>
    </div>
  </div>