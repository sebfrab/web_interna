<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut Icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/pedidosOnline.ico"/>
        <meta name="language" content="es" />
        <meta name="author" content="Sebastian Franco Brantes UTFSM - ¿y por qué no? - seb.frab@gmail.com - sefb.cl"/>
        
        <!--BOOTSTRAP-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
        <!--NORMALIZE-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css" />
        <!--INIT WEB-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/init.css" />
        
        <!--[if IE]>
            <style type="text/css">
              .header{
                background-color: #0d141c;
              }
              .footer{
                background-color: #00223f;
              }
            </style>
        <![endif]-->
        
        <!-- Owl Carousel Assets -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/owl-carousel/owl.carousel.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/owl-carousel/owl.theme.css" rel="stylesheet" />
        
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.excoloSlider.css" rel="stylesheet" />
        
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
</head>
    <body>
        <?php
        $auth=Yii::app()->authManager;
            /*
            $auth=Yii::app()->authManager;
            $Criteria = new CDbCriteria();
            $Criteria->with=array(
                    'categoria',
                    'categoria.subcategoria',
            );
            $zeus = $auth->createRole('Zeus');
            $jerarquia = Departamento::model()->findAll($Criteria);
            foreach($jerarquia as $departamento){
                $role = $auth->createRole('secretaria_'.$departamento->nombre);
                $role2 = $auth->createRole('oficial_'.$departamento->nombre);
                echo $departamento->nombre;
                echo "<br/>";
                foreach ($departamento->categoria as $categoria){
                    $task = $auth->createTask('mantencion_'.$departamento->nombre.'_'.$categoria->nombre);
                    $task2 = $auth->createTask('ver_'.$departamento->nombre.'_'.$categoria->nombre);
                    
                    $role->addChild('mantencion_'.$departamento->nombre.'_'.$categoria->nombre);
                    $role2->addChild('ver_'.$departamento->nombre.'_'.$categoria->nombre);
                    
                    $zeus->addChild('mantencion_'.$departamento->nombre.'_'.$categoria->nombre);
                    $zeus->addChild('ver_'.$departamento->nombre.'_'.$categoria->nombre);
                    echo $categoria->nombre;
                    echo "<br/>";
                    foreach($categoria->subcategoria as $subcategoria){
                        $auth->createOperation('create_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        $auth->createOperation('delete_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        $auth->createOperation('view_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        
                        $task->addChild('create_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        $task->addChild('delete_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        
                        $task->addChild('view_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        $task2->addChild('view_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        
                        echo $subcategoria->nombre;
                        echo "<br/>";
                    }
                    echo "<br/>";
                }
                echo "<br/>";
                echo "<br/>";
            }
            */
        ?>
        <header>
            <div class="header">
            <nav role="navigation">
                <div class="container-fluid">
                    <div class="row">
                        <img class="col-lg-5 col-md-6 col-sm-8 hidden-xs" src="<?php echo Yii::app()->request->baseUrl; ?>/images/cabecera_EN.png" />
                    </div>
                </div>
                
                <div class="navbar navbar-top">
                    <div class="navbar-inverse navbar-collapse">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-js-navbar-collapse">
                                    <span class="sr-only">Toggle</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a href="<?php echo Yii::app()->createUrl('./'); ?>" class="navbar-brand"></a>
                            </div>
                            <div class="navbar-collapse bs-js-navbar-collapse collapse">
                                <?php $this->widget('zii.widgets.CMenu',array(
                                    'htmlOptions' => array(
                                        'class'=>'menu nav navbar-nav navbar',
                                     ),
                                    'submenuHtmlOptions' => array(
                                        'class'=>'dropdown-menu', 
                                    ),
                                    'items'=>array(
                                        array('label'=>'<span class="glyphicon glyphicon-home"></span>', 'url'=>array('/site/index')),
                                        array('label'=>'TABLA VIRTUAL', 'url'=>'http://172.18.21.25/tablavirtual/principal.asp', 'linkOptions' => array('target'=>'_blank')),
                                        array('label'=>'MANUAL', 'url'=>'http://172.18.21.211/Manual.pdf', 'linkOptions' => array('target'=>'_blank')),
                                    ),'encodeLabel' => false,
                                   )); 
                                ?>
                                
                                <?php $this->widget('zii.widgets.CMenu',array(
                                    'htmlOptions' => array(
                                        'class'=>'menu nav navbar-nav navbar-right',
                                     ),
                                    'submenuHtmlOptions' => array(
                                        'class'=>'dropdown-menu', 
                                    ),
                                    'items'=>array(
                                        array('label'=>'<span class="glyphicon glyphicon-search"></span>', 'url'=>array('/publicacion/search')),
                                        array('label'=>'<span class="glyphicon glyphicon-cog"></span> panel <b class="caret"></b>', 'url'=>'#', 
                                                    'linkOptions'=>array(
                                                        'class'=>'dropdown-toggle',
                                                        'data-toggle'=>'dropdown',
                                                    ),
                                                    'items'=>array(
                                                        array('label'=>'Departamento', 'url'=>array('/departamento'),'visible'=>$auth->checkAccess('Zeus',Yii::app()->user->id)),
                                                        array('label'=>'Categoria', 'url'=>array('/categoria'),'visible'=>$auth->checkAccess('Zeus',Yii::app()->user->id)),
                                                        array('label'=>'Subcategoria', 'url'=>array('/subcategoria'),'visible'=>$auth->checkAccess('Zeus',Yii::app()->user->id)),
                                                        array('label'=>'Usuarios', 'url'=>array('/usuario'),'visible'=>$auth->checkAccess('Zeus',Yii::app()->user->id)),
                                                     ),
                                               'visible'=>$auth->checkAccess('Zeus',Yii::app()->user->id)),
                                        array('label'=>'SALIR ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                        array('label'=>'INGRESAR', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                    ),'encodeLabel' => false,
                                    
                                   )); 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            </div>
        </header>
        
        <!--<div class="container">
            <div class="row">
                <div class="col-lg-4 contenido-news">
                    <div class="col-lg-12" id="fecha">
                        
                        <h1 style="color: #c9c9c9; font-weight: lighter; text-align: center;">Fecha <?php echo date("d-m-Y");?></h1>
                    </div>
                </div>
                <div class="col-lg-4 contenido-news">
                    <div class="col-lg-12">
                        
                    </div>
                </div>
                <div class="col-lg-4 contenido-news">
                    <div class="col-lg-12">
                        
                    </div>
                </div>
            </div>
        </div>-->
       
               
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <?php echo $content; ?>
            </div>
        </div>
        
        <footer>
            <div class="footer">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-12" style="margin-top: 150px;">
                        
                    </div>
                </div>
            </div>
            </div>
        </footer>
        
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.excoloSlider.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.prizmcloud.js"></script>
        <script type="text/javascript">
            
            $(document).ready(function() {
               $("#owl-demo").owlCarousel({
                    navigation : false,
                    //Basic Speeds
                    slideSpeed : 200,
                    paginationSpeed : 800,
                    rewindSpeed : 1000,

                    //Autoplay
                    autoPlay : true,
                    stopOnHover : true,
                    autoHeight : false
               });

               
               $("#sliderA").excoloSlider();
               
                $('#prizm-cloud-container').prizmcloud({
                    viewerheight: 400,
                    viewerwidth: 400,
                    type: 'flash',
                    print_button: 'No'
                });

            });
        </script>
    </body>
</html>
