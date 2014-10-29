<?php
/* @var $this PublicacionController */
/* @var $model Publicacion */

$this->breadcrumbs=array(
	'Publicacions'=>array('index'),
	'Create',
);
?>

<h1>Nueva Publicación</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'subcategoria'=>$subcategoria)); ?>