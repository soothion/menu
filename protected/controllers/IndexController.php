<?php

class IndexController extends Controller{
    
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
    
    public function actionIndex(){
        $model = new LoginForm();
        $this->render('index',array('model'=>$model));
    }
    public function actionUpload(){
        error_reporting(E_ALL | E_STRICT);
        $date=  date('Y/m/d');
        $upload_dir='files/'.$date;
        $upload_url='files/'.$date;
        $options=array('upload_dir'=>$upload_dir,'upload_url'=>$upload_url);
        $upload_handler = new UploadHandler($options);
    }
    public function actionList(){
        $list =  Item::model()->findAll();
        echo CJSON::encode($list);
    }
    
    public function actionSubmit(){
        $result=array('status'=>'1','message'=>'success');
        echo CJSON::encode($result);
    }
}