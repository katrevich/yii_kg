<div class="content-title">Создание рубрики</div>

<?php

    $this->renderPartial('_form', array(
        'model'=>$model,
        'meta_model'=>$meta_model,
    ));