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
        
        <!--[if IE]>
            <style type="text/css">
              @import ("/css/ie.css");
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
        
        <header>
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
                                        array('label'=>'INFORMACIÓN', 'url'=>array('/site/support')),
                                        array('label'=>'TABLA VIRTUAL', 'url'=>array('http://172.18.21.25/tablavirtual/principal.asp')),
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
                                        array('label'=>'<span class="glyphicon glyphicon-search"></span>', 'url'=>array('')),
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        
                    </div>
                    
                    <div class="col-lg-12" style="background-color: #001223; margin-top: 150px;">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            <div class="item"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/armada.png"/></a></div>
                            <div class="item"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/apolinav.png"/></a></div>
                            <div class="item"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/escuela-naval.png"/></a></div>
                            <div class="item"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ministerio-de-defensa.jpg"/></a></div>
                            <div class="item"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/esmeralda.png"/></a></div>
                            <div class="item"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/escuela-grumetes.png"/></a></div>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-top: 150px;">
                        
                    </div>
                    
                </div>
            </div>
        </footer>
        
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.excoloSlider.js"></script>
        
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/owl-carousel/owl.carousel.min.js"></script>
        
        <script type="text/javascript">
            
            $(document).ready(function() {
               $("#owl-demo").owlCarousel({
                    navigation : false
               });
               
               $("#owl-demo2").owlCarousel({
                    navigation : false
               });
               
               $("#sliderA").excoloSlider();
            });
        </script>
    </body>
</html>
