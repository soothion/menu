<?php
$this->breadcrumbs=array(
	'Modules'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Module','url'=>array('index')),
	array('label'=>'Create Module','url'=>array('create')),
	array('label'=>'View Module','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Module','url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>