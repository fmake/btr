<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

        $order = new Order();
        if(isset($_POST['Order'])){
            $order->attributes=$_POST['Order'];
            if($order->validate())
            {
                $date_create = time();
                $order->date_create = $date_create;
                $order->url_referer = $_SERVER['HTTP_REFERER'];
                $order->save();

                Yii::app()->user->setFlash('order_complete','Спасибо за заказ. С Вами свяжутся в ближайшее время.');
                $this->refresh();
            }
        }

		$this->render('index',array('order'=>$order));
	}

    public function actionRating()
    {
        $company = new Company();

        //$items = Company::model()->findAll('active = :active',array(':active'=>1));
        $q = Yii::app()->db->createCommand();
        $items = $q->select()->from($company->tableName())->order(array('rating desc','id_company asc'))->limit(10)->queryAll();

        //print_r($items);

        $this->render('rating',array('items'=>$items));
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

    /**
     * Displays the login page
     */
    public function actionRegistration()
    {
        $user = new User();
        $company = new Company();

        if(isset($_POST['User']) and isset($_POST['Company']))
        {
            $company->attributes=$_POST['Company'];
            $user->attributes=$_POST['User'];

            $is_user = $user->validate();
            $is_company = $company->validate();

            //$is_user = $user->validate($user->attributes);
            //$is_company = $company->validate($company->attributes);

            if($is_user && $is_company){
                $date_create = time();
                $company->date_create = $date_create;
                $company->save();

                $user->id_company = $company->id_company;
                $user->password = md5($user->password);
                $user->date_create = $date_create;

                $user->save();

                Yii::app()->user->setFlash('register_user','Спасибо за регистрацию на сайте. Теперь вы можете авторизироваться.');
                $this->refresh();
                //print_r($user);

                //echo 'Ok';
                //$this->redirect(array('registration'));
            } else {
                //echo 'No';
            }
        }

        // display the login form
        $this->render('registration',array('user'=>$user,'company'=>$company));
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}