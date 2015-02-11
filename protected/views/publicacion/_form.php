<?php
/* @var $this PublicacionController */
/* @var $model Publicacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'publicacion-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>


	<div class="form-group">
		<?php echo $form->labelEx($model,'subcategoria_idsubcategoria',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'subcategoria_idsubcategoria',  Subcategoria::getListSubCategoria($subcategoria),array('class'=>'form-control')) ?>
		<?php echo $form->error($model,'subcategoria_idsubcategoria',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'nombre',array('class'=>'alert alert-danger')); ?>
	</div>
    
         <div class="form-group">
		<?php echo $form->labelEx($model,'extension',array('class'=>'control-label')); ?>
		<?php echo $form->fileField($model,'extension',array('class'=>'')) ?>
		<?php echo $form->error($model,'extension',array('class'=>'alert alert-danger')); ?>
	</div>
    
        <div class="form-group">
                <div class="alert alert-info" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Modificar campos "Fecha Vigencia Inicio" y "Fecha Vigencia Fin" solo para publicaciones con vigencia exacta, ej: OEA
                </div>
        </div>
    
        <div class="form-group">
                <?php echo $form->labelEx($model,'fecha_vigencia_ini',array('class'=>'control-label')); ?>
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'fecha_vigencia_ini',
                        'options'=>array(
                            'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
                            'changeMonth'=>true,
                            //'minDate'=>0, fecha selección minima la actual
                            'onSelect'=> 'js:function( selectedDate ) {
                                $( "#' . CHtml::activeId($model, 'fecha_vigencia_fin') . '" ).datepicker("option", "minDate", selectedDate); //set the end date cjuidatepiker minDate and its working fine
                                $( "#' . CHtml::activeId($model, 'fecha_vigencia_fin') . '" ).datepicker("setDate", selectedDate);
                            }',
                        ),
                        'htmlOptions' => array(
                            'size' => '10',         // textField size
                            'maxlength' => '10',    // textField maxlength
                            'class'=>'form-control'
                        ),
                    ));
                ?>
                <?php echo $form->error($model,'fecha_vigencia_ini',array('class'=>'alert alert-danger')); ?>
        </div>
    
        <div class="form-group">
                <?php echo $form->labelEx($model,'fecha_vigencia_fin',array('class'=>'control-label')); ?>
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'fecha_vigencia_fin',
                        'options'=>array(
                            'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
                            'changeMonth'=>true,
                            'minDate'=>0,
                        ),
                        'htmlOptions' => array(
                            'size' => '10',         // textField size
                            'maxlength' => '10',    // textField maxlength
                            'class'=>'form-control'
                        ),
                    ));
                ?>
                <?php echo $form->error($model,'fecha_vigencia_fin',array('class'=>'alert alert-danger')); ?>
        </div>
       

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->