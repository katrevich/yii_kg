<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ChangePasswordForm extends CFormModel
{
    public $username_new;

    public $pass_old;
    public $pass_new;
    public $pass_new2;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            array('pass_old, pass_new, pass_new2', 'required'),
            array('username_new', 'length', 'max'=>255),
            array('pass_new2', 'compare', 'compareAttribute'=>'pass_new', 'message'=>'Пароли не совпадают'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'username_new'=>'Новое имя',
            'pass_old'=>'Текущий пароль',
            'pass_new'=>'Новый',
            'pass_new2'=>'Подтвердите новый',
        );
    }
}