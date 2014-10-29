<?php
/* @var $this SubcategoriaController */
/* @var $model Subcategoria */

$this->breadcrumbs=array(
	'Subcategorias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Nueva Subcategoria', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subcategoria-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Mantenedor Subcategorias</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subcategoria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idsubcategoria',
                array(
                    'name'=>'categoria_idcategoria',
                    'header'=>'Categoria',
                    'value'=>'$data->categoria->nombre',
                ),
		'nombre',
                'orden',
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
