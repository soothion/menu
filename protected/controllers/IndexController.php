<?php

class IndexController extends Controller{
    public function actionIndex(){
        $this->render('index');
    }
    public function actionUpload(){
        error_reporting(E_ALL | E_STRICT);
        $date=  date('Y/m/d');
        $upload_dir='files/'.$date;
        $upload_url='files/'.$date;
        $options=array('upload_dir'=>$upload_dir,'upload_url'=>$upload_url);
        $upload_handler = new UploadHandler($options);
    }
}