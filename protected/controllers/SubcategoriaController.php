<?php

class SubcategoriaController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>array('*'),
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
	public function actionView($id)
	{
                $this->layout='//layouts/column2_subcategoria';
            
                $modelPublicacion=new Publicacion('search');
		$modelPublicacion->unsetAttributes();  // clear any default values
                $modelPublicacion->subcategoria_idsubcategoria = $id;
                if(isset($_GET['Publicacion'])){
			$modelPublicacion->attributes=$_GET['Publicacion'];
                }
                $model = $this->loadModel($id);
                $Criteria = new CDbCriteria();
                $Criteria->condition = "t.categoria_idcategoria = $model->categoria_idcategoria";
                $subcategoria  = Subcategoria::model()->findAll($Criteria);
                
                
		$this->render('view',array(
			'model'=>$model,
                        'modelPublicacion'=>$modelPublicacion,
                        'subcategoria' =>$subcategoria,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Subcategoria;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Subcategoria']))
		{
			$model->attributes=$_POST['Subcategoria'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idsubcategoria));
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

		if(isset($_POST['Subcategoria']))
		{
			$model->attributes=$_POST['Subcategoria'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idsubcategoria));
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
		$this->redirect(array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Subcategoria('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Subcategoria']))
			$model->attributes=$_GET['Subcategoria'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Subcategoria the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Subcategoria::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Subcategoria $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='subcategoria-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
