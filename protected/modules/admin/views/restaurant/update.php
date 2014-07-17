<?php
/* @var $this RestaurantController */
/* @var $model Restaurant */

$this->breadcrumbs=array(
	'饭店'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'修改',
);

?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>