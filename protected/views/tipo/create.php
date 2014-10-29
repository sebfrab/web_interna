<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs=array(
	'Tipos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Mantenedor Tipo', 'url'=>array('admin')),
);
?>

<h1>Create Tipo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>