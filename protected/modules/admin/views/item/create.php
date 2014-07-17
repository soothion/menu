<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'菜单'=>array('index'),
	'添加',
);

?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>