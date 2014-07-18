<!-- header -->
<header id="header" role="header">
    <div class="boxed">
        <!-- tagline -->
        <div id="tagline">
            <h1>饭否</h1>
        </div>
        <!-- /tagline -->
        <div id="version">
                <ul class="nolist">
                    <li class="current"><a data-toggle="modal" data-target="#login" title="登录">登录</a></li>
                    <li class="current"><a data-toggle="modal" data-target="#register" title="注册">注册</a></li>
                </ul>
        </div>
    </div>
</header>
<!-- /header -->   

<!-- MenuPop -->
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
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" ng-click="submit()">Submit</button>
      </div>
    </div>
  </div>
</div>

<!--alert-->
<!-- Small modal -->

<!-- MenuPop -->
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
<!-- 登录 -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <p class="block-heading modal-title"><i class="icon-user"></i> 登录</p>
      </div>
      <div class="modal-body">
        <fieldset>
            <input type="text" placeholder="用户名" class="form-control"/>
            <input type="password" placeholder="密码" class="form-control"/>
        </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">登录</button>
      </div>
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
      <div class="modal-body">
        <fieldset>
            <form name="register" novalidate>
                <input type="text" placeholder="用户名" class="form-control" required ng-model="register.username" ng-minlength=6 ng-maxlength=16 />
                <input type="password" placeholder="密码" class="form-control" required ng-model="register.password" ng-minlength=6 ng-maxlength=16 />
                <input type="text" placeholder="尊姓大名" class="form-control" required ng-model="register.name" ng-minlength=6 ng-maxlength=20 />
            </form>
        </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" disabled="{{!register.$invalid}}">注册</button>
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
                        <span class="transparent">{{item.title}}<b>￥{{item.price}}</b></span> 
                    </div>
                </div>
            <!-- /docs content -->

        </article>
    </section>
    <!-- /docs -->
</div>


