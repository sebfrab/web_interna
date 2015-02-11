<div style="height:600px; width: 100%;">
<?php

Yii::app()->clientScript->registerCoreScript('jquery');

$this->widget('ext.pdfJs.QPdfJs',array(
	'url'=>'http://172.18.21.211/Manual.pdf',
	))
?>
</div>




<!--<embed src="<?php echo Yii::app()->request->baseUrl; ?>/Manual.pdf" width="500" height="375">-->