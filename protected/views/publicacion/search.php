<?php
/* @var $this PublicacionController */
/* @var $model Publicacion */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#publicacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'publicacion-grid',
	'dataProvider'=>$model->search2(),
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
                        'model'=>$model,
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

