<?php
/* @var $this OrderDetailController */
/* @var $model OrderDetail */

$this->breadcrumbs=array(
	'订单详情'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'修改',
);

?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>