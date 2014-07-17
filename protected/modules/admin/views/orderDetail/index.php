<?php
/* @var $this OrderDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Order Details',
);

$this->menu=array(
	array('label'=>'Create OrderDetail', 'url'=>array('create')),
	array('label'=>'Manage OrderDetail', 'url'=>array('admin')),
);
?>

<h1>Order Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
