<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id_user
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $comment
 * @property integer $date
 * @property integer $date_create
 * @property integer $id_company
 * @property integer $balance
 * @property string $active
 */
class User extends CActiveRecord
{

    public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password,login', 'required'),
			//array('date, date_create, id_company, balance', 'numerical', 'integerOnly'=>true),
			array('login', 'length', 'max'=>255),
            array('login', 'email'),
            array('login', 'unique'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			//array('active', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('login', 'safe', 'on'=>'search'),
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
			'id_user' => 'Id пользователя',
			'login' => 'Логин',
			'password' => 'Пароль',
			'name' => 'Имя',
			'comment' => 'Комментарий',
			'date' => 'Дата',
			'date_create' => 'Дата создания',
			'id_company' => 'Компания',
			'balance' => 'Баланс',
			'active' => 'Активация',
            'verifyCode'=>'Verification Code',
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('date_create',$this->date_create);
		$criteria->compare('id_company',$this->id_company);
		$criteria->compare('balance',$this->balance);
		$criteria->compare('active',$this->active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getId($login = false)
    {
        if($login){
            $q = Yii::app()->db->createCommand();
            $item = $q->select("id_user")->from($this->tableName())->where("login = :login",array(':login'=>$login))->queryRow();
            return $item["id_user"];
        }
        return false;
    }

    public function getName()
    {
        $login = Yii::app()->user->name;
        if($login){
            $q = Yii::app()->db->createCommand();
            $item = $q->select("name")->from($this->tableName())->where("login = :login",array(':login'=>$login))->queryRow();
            if($item["name"]) $result = $item["name"]."<br/>(".$login.")";
            else $result = $login;
            return $result;
        }
        return false;
    }

    public function getInfo()
    {
        $login = Yii::app()->user->name;
        if($login){
            $q = Yii::app()->db->createCommand();
            $item = $q->select("id_user,name,login,date_create,balance,id_company")->from($this->tableName())->where("login = :login",array(':login'=>$login))->queryRow();
           // if($item["name"]) $result = $item["name"]."<br/>(".$login.")";
            //else $result = $login;
            return $item;
        }
        return false;
    }

    public function getBalans($id = false)
    {
        $info = $this->getInfo();
        if($info) return $info['balance'];
        return false;
    }

    public function updateBalanse($price,$id_operation = 1)
    {
        /*
         * id_operation :
         * 1 - пополнение баланса
         * 2 - покупка
         */
        $id_user = $this->getId(Yii::app()->user->id);
        if($id_user){
            $balanse_old = $this->getBalans();
            $balanse_new = $balanse_old+($price);

            $balanse_acc = new BalanceAccounting();
            $date_create = time();
            $balanse_acc->id_user = $id_user;
            $balanse_acc->id_operation = $id_operation;
            $balanse_acc->balance_old = $balanse_old;
            $balanse_acc->balance_new = $balanse_new;
            $balanse_acc->date_create = $date_create;
            $balanse_acc->save();

            $q = Yii::app()->db->createCommand();
            $q->update($this->tableName(), array('balance'=>$balanse_new), 'id_user=:id', array(':id'=>$id_user));
            return true;
        }
        return false;
    }

}
