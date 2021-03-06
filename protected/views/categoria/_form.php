<?php
/* @var $this CategoriaController */
/* @var $model Categoria */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categoria-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'departamento_iddepartamento',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'departamento_iddepartamento',Departamento::getListDepartamentos(),array('class'=>'form-control')) ?>
		<?php echo $form->error($model,'departamento_iddepartamento',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>75, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'nombre',array('class'=>'alert alert-danger')); ?>
	</div>
    
        <div class="form-group">
		<?php echo $form->labelEx($model,'orden',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'orden',array('size'=>60,'maxlength'=>2, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'orden',array('class'=>'alert alert-danger')); ?>
	</div>
    
        <div class="form-group">
		<?php echo $form->labelEx($model,'visible',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'visible',array('size'=>60,'maxlength'=>2, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'visible',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->