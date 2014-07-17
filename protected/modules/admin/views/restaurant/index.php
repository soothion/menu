<?php
/* @var $this RestaurantController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restaurants',
);

$this->menu=array(
	array('label'=>'Create Restaurant', 'url'=>array('create')),
	array('label'=>'Manage Restaurant', 'url'=>array('admin')),
);
?>

<h1>Restaurants</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
