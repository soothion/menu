<!-- header -->
<header id="header" role="header">
    <div class="boxed">
        <!-- tagline -->
        <div id="tagline">
            <h1>xx喊你吃饭</h1>
        </div>
        <!-- /tagline -->
        <div id="version">
                <ul class="nolist">
                    <?php if(!Yii::app()->user->id){?>
                    <li class="current"><a data-toggle="modal" data-target="#login" title="登录">登录</a></li>
                    <li class="current"><a data-toggle="modal" data-target="#register" title="注册">注册</a></li>
                    <?php }else{?>
                    <li class="current"><a data-toggle="modal" data-target="#info" title="欢迎！"><?php echo Yii::app()->user->username?></a></li>
                    <li class="current"><a data-toggle="modal" data-target="#order" title="订单">订单</a></li>
                    <li class="current"><a href="<?php echo Yii::app()->createUrl('index/logout');?>" title="退出">退出</a></li>
                    <?php }?>
                </ul>
        </div>
    </div>
</header>
<!-- /header -->   


<!-- 菜单  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">菜单</h4>
      </div>
      <div class="modal-body">
 <!-- items -->
            <table class="table table-bordered">

                <!-- header -->
                <tr class="well">
                    <td><b>Item</b></td>
                    <td class="tdCenter"><b>Quantity</b></td>
                    <td class="tdRight"><b>Price</b></td>
                    <td />
                </tr>

                <!-- empty cart message -->
                <tr ng-hide="cart.getTotalCount() > 0" >
                    <td class="tdCenter" colspan="4">
                        Your cart is empty.
                    </td>
                </tr>

                <!-- cart items -->
                <tr ng-repeat="item in cart.items | orderBy:'title'">
                    <td>{{item.title}}</td>
                    <td class="tdCenter">
                      <div class="input-append">
                        <!-- use type=tel instead of  to prevent spinners -->
                        <input
                            class="span3 text-center" type="tel" 
                            ng-model="item.quantity" 
                            ng-change="cart.saveItems()" />
                        <button 
                            class="btn btn-success" type="button" 
                            ng-disabled="item.quantity >= 1000"
                            ng-click="cart.addItem(item.id, item.title, item.price, +1)">+</button>
                        <button 
                            class="btn btn-inverse" type="button" 
                            ng-disabled="item.quantity <= 1"
                            ng-click="cart.addItem(item.id, item.title, item.price, -1)">-</button>
                      </div>
                    </td>
                    <td class="tdRight">{{item.price * item.quantity | currency}}</td>
                    <td class="tdCenter" title="remove from cart">
                        <a href="" ng-click="cart.addItem(item.id, item.title, item.price, -10000000)" >
                            <b class="icon-remove"></b>
                        </a>
                    </td>
                </tr>

                <!-- footer -->
                <tr class="well">
                    <td><b>Total</b></td>
                    <td class="tdCenter"><b>{{cart.getTotalCount()}}</b></td>
                    <td class="tdRight"><b>{{cart.getTotalPrice() | currency}}</b></td>
                    <td />
                </tr>
                <!-- note message -->
                <tr>
                    <td class="tdCenter" colspan="4">
                        <textarea ng-model="cart.note" class="form-control" placeholder="备注信息"></textarea>
                    </td>
                </tr>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" ng-click="submit()"  ng-disabled="!cart.getTotalCount()">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- 订单 -->
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >订单</h4>
        <form class="form-inline" role="form">
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Search" ng-model="search.$">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Date"  data-date-format="yyyy-mm-dd" ng-model="search.addtime" datepicker>
            </div>
            <div class="form-group">
              <!-- Dropdown button -->
                <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Status <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a ng-click="search.status='pending'">Pending</a></li>
                    <li><a ng-click="search.status='submit'">Submit</a></li>
                    <li><a ng-click="search.status='paid'">Paid</a></li>
                    <li><a ng-click="search.status=''">All</a></li>
                  </ul>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-body">
 <!-- items -->
            <table class="table table-bordered orderList">
                <!-- header -->
                <tr class="well">
                    <td ng-click="checkAll('.orderList :checkbox')"><b>All</b></td>
                    <td><b>User</b></td>
                    <td><b>Status</b></td>
                    <td><b>Note</b></td>
                    <td><b>Pay</b></td>
                    <td><b>Date</b></td>
                    <td><b>Op</b></td>
                </tr>

                <!-- empty cart message -->
                <tr ng-hide="count(order) > 0" >
                    <td class="tdCenter" colspan="7">
                        Order list is empty.
                    </td>
                </tr>
                <!-- cart items -->
                <tr ng-repeat="item in order.items | orderBy:'addtime' | filter:search">
                    <td><input type="checkbox" value="{{item.id}}"/></td>
                    <td>{{item.username}}</td>
                    <td>{{item.status}}</td>
                    <td>{{item.note}}</td>
                    <td>{{item.pay}}</td>
                    <td>{{item.addtime}}</td>
                    <td class="tdCenter">
                        <a href="" title="下单" ng-click="order.submit(item.id)"  >
                            <b class="icon-shopping-cart"></b>
                        </a>
                        <a href="" title="清算" ng-click="order.paid(item.id)"  >
                            <b class="icon-check"></b>
                        </a>
                       <a href="" title="删除" ng-click="order.delete(item.id)"  >
                            <b class="icon-remove"></b>
                        </a>
                    </td>
                </tr>
            </table>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            Action <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a ng-click="order.submit(order.getChecked('.orderList :checkbox'))">下单</a></li>
            <li><a ng-click="order.paid(order.getChecked('.orderList :checkbox'))">清算</a></li>
            <li><a ng-click="order.delete(order.getChecked('.orderList :checkbox'))">删除</a></li>
          </ul>
        </div>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- 登录 -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="block-heading modal-title"><i class="icon-user"></i> 登录</p>
      </div>
    <form name="login" novalidate  ng-submit="loginCtrl()">
      <div class="modal-body">
        <fieldset>
                  <input type="text" placeholder="用户名" class="form-control" required ng-model="user.username" ng-minlength=6 ng-maxlength=16 />
                  <input type="password" placeholder="密码" class="form-control" required ng-model="user.password" ng-minlength=6 ng-maxlength=16 />
        </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" ng-disabled="login.$invalid">登录</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- 注册 -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="block-heading modal-title"><i class="icon-user"></i> 注册</p>
      </div>
      <form name="signin" novalidate  ng-submit="registerCtrl()">
        <div class="modal-body">
          <fieldset>
                  <input type="text" placeholder="用户名" class="form-control" required ng-model="user.username" ng-minlength=6 ng-maxlength=16 />
                  <input type="password" placeholder="密码" class="form-control" required ng-model="user.password" ng-minlength=6 ng-maxlength=16 />
                  <input type="text" placeholder="尊姓大名" class="form-control" required ng-model="user.name" ng-minlength=6 ng-maxlength=20 />
          </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" ng-disabled="register.$invalid">注册</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 资料 -->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="block-heading modal-title"><i class="icon-user"></i> 资料</p>
      </div>
      <form name="info" novalidate  ng-submit="infoCtrl()">
        <div class="modal-body">
          <fieldset>
                  <input type="text" placeholder="用户名" class="form-control" required ng-model="user.username" ng-minlength=6 ng-maxlength=16 />
                  <input type="password" placeholder="密码" class="form-control"  ng-model="user.password" ng-minlength=6 ng-maxlength=16 />
                  <input type="text" placeholder="尊姓大名" class="form-control" required ng-model="user.name" ng-minlength=6 ng-maxlength=20 />
                  <input type="text" placeholder="电话" class="form-control"  ng-model="user.tel" ng-minlength=7 ng-maxlength=11 />
                  <input type="text" placeholder="QQ" class="form-control"  ng-model="user.qq" ng-minlength=5 ng-maxlength=10 />
                  <input type="text" placeholder="skype" class="form-control"  ng-model="user.skype" ng-minlength=6 ng-maxlength=50 />
                  <input type="text" placeholder="支付宝" class="form-control"  ng-model="user.alipay" ng-minlength=6 ng-maxlength=50 />
          </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" ng-disabled="info.$invalid">保存</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- 弹窗提示 -->
<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Message</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- nav -->
<nav id="primary">
    <div class="boxed">
        <div id="logo-head">
            <a href="<?php echo Yii::app()->createUrl('index');?>"><img src="assets/img/logo-head.png" alt="Laravel" /></a>
        </div>
        <?php $this->widget('NavWidget'); ?>
    </div>
</nav>
<!-- /nav -->

<!-- content -->
<div id="content">

    <!-- docs -->
    <section id="documentation">
        <article class="boxed">
                <!-- docs content -->
                <div id="docs-content">
                    <div class="itemBox" ng-repeat="item in items | filter:filter">
                        <image ng-src="{{item.image|| 'assets/img/none.jpg'}}" width="199" height="199" ng-click="cart.addItem(item.id, item.title, item.price, 1)"/>
                        <span class="transparent">{{item.title}}<b>{{item.price | currency}}</b></span> 
                    </div>
                </div>
            <!-- /docs content -->

        </article>
    </section>
    <!-- /docs -->
</div>
