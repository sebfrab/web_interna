<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tipo_usuario_idtipo_usuario',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'tipo_usuario_idtipo_usuario',TipoUsuario::getListTiposUsuario(),array('class'=>'form-control')) ?>
		<?php echo $form->error($model,'tipo_usuario_idtipo_usuario',array('class'=>'alert alert-danger')); ?>
	</div>
    
        <div class="form-group">
		<?php echo $form->labelEx($model,'departamento_iddepartamento',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'departamento_iddepartamento',  Departamento::getListDepartamentos(),array('empty'=>'Seleccione departamento', 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'departamento_iddepartamento',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'estado_idestado',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model, 'estado_idestado', Estado::getListEstadosBool(), array('empty'=>'Seleccione estado', 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'estado_idestado',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>30, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'username',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password_2',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'password_2',array('size'=>60,'maxlength'=>250, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'password_2',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombres',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'nombres',array('size'=>60,'maxlength'=>150, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'nombres',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'apellidos',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'apellidos',array('size'=>60,'maxlength'=>150, 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'apellidos',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sexo',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model, 'sexo', Usuario::model()->getGenero(), array('empty'=>'Seleccione sexo', 'class'=>'form-control')) ?>
		<?php echo $form->error($model,'sexo',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->