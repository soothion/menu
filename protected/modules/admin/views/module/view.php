<?php
$this->breadcrumbs=array(
	'Modules'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Module','url'=>array('index')),
	array('label'=>'Create Module','url'=>array('create')),
	array('label'=>'Update Module','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Module','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Module','url'=>array('admin')),
);
?>

<h1>View Module #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
	),
)); ?>
