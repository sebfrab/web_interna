<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs=array(
	'Tipos'=>array('index'),
	$model->idtipo=>array('view','id'=>$model->idtipo),
	'Update',
);

$this->menu=array(
	array('label'=>'Nuevo Tipo', 'url'=>array('create')),
	array('label'=>'Ver Tipo', 'url'=>array('view', 'id'=>$model->idtipo)),
	array('label'=>'Mantenedor Tipo', 'url'=>array('admin')),
);
?>

<h1>Update Tipo <?php echo $model->idtipo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>