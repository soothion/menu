<div class="header">
    <div class="logo"></div>
</div>
<div class="middle">
    <div class="container">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'id-form',
            'type' => 'horizontal',
            'action' => $this->createUrl('login/login'),
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>
        <fieldset>
            <p class="block-heading"><i class="icon-user"></i> 管理员登陆</p>
            <?php echo $form->textFieldRow($model, 'username', array('placeholder' => '用户名')); ?>
            <?php echo $form->passwordFieldRow($model, 'password', array('placeholder' => '密码')); ?>
            <div class="control-group ">
                <label class="control-label required" for="LoginForm_verifyCode">验证码 <span class="required">*</span></label>
                <div class="controls">
                    <input class="span1" placeholder="验证码" name="LoginForm[verifyCode]" id="LoginForm_verifyCode" type="text">
                        <?php $this->widget('CCaptcha', array('buttonLabel' => '看不清？')); ?>
                        <span class="help-inline error" id="LoginForm_verifyCode_em_" style="display: none">
                        <?php echo $form->error($model,'verifyCode'); ?></span>
                </div>
            </div> 
        </fieldset>
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => '登 录','htmlOptions' => array('class'=>'ajaxFormButton'))); ?>
        </div>

        <?php $this->endWidget(); ?>
        <div class="footer">
            © Powerd By <a href="http://www.fire-rain.com" target="_blank">火焰雨</a> 2014
        </div>
    </div>
</div>
