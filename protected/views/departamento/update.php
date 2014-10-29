<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	$model->iddepartamento=>array('view','id'=>$model->iddepartamento),
	'Update',
);

$this->menu=array(
	array('label'=>'Nuevo Departamento', 'url'=>array('create')),
	array('label'=>'Ver Departamento', 'url'=>array('view', 'id'=>$model->iddepartamento)),
	array('label'=>'Mantenedor Departamentos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Departamento <?php echo $model->iddepartamento; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>