<?php
/* @var $this SubcategoriaController */
/* @var $model Subcategoria */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subcategoria-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<div class="form-group">
		<?php echo $form->labelEx($model,'categoria_idcategoria',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'categoria_idcategoria',Categoria::getListCategorias(),array('class'=>'form-control')) ?>
		<?php echo $form->error($model,'categoria_idcategoria',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>75, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'nombre',array('class'=>'alert alert-danger')); ?>
	</div>
    
        <div class="form-group">
		<?php echo $form->labelEx($model,'tipo_idtipo',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'tipo_idtipo',  Tipo::getListTipos(), array('empty'=>'Seleccione tipo', 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'tipo_idtipo',array('class'=>'alert alert-danger')); ?>
	</div>
    
        <div class="form-group">
		<?php echo $form->labelEx($model,'orden',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'orden',array('size'=>60,'maxlength'=>2, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'orden',array('class'=>'alert alert-danger')); ?>
	</div>
    
        <div class="form-group">
		<?php echo $form->labelEx($model,'url',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>250, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'url',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->