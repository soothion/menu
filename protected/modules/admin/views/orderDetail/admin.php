<?php
/* @var $this OrderDetailController */
/* @var $model OrderDetail */

$this->breadcrumbs=array(
	'订单详情'
);
$create=Yii::app()->createUrl('admin/orderDetail/create');
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'order-detail-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'oid',
		'iid',
		'title',
		'price',
		'addtime',
		array(
                        'header'=>'<a href="'.$create.'"><i class="icon-plus"></i></a>',
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}{delete}'
		),
	),
)); ?>
