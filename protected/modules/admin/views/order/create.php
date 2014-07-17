<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'订单'=>array('index'),
	'添加',
);

?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>