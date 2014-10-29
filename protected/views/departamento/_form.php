<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'departamento-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>75, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'nombre',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'columna',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'columna',Departamento::getColumnas(),array('class'=>'form-control')) ?>
		<?php echo $form->error($model,'columna',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'orden',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'orden',array('size'=>10,'maxlength'=>10, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'orden',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->