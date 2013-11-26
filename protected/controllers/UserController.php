<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','orders','ordersbuy'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id = false)
	{

        $login = Yii::app()->user->name;
        if(!$id){
            $user = User::model()->find(array('select'=>'id_user','condition'=>'login=:login','params'=>array(':login'=>$login)));
            //print_r($user);
            $id = $user->id_user;
            $this->render('view',array(
                'model'=>$this->loadModel($id),
            ));
        } elseif($login == 'admin') {
            $this->render('view',array(
                'model'=>$this->loadModel($id),
            ));
        } else {
            $this->redirect('/index.php/user/view/');
        }

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_user));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_user));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

    /**
     * Lists all models.
     */
    public function actionOrders()
    {
        //echo 'qq';
        //print_r($_REQUEST);
        if($_REQUEST['order_buy']){
            $id_order = intval($_REQUEST['order_buy']);
            Order::model()->buy($id_order);
            //echo $_REQUEST['order_buy'];
        }
        $limit = 10;
        $page = ($_REQUEST['page'])?$_REQUEST['page']:1;
        $offset = ($limit*($page-1));

        $order = new Order();
        $relation_order = new RelationsUserOrder();
        $q = Yii::app()->db->createCommand();
        $items = $q->select("o.*")->from($order->tableName().' o')->leftJoin($relation_order->tableName().' r_o','o.id_order = r_o.id_order')->where('o.count_buy<:count AND ISNULL(r_o.id_user)',array(':count'=>4))->order(array('o.date_create desc'))->limit($limit,$offset)->queryAll();

        $q = Yii::app()->db->createCommand();
        $count = $q->select('COUNT(*) as count')->from($order->tableName().' o')->leftJoin($relation_order->tableName().' r_o','o.id_order = r_o.id_order')->where('o.count_buy<:count AND ISNULL(r_o.id_user)',array(':count'=>4))->queryRow();
        $pages = array('page'=>$page,'count'=>ceil($count['count']/$limit));
        //print_r($pages);
        $this->render('orders',array('items'=>$items,'pages_order'=>$pages));
    }

    /**
     * Lists all models.
     */
    public function actionOrdersbuy()
    {
        $limit = 10;
        $page = ($_REQUEST['page'])?$_REQUEST['page']:1;
        $offset = ($limit*($page-1));

        $user = new User();
        $id_user = $user->getId(Yii::app()->user->id);

        $order = new Order();
        $relation_order = new RelationsUserOrder();
        $q = Yii::app()->db->createCommand();
        $items = $q->select("o.*")->from($order->tableName().' o')->leftJoin($relation_order->tableName().' r_o','o.id_order = r_o.id_order')->where('o.count_buy<:count AND r_o.id_user = :id_user',array(':count'=>4,':id_user'=>$id_user))->order(array('o.date_create desc'))->limit($limit,$offset)->queryAll();

        $q = Yii::app()->db->createCommand();
        $count = $q->select('COUNT(*) as count')->from($order->tableName().' o')->leftJoin($relation_order->tableName().' r_o','o.id_order = r_o.id_order')->where('o.count_buy<:count AND r_o.id_user = :id_user',array(':count'=>4,':id_user'=>$id_user))->queryRow();
        $pages = array('page'=>$page,'count'=>ceil($count['count']/$limit));
        //print_r($pages);
        $this->render('ordersbuy',array('items'=>$items,'pages_order'=>$pages));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
