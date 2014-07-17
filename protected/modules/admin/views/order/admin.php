<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'订单'
);
$create=Yii::app()->createUrl('admin/order/create');
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
                array('name'=>'uid','value'=>'$data->user->username'),
		'status',
		array('name'=>'pay','value'=>'@$data->pay->username?"$data->pay->username":"none"'),
		'addtime',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}{delete}'
		),
	),
)); ?>
