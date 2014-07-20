<?php

class OrderController extends Controller{
    public function actionIndex(){
        $list = Yii::app()->db->createCommand()
                ->select('u.username,o.*')
                ->from('{{users}} u')
                ->join('{{order}} o', 'u.id=o.uid')
                ->queryAll();
        foreach($list as $v){
            $oid=$v['id'];
            $v['detail']=  OrderDetail::model()->findAll("oid=$oid");
        }
        echo CJSON::encode($list);
    }
    //删除订单
    public function actionDelete(){
        if(!$uid=Yii::app()->user->id)
                $this->error('乖乖，先登录！');
        $id=$_REQUEST['id'];
        $order=  Order::model()->findAll("id in ($id)");
        $order_detail=  OrderDetail::model()->findAll("id in ($id)");
        $transaction = Yii::app()->db->beginTransaction();
        try
        {
            foreach($order as $k=>$v){
                if($v->status=='submit')
                    throw new Exception('还没给钱，你想毁尸灭迹？');
                if($v->uid!=$uid)
                    throw new Exception('住手，这不是你的订单！');
                $v->delete();
            }
            foreach($order_detail as $k=>$v){
                $v->delete();
            }
            $transaction->commit(); 
        }
        catch (Exception $e)
        {
            $transaction->rollback(); 
            $this->error($e->getMessage());
        }    
        $this->success('订单删除成功！');
    }
    
    //下单
    public function actionSubmit(){
        if(!$uid=Yii::app()->user->id)
                $this->error('乖乖，先登录！');        
        $id=$_REQUEST['id'];
        $order=  Order::model()->findAll("id in ($id)");
        $result=array();
        $transaction = Yii::app()->db->beginTransaction();
        try
        {
            foreach($order as $k=>$v){
                if($v->status!='pending')
                    throw new Exception('已经下过单了，还下个球！');
                $v->pay=$uid;
                $v->status='submit';
                $v->save();
                $oid=$v->id;
                $detail =  OrderDetail::model()->findAll("oid=$oid");
                $detail[0]->note=$v->note;
                $result[]=$detail;
            }
            $transaction->commit(); 
        }
        catch (Exception $e)
        {
            $transaction->rollback(); 
            $this->error($e->getMessage());
        }    
        $message='</br>';
        $message.='<table class="table table-striped table-hover">';
        $message.='<tr><th>Item</th><th>Note</th></tr>';
        foreach($result as $items){
            $item='';
            foreach($items as $v){
               $item.='&nbsp'.$v->title; 
            }
            $note=$items[0]->note;
            $message.="<tr><td>$item</td><td>$note</td></tr>";
        }
        $message.='</table>';
        $this->success('下单成功！'.$message);
    }
    //订单清算
    public function actionPaid(){
        if(!$uid=Yii::app()->user->id)
                $this->error('乖乖，先登录！');    
        $id=$_REQUEST['id'];
        $order=  Order::model()->findAll("id in ($id)");
        $transaction = Yii::app()->db->beginTransaction();
        try
        {
            foreach($order as $k=>$v){
                if($v->status=='pending')
                    throw new Exception('没下单，清算毛线！');
                if($v->status=='paid')
                    throw new Exception('土豪，清算过了！');
                if($v->pay!=$uid)
                    throw new Exception('眼睛别抖，这不是你下的单！');
                $v->status='paid';
                $v->save();
            }
            $transaction->commit(); 
        }
        catch (Exception $e)
        {
            $transaction->rollback(); 
            $this->error($e->getMessage());
        }   
        $this->success('清算成功！');
    }
}