<div class="content-title">Редактирование рубрики &laquo;<?php echo $model->name; ?>&raquo;</div>

<?php

    $this->renderPartial('_form', array(
        'model'=>$model,
        'meta_model'=>$meta_model,
    ));