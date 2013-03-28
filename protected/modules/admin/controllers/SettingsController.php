<?php

    class SettingsController extends Controller {

        public function actionIndex(){

            $model = Settings::model()->find();

            if ($model->meta_id)
                $meta_model = Meta::model()->findByPk($model->meta_id);
            else
                $meta_model = new Meta();

            $changePassword_model = new ChangePasswordForm();

            if (isset($_POST['ChangePasswordForm'])){

                $changePassword_model->attributes = $_POST['ChangePasswordForm'];

                if ($changePassword_model->validate()){

                    if ($model->password == $changePassword_model->pass_old){

                        $model->password = $changePassword_model->pass_new;

                        if ($changePassword_model->username_new) $model->username = $changePassword_model->username_new;

                        $model->save();

                    } else {
                        $changePassword_model->addError('pass_old', 'Неверный пароль');
                    }

                }

            }

            if (isset($_POST['Meta'])){
                $meta_model->attributes = $_POST['Meta'];
                if ($meta_model->validate()){
                    $meta_model->save();
                    $model->meta_id = $meta_model->id;
                }
            }

            if (isset($_POST['Settings'])){
                if ($model->validate()){
                    $model->save();
                }
            }

            $this->render('index', array(
                'model'=>$model,
                'meta_model'=>$meta_model,
                'changePassword_model'=>$changePassword_model
            ));

        }

    }