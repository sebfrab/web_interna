<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <?php 
            $this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked menu-secundario',
                                                'id'=>'menuSecundario'),
		));
            ?>     
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <?php echo $content; ?>
        </div>
    </div>
</div>

<?php $this->endContent(); ?>