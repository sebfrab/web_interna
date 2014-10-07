<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
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
        
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
    <body>
        
        <header style="background-color: #0d141c;">
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
                                        array('label'=>'<span class="glyphicon glyphicon-home"></span>', 'url'=>array('/site/support')),
                                        array('label'=>'INFORMACIÓN', 'url'=>array('/site/support')),
                                        array('label'=>'TABLA VIRTUAL', 'url'=>array('/site/support')),
                                        array('label'=>'INGRESAR', 'url'=>array('/site/support')),
                                    ),'encodeLabel' => false,
                                    
                                    )); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
       
        <div class="container-fluid">
            <div class="row">
                <?php echo $content; ?>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    </body>
</html>
