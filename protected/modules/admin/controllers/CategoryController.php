<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sin
 * Date: 27.03.13
 * Time: 19:03
 * To change this template use File | Settings | File Templates.
 */
class CategoryController extends Controller
{

    public function actionIndex(){

        $data = new CActiveDataProvider('Category', array(

        ));


        $this->render('index', array(
            'data'=>$data
        ));

    }

    public function actionAdd(){

        $model = new Category();

        $meta_model = new Meta();

        if (isset($_POST['Meta'])){
            $meta_model->attributes = $_POST['Meta'];
            if ($meta_model->validate()){
                $meta_model->save();
                $model->meta_id = $meta_model->id;
            }
        }

        if (isset($_POST['Category'])){
            $model->attributes = $_POST['Category'];

            $model->logo_file = CUploadedFile::getInstance($model, 'logo_file');

            $savePath = Yii::app()->basePath.'/../uploads/';

            if ($model->validate()){
                $model->logo_file->saveAs($savePath.'original_'.$model->logo_file->name);

                $ih = new CImageHandler();
                $ih->load($savePath . 'original_'.$model->logo_file->name)
                    ->adaptiveThumb(50, 50)
                    ->save($savePath . 'thumb_50x50_'.$model->logo_file->name);

                $model->logo = $model->logo_file->name;

                $model->save();
                $this->redirect($this->createUrl('index'));
            }
        }

        $this->render('update', array(
            'model'=>$model,
            'meta_model'=>$meta_model,
        ));

    }

    public function actionUpdate($id){

        $model = Category::model()->findByPk($id);

        if ($model->meta_id)
            $meta_model = Meta::model()->findByPk($model->meta_id);
        else
            $meta_model = new Meta();

        if (isset($_POST['Meta'])){
            $meta_model->attributes = $_POST['Meta'];
            if ($meta_model->validate()){
                $meta_model->save();
                $model->meta_id = $meta_model->id;
            }
        }

        if (isset($_POST['Category'])){
            $model->attributes = $_POST['Category'];
            if ($model->validate()){
                $model->save();
                $this->redirect($this->createUrl('index'));
            }
        }

        $this->render('update', array(
            'model'=>$model,
            'meta_model'=>$meta_model,
        ));

    }

    public function actionDelete($id){
        if (Yii::app()->request->isPostRequest)
            Category::model()->findByPk($id)->delete();
    }

}
