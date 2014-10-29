<?php
/* @var $this PublicacionController */
/* @var $model Publicacion */

$this->breadcrumbs=array(
	'Publicacions'=>array('index'),
	$model->idpublicacion=>array('view','id'=>$model->idpublicacion),
	'Update',
);
?>

<h1>Áctualizar Publicación <?php echo $model->idpublicacion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'subcategoria'=>$subcategoria)); ?>