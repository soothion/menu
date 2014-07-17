<?php
$this->breadcrumbs=array(
	'Modules',
);

$this->menu=array(
	array('label'=>'Create Module','url'=>array('create')),
	array('label'=>'Manage Module','url'=>array('admin')),
);
?>

<h1>Modules</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
