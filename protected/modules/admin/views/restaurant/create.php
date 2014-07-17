<?php
/* @var $this RestaurantController */
/* @var $model Restaurant */

$this->breadcrumbs=array(
	'饭店'=>array('index'),
	'添加',
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>