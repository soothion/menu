<?php
$this->breadcrumbs=array(
	'模块',
);
$create=Yii::app()->createUrl('admin/module/create');
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'module-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'title',
                array( 
                    'name'=>'content',
                    'value'=>'Chtml::encode(Helper::truncate_utf8_string($data->content,100))',
                ),
		array(
                        'header'=>'<a href="'.$create.'"><i class="icon-plus"></i></a>',
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}{delete}'
		),
	),
)); ?>
