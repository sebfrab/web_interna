<?php

class PublicacionController extends Controller
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
				'actions'=>array('view', 'download'),
				'users'=>array('*'),
			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','create','update','admin','delete', 'search'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
                                'actions'=>array('update'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
            
                $subcategoria = Subcategoria::model()->findByPk($id);
                if(!Yii::app()->user->checkAccess('create_'.$subcategoria->categoria->nombre.'_'.$subcategoria->nombre)){
                    throw new CHttpException(403,"Usted no se encuentra autorizado a realizar esta acción.");
                }
         
		$model=new Publicacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Publicacion']))
		{
			$model->attributes=$_POST['Publicacion'];
                        
                        //print_r($_POST['Publicacion']);
                        //exit();
                        
                        if(!CUploadedFile::getInstance($model,'extension')){
                            $this->render('create',array(
                                    'model'=>$model,
                                    'subcategoria'=>$id
                            ));
                            return 0;
                        }
                        
                        $model->extension=CUploadedFile::getInstance($model,'extension');
                        $ext = $model->extension->getExtensionName();
                        $model->usuario_idusuario = Yii::app()->user->id;
			if($model->save()){
                                $path="publicaciones/$model->idpublicacion.$ext";
                                $model->extension->saveAs($path);
                                $model->extension = ".".$ext;
                                $model->save();
                                $this->redirect(array('subcategoria/'.$model->subcategoria_idsubcategoria));
				$this->redirect(array('view','id'=>$model->idpublicacion));
                        }
		}


		$this->render('create',array(
			'model'=>$model,
                        'subcategoria'=>$id
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

		if(isset($_POST['Publicacion']))
		{
			$model->attributes=$_POST['Publicacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idpublicacion));
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
		$model=new Publicacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Publicacion']))
			$model->attributes=$_GET['Publicacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionSearch(){
                $this->layout='//layouts/column1';
                $model=new Publicacion('search2');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Publicacion']))
			$model->attributes=$_GET['Publicacion'];

		$this->render('search',array(
			'model'=>$model,
		));
        }
        
        public function downloadFile($fullpath, $model){
            if(!empty($fullpath)){ 
                header("Content-type:application/pdf"); //for pdf file
                //header('Content-Type:text/plain; charset=ISO-8859-15');
                //if you want to read text file using text/plain header 
                header('Content-Disposition: attachment; filename="'.basename($model->nombre.$model->extension).'"'); 
                header('Content-Length: ' . filesize($fullpath));
                readfile($fullpath);
                Yii::app()->end();
            }
          }

          public function actionDownload($id){
            $model = Publicacion::model()->findByPk($id);
            if($model->subcategoria->privada){
                if(!Yii::app()->user->checkAccess('view_'.$model->subcategoria->categoria->nombre.'_'.$model->subcategoria->nombre)){
                    throw new CHttpException(403,"Usted no se encuentra autorizado a realizar esta acción.");
                }
            }
            
            $path = Yii::getPathOfAlias('webroot')."/publicaciones/".$model->idpublicacion.$model->extension;
            $this->downloadFile($path, $model);
          }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Publicacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Publicacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Publicacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='publicacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
