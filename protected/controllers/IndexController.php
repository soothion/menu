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
        $cart=json_decode(file_get_contents('php://input'));
        if(!$uid=Yii::app()->user->id)
            $this->error('乖乖，先登录！');
        $note=$cart->note;
        $items=$cart->items;
        $order=new Order;
        $order->uid=$uid;
        $order->status='pending';
        $order->note=$note;
        //事务提交订单
        $transaction = Yii::app()->db->beginTransaction();
        try
        {
            $order->save();
            $oid=$order->id;
            foreach($items as $item){
                $detail=new OrderDetail;
                $detail->oid=$oid;
                $detail->iid=$item->id;
                $detail->title=$item->title;
                $detail->price=$item->price;
                $detail->save();
            }
            $transaction->commit(); //提交事务会真正的执行数据库操作
        }
        catch (Exception $e)
        {
            $transaction->rollback(); //如果操作失败, 数据回滚
            $this->error('订单提交失败！');
        }          
        $this->success('订单提交成功！');
    }
    
    public function actionRegister(){
        if(Users::model()->findByAttributes(array('username'=>$_REQUEST['username'])))
            $this->error('用户名已存在！');
        $model=new Users();
        $model->attributes=$_REQUEST;
        $model->password = md5($model->password);
        if($model->validate()&&$model->save()){
            $model = new LoginForm;
            $model->attributes = $_REQUEST;
            $model->login();
            $this->success('注册成功！');
        }
        else
        {
            $this->error('注册失败！');
        }
    }
    
    public function actionLogin() {
        $model = new LoginForm;
        $model->attributes = $_REQUEST;
        if ($model->validate() && $model->login()) {
            $this->success('登录成功！');
        }
        else
        {
            $this->error('用户名或密码错误！');
        }
    }
    
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect($this->createUrl('index'));
    }
    public function actionUser() {
        $uid=Yii::app()->user->id;
        $user=Users::model()->findByPk($uid);
        unset($user->password);
        if($user)
            echo CJSON::encode($user);
        else echo '';
    }
    public function actionInfo(){
        if(!$uid=Yii::app()->user->id)
            $this->error('乖乖，先登录！');
        $user=Users::model()->findByPk($uid);
        if(trim($_POST['password'])=='')
            unset($_POST['password']);
        else $_POST['password']=md5($_POST['password']);
        $user->attributes=$_POST;
        if($user->save())
            $this->success('更新成功！');
        else $this->error('更新失败！');
    }
}