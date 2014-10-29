<?php
/* @var $this DepartamentoController */
/* @var $data Departamento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('iddepartamento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->iddepartamento), array('view', 'id'=>$data->iddepartamento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('columna')); ?>:</b>
	<?php echo CHtml::encode($data->columna); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />


</div>