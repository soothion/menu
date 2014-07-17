<?php
/* @var $this RestaurantController */
/* @var $model Restaurant */

$this->breadcrumbs=array(
	'饭店'
);
$create=Yii::app()->createUrl('admin/restaurant/create');
?>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'restaurant-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'title',
		'tel',
		'address',
		'name',
		'sort',
		array(
                        'header'=>'<a href="'.$create.'"><i class="icon-plus"></i></a>',
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}{delete}'
		),
	),
)); ?>
