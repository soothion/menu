<?php
/* @var $this CourseController */
/* @var $model Course */
/* @var $form CActiveForm */

?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
                               array(
        'id'                   => 'config-form',
        'enableAjaxValidation' => false,
        'htmlOptions'          => array('class' => 'well', 'enctype' => 'multipart/form-data'),
    ));

    ?>
        <?php echo $form->errorSummary($model); ?>

    <div class="row">
<?php echo $form->labelEx($model, 'title'); ?>
<?php echo $form->textField($model, 'title',
                                     array('class' => 'span5', 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'keyword'); ?>
        <?php echo $form->textField($model, 'keyword',
                                             array('class' => 'span5', 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'keyword'); ?>
    </div>	
    <div class="row">
        <?php echo $form->labelEx($model, 'des'); ?>
        <?php echo $form->textField($model, 'des',
                                             array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->error($model, 'des'); ?>
    </div>	
    <div class="row">
        <?php echo $form->labelEx($model, 'tag'); ?>
        <?php echo $form->textField($model, 'tag',
                                             array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->error($model, 'tag'); ?>
    </div>	

    <div class="row">
        <?php echo $form->labelEx($model, 'copyright'); ?>
        <?php echo $form->textArea($model, 'copyright',
                                            array('class' => 'span8', 'rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'copyright'); ?>
    </div>

    <div class="row buttons">
<?php
$this->widget('bootstrap.widgets.TbButton',
              array(
    'buttonType' => 'submit',
    'type'       => 'primary',
    'label'      => $model->isNewRecord ? 'Create' : 'Save',
));

?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->