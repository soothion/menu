<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户'
);
$create=Yii::app()->createUrl('admin/users/create');
?>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'username',
		'name',
		'tel',
		'qq',
		'skype',
		'alipay',
		array(
                        'header'=>'<a href="'.$create.'"><i class="icon-plus"></i></a>',
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}{delete}'
		),
	),
)); ?>
