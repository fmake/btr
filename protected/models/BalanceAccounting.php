<?php

/**
 * This is the model class for table "balance_accounting".
 *
 * The followings are the available columns in table 'balance_accounting':
 * @property integer $id_user
 * @property integer $id_operation
 * @property integer $balance_old
 * @property integer $balance_new
 * @property integer $date_create
 */
class BalanceAccounting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'balance_accounting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id_user, id_operation, balance_old, balance_new, date_create', 'required'),
			//array('id_user, id_operation, balance_old, balance_new, date_create', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user, id_operation, balance_old, balance_new, date_create', 'safe', 'on'=>'search'),
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
			'id_user' => 'Id User',
			'id_operation' => 'Id Operation',
			'balance_old' => 'Balance Old',
			'balance_new' => 'Balance New',
			'date_create' => 'Date Create',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_operation',$this->id_operation);
		$criteria->compare('balance_old',$this->balance_old);
		$criteria->compare('balance_new',$this->balance_new);
		$criteria->compare('date_create',$this->date_create);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BalanceAccounting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
