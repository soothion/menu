<?php
/* @var $this OrderDetailController */
/* @var $model OrderDetail */

$this->breadcrumbs=array(
	'订单详情'=>array('index'),
	'添加',
);

?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>