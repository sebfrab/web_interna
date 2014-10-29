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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->