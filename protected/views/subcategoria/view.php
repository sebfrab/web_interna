<?php

$this->menu = $subcategoria;

?>

<h1><?php echo $model->nombre; ?></h1>

<?php
if($model->privada)
{
    if(!Yii::app()->user->checkAccess('view_'.$model->categoria->nombre.'_'.$model->nombre)){
        throw new CHttpException(403,"Usted no se encuentra autorizado a realizar esta acción.");
    }
}
?>

<?php 
    if(Yii::app()->user->checkAccess('create_'.$model->categoria->nombre.'_'.$model->nombre)){
        echo CHtml::link('Nuevo',array('publicacion/create/'.$model->idsubcategoria), array('class'=>'btn btn-success pull-right')); 
    }
?>

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
        'afterAjaxUpdate'=>"function(){
            jQuery('#create_2_search').datepicker({
            'dateFormat': 'yy-mm-dd',
            'showOtherMonths': true,
            'selectOtherMonths': true})}",
	'columns'=>array(
		'nombre',
                array(
                    'name' => 'fecha',
                    'type' => 'raw',
                    'filter'=>$this->widget('zii.widgets.jui.CJuiDatepicker', array(
                        'model'=>$modelPublicacion,
                        'attribute'=>'create_2',
                        'htmlOptions' => array(
                            'id' => 'create_2_search'
                        ), 
                        'options' => array(
                            'dateFormat' => 'dd-mm-yy',
                            'showOtherMonths' => true,
                            'selectOtherMonths' => true,
                            'language'=>'es',
                            'changeMonth' => true,
                            'changeYear' => true,
                            'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                        )
                    ), true)
                ),
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
