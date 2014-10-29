<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Mantenedor Departamentos', 'url'=>array('admin')),
);
?>

<h1>Nuevo Departamento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>