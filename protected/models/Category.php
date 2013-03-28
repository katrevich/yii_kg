<?php

/**
 * This is the model class for table "tbl_category".
 *
 * The followings are the available columns in table 'tbl_category':
 * @property integer $id
 * @property string $title
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */

    public $logo_file;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name, logo', 'length', 'max'=>255),
			array('logo_file', 'file', 'types'=>'gif, png, jpg', 'allowEmpty'=>true, 'on'=>'update, add'),
			array('id, name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
            'logo' => 'Изображение рубрики'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeSave(){
        if(!parent::beforeSave())
            return false;

        if(($this->scenario=='insert' || $this->scenario=='update') &&
            ($logo_file=CUploadedFile::getInstance($this,'logo_file'))){
            $this->deleteFile();

            $this->logo=$logo_file;
            $this->logo->saveAs(
                Yii::getPathOfAlias('webroot.uploads').DIRECTORY_SEPARATOR."original/".$this->logo);

            $ih = new CImageHandler();
            $ih->load(Yii::getPathOfAlias('webroot.uploads').DIRECTORY_SEPARATOR."original/".$this->logo)
                ->adaptiveThumb(50, 50)
                ->save(Yii::getPathOfAlias('webroot.uploads').DIRECTORY_SEPARATOR."thumb_50x50/".$this->logo);
        }
        return true;
    }

    protected function beforeDelete(){
        if(!parent::beforeDelete())
            return false;
        $this->deleteFile(); // удалили модель? удаляем и файл
        return true;
    }

    public function deleteFile(){
        $path=Yii::getPathOfAlias('webroot.uploads').DIRECTORY_SEPARATOR."original/".
            $this->logo;
        if(is_file($path))
            unlink($path);

        $path=Yii::getPathOfAlias('webroot.uploads').DIRECTORY_SEPARATOR."thumb_50x50/".
            $this->logo;
        if(is_file($path))
            unlink($path);
    }

}