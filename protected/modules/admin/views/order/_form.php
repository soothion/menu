<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'module-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'          => array('class' => 'well', 'enctype' => 'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary($model); ?>
	<div class="row">
            <?php echo $form->labelEx($model,'uid'); ?>
            <input type="text" value="<?php echo $model->user->username;?>" disabled="disabled" class="span5" maxlength="50"/>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class'=>'span5','maxlength'=>50)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('class'=>'span5','maxlength'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay'); ?>
		<?php echo $form->textField($model,'pay',array('class'=>'span5','maxlength'=>50)); ?>
		<?php echo $form->error($model,'pay'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</form>