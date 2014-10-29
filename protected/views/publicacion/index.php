<?php
/* @var $this PublicacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Publicacions',
);

$this->menu=array(
	array('label'=>'Create Publicacion', 'url'=>array('create')),
	array('label'=>'Manage Publicacion', 'url'=>array('admin')),
);
?>

<h1>Publicacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
