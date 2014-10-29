<?php
/* @var $this PublicacionController */
/* @var $data Publicacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpublicacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idpublicacion), array('view', 'id'=>$data->idpublicacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subcategoria_idsubcategoria')); ?>:</b>
	<?php echo CHtml::encode($data->subcategoria_idsubcategoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>