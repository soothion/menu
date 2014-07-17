<?php

class IndexController extends Controller{
    public function actionIndex(){
        $model = Config::model()->findByPk(1);

        if (isset($_POST['Config'])) {
            $model->attributes = $_POST['Config'];
            $model->id=1;
            if ($model->save())
                $this->redirect(array('index'));
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }
    
    public function actionPassword() {
            $id=  Yii::app()->admin->id;
            $model =  Admins::model()->findByPk($id);
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'id-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            if(isset($_POST['Admins'])&&$_POST['Admins']!==''){
                if (md5($_POST['Admins']['oldpassword']) != $model->password) {
                    $this->message('密码错误');
                }
                $model->username = $_POST['Admins']['username'];
                $model->password = md5($_POST['Admins']['password']);
                 $model->repassword = md5($_POST['Admins']['password']);
                if ($model->save()) {
                    $this->message('保存成功！',$this->createUrl('/admin/login'));
                } else {
                    $this->message('保存失败！');
                }
            }
            else{
                $model = new Admins('modify_pw');
                $this->breadcrumbs[] = '修改密码';
                $model->password = "";
                $this->render('password', array('model' => $model));
            }
    }
    
}