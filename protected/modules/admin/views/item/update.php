<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'菜单'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'修改',
);

?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>