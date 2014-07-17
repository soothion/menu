<?php

Class LoginController extends Controller {
    

    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'system.web.widgets.captcha.CCaptchaAction',
                'width' => 70,
                'height' => 30,
                'padding' => 0,
                'minLength' => 4,
                'maxLength' => 4,
                'testLimit' => 999,
            ),
        );
    }

    public function actionIndex() {
        $this -> layout = 'application.modules.admin.views.layouts.blank';
        $model = new LoginForm();
        $this->render('index', array('model' => $model));
    }

    public function actionLogin() {
        if (isset($_POST['LoginForm'])) {
            $model = new LoginForm();
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                $this->redirect($this->createUrl('/admin/index'));
            }
            else $this->redirect('/admin/login');
        }
        $this->redirect('/admin/login');
    }
    
    public function actionLogout(){
        Yii::app()->admin->logout(true);
        $this->redirect(array('/admin/login'));
    }

}
