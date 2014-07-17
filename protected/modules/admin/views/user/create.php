<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户'=>array('index'),
	'添加',
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>