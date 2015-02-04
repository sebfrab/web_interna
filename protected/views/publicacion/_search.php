<?php
/* @var $this PublicacionController */
/* @var $model Publicacion */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'htmlOptions'=>array(
            'class'=>'form-inline',
        ),
)); ?>
    
<div class="form-group">
    <?php echo $form->textField($model,'nombre',
            array('maxlength'=>100, 'class'=>'form-control', 'placeholder'=>'Publicación')) 
    ?>
    <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'create_2',
            'htmlOptions' => array(
                'maxlength' => '10',    // textField maxlength
                'class'=>'form-control',
                'placeholder'=>'dd-mm-yyyy',
            ),
            'options' => array(
                'dateFormat' => 'dd-mm-yy',
                'showOtherMonths' => true,
                'selectOtherMonths' => true,
                'language'=>'es',
                'changeMonth' => true,
                'changeYear' => true,
                'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
            ),
            ));
    ?>
    <?php echo $form->dropDownList($model,'subcategoria_idsubcategoria',  
        Subcategoria::getListSubCategoria($subcategoria),array('empty'=>'Seleccione SubCategoria', 'class'=>'form-control')) 
    ?>
</div>

<div class="form-group">
    <?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>