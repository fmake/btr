<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id_order
 * @property string $i_need_to
 * @property string $description
 * @property string $date_completion
 * @property string $time_completion
 * @property integer $id_city
 * @property string $address
 * @property string $metro
 * @property string $i_willing_to_pay
 * @property string $price_buy_company
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property integer $id_type_work
 * @property string $url_referer
 * @property integer $date_create
 * @property integer $count_buy
 * @property string $active
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('i_need_to, date_completion, time_completion, address, metro, i_willing_to_pay, name, email, phone', 'required'),
			//array('id_city, id_type_work, date_create, count_buy', 'numerical', 'integerOnly'=>true),
			array('i_need_to, date_completion, time_completion, address, metro, i_willing_to_pay, name, email, phone', 'length', 'max'=>255),
            array('email', 'email'),
			//array('active', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_order, i_need_to, description, date_completion, time_completion, id_city, address, metro, i_willing_to_pay, price_buy_company, name, email, phone, id_type_work, url_referer, date_create, count_buy, active', 'safe', 'on'=>'search'),
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
			'id_order' => 'Id Order',
			'i_need_to' => 'Мне нужно',
			'description' => 'Описание',
			'date_completion' => 'Дата исполнения заказа',
			'time_completion' => 'Время исполнения заказа',
			'id_city' => 'Id города',
			'address' => 'Адрес',
			'metro' => 'Метро',
			'i_willing_to_pay' => 'Я готов заплатить',
			'price_buy_company' => 'Стоимость заявки',
			'name' => 'Имя',
			'email' => 'Email',
			'phone' => 'Телефон',
			'id_type_work' => 'Id типа работы',
			'url_referer' => 'С какой страницы пришел',
			'date_create' => 'Дата создания',
			'count_buy' => 'Сколько уже купило',
			'active' => 'Активность',
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

		$criteria->compare('id_order',$this->id_order);
		$criteria->compare('i_need_to',$this->i_need_to,true);
		$criteria->compare('description',$this->description,true);
		//$criteria->compare('date_completion',$this->date_completion,true);
		//$criteria->compare('time_completion',$this->time_completion,true);
		$criteria->compare('id_city',$this->id_city);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('metro',$this->metro,true);
		//$criteria->compare('i_willing_to_pay',$this->i_willing_to_pay,true);
		//$criteria->compare('price_buy_company',$this->price_buy_company,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('id_type_work',$this->id_type_work);
		$criteria->compare('url_referer',$this->url_referer,true);
		$criteria->compare('date_create',$this->date_create);
		//$criteria->compare('count_buy',$this->count_buy);
		$criteria->compare('active',$this->active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
