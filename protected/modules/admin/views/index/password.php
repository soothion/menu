<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'id-form',
	'action'=>$this->createUrl('/admin/index/password'),
	'enableAjaxValidation'=>true,
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
		
)); ?>
<?php echo $form->textFieldRow($model, 'username', array('class'=>'span5')); ?>
<?php echo $form->passwordFieldRow($model, 'oldpassword', array('class'=>'span5')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span5')); ?>
<?php echo $form->passwordFieldRow($model, 'repassword', array('class'=>'span5')); ?>
<p> 
  <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>' 保 存 ','url'=>$this->createUrl('/admin/index/password'))); ?>
  <?php

?>
</p>
<?php $this->endWidget(); ?>
<script>

function successfun(data){
	setTimeout('location.reload();',1000);
}
</script> 
