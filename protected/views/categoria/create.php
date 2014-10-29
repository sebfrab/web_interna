<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Mantenedor Categoria', 'url'=>array('admin')),
);
?>

<h1>Nueva Categoria</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>