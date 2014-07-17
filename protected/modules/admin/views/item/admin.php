<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'菜单'
);

$create=Yii::app()->createUrl('admin/item/create');
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'item-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		array(
                    'name'=>'rid',
                    'value'=>'$data->restaurant->title'
                ),
		'title',
		'price',
		'hots',
		array(
                        'header'=>'<a href="'.$create.'"><i class="icon-plus"></i></a>',
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}{delete}'
		),
	),
)); ?>
