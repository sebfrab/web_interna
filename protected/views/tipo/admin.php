<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs=array(
	'Tipos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Nuevo Tipo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Mantenedor Tipo</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idtipo',
		'nombre',
		array(
                        'class'=>'CButtonColumn',
                        'htmlOptions'=>array('width'=>'100px'),
                        'template'=>'{view}{update}{delete}',
                        'afterDelete'=>'function(link,success,data){ if(success) $("#statusMsg").html(data); }',
                        'buttons'=>array(
                            'view' => array
                            (
                                'label'=>'ver',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/ver.png',
                            ),
                            'update' => array
                            (
                                'label'=>'actualizar',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/actualizar.png',
                            ),
                            'delete' => array
                            (
                                'label'=>'eliminar',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/eliminar.png',
                            ),
                        ),
                ),
	),
)); ?>
