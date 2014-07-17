<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'订单'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'修改',
);

?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>