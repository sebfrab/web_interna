<?php

$this->menu = $subcategoria;

?>

<h1><?php echo $model->nombre; ?></h1>

<?php echo CHtml::link('Nuevo',array('publicacion/create/'.$model->idsubcategoria), array('class'=>'btn btn-success pull-right')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'publicacion-grid',
	'dataProvider'=>$modelPublicacion->search(),
	'filter'=>$modelPublicacion,
        'pager' => array(
            'header' => '',
            'hiddenPageCssClass' => 'disabled',
            'maxButtonCount' => 5,
            'cssFile' => false,
            'prevPageLabel' => '<i class="icon-chevron-left"><</i>',
            'nextPageLabel' => '<i class="icon-chevron-right">></i>',
            'firstPageLabel' => 'First',
            'lastPageLabel' => 'Last',
        ),
        'itemsCssClass' => 'table table-hover',
	'columns'=>array(
		'nombre',
                'create_2',
                array(
                        'class'=>'CButtonColumn',
                        'htmlOptions'=>array('width'=>'70px'),
                        'template'=>'{view}',
                        'buttons'=>array(
                            'view' => array
                            (
                                'label'=>'ver',
                                'url' => 'Yii::app()->createUrl("publicacion/download",array("id"=>$data->idpublicacion))',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/iconos/ver.png',
                            ),
                        ),
                ),
		
	),
)); ?>
