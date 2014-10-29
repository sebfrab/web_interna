<?php
$this->pageTitle=Yii::app()->name;
?>


<?php 
    $this->widget('ext.SFIndex',array(
        'column1' => $column1,
        'column2' => $column2,
        'column3' => $column3
    ));        
?>

