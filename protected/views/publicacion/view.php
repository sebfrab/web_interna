<?php
/* @var $this PublicacionController */
/* @var $model Publicacion */

$this->breadcrumbs=array(
	'Publicacions'=>array('index'),
	$model->idpublicacion,
);

$this->menu=array(
	array('label'=>'Nueva Publicación', 'url'=>array('create')),
	array('label'=>'Actualizar Publicación', 'url'=>array('update', 'id'=>$model->idpublicacion)),
	array('label'=>'Eliminar Publicación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idpublicacion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Mantenedor Publicaciones', 'url'=>array('admin')),
);
?>

<h1>View Publicacion #<?php echo $model->idpublicacion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idpublicacion',
		'subcategoria_idsubcategoria',
		'nombre',
	),
)); ?>
