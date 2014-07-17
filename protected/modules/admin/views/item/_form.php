<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'module-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'          => array('class' => 'well', 'enctype' => 'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary($model); ?>
        <?php
            $restaurant = Restaurant::model()->findAll();
            foreach ($restaurant as $val)
            {
                $restaurants[$val->id] = $val->title;
            }
        ?>
	<div class="row">
		<?php echo $form->labelEx($model,'rid'); ?>
		    <?php echo $form->dropDownList($model, 'rid', $restaurants,array('class' => 'span2', 'maxlength' => 50)); ?>
		<?php echo $form->error($model,'rid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>'span5','maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('class'=>'span5','maxlength'=>50)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('class'=>'span5','maxlength'=>50)); ?>
		<?php echo $form->error($model,'image'); ?>
                <input type="file" id="fileupload"/></br>
                <script src="assets/js/jquery.ui.widget.js"></script>
                <script src="assets/js/jquery.fileupload.js"></script>
                <script>
                    /*jslint unparam: true */
                    /*global window, $ */
                    $(function() {
                        'use strict';
                        // Change this to the location of your server-side upload handler:
                        var url = '<?php echo Yii::app()->createUrl('index/upload') ?>';
                        $('#fileupload').fileupload({
                            url: url,
                            dataType: 'json',
                            done: function(e, data) {
                                $.each(data.result.files, function(index, file) {
                                    $("input[name='Item[image]']").val(file.url);
                                });
                            },
                        }).prop('disabled', !$.support.fileInput)
                                .parent().addClass($.support.fileInput ? undefined : 'disabled');
                    });
                </script>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hots'); ?>
		<?php echo $form->textField($model,'hots',array('class'=>'span5','maxlength'=>50)); ?>
		<?php echo $form->error($model,'hots'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</form>