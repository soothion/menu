//initiating jQuery
jQuery(function($) {
  $(document).ready( function() {
    //enabling stickUp on the '.navbar-wrapper' class
    $('#primary').stickUp();
  });
});

//angular
var menu = angular.module('myApp', []);
menu.controller('MenuList', function($scope, $http){
    
    // get store and cart from service
    $scope.cart = new shoppingCart('menu');
    $scope.filter={};
    $scope.filter.rid='';
    //获取菜单列表
    $scope.loadMenu=function(){
        $http({method: 'GET', url: 'index.php?r=index/list'}).
        success(function(data, status, headers, config) {
          $scope.items = data;
        });
    };
    $scope.loadMenu();
    
    //获取订单列表
    $scope.order={};
    $scope.loadOrder=function(){
       $http({method: 'GET', url: 'index.php?r=order/index'}).
        success(function(data, status, headers, config) {
          $scope.order.items = data;
        }); 
    };
    $scope.loadOrder();
    //初始化时间
    $scope.search={};
    $scope.search.addtime=new Date().format("yyyy-MM-dd ");
    //获取用户信息
    $scope.user={};
    $scope.loadUser=function(){
       $http({method: 'GET', url: 'index.php?r=index/user'}).
        success(function(data, status, headers, config) {
          $scope.user = data;
        }); 
    };
    $scope.loadUser();
    //success 弹窗
    $scope.success=function(message){
        $('#message .btn'). attr("class","btn btn-success");
        $('#message .modal-body').attr("class","modal-body alert alert-success").html(message);
        $('#message').modal('show');
    };
    
    //error 弹窗
    $scope.error=function(message){
        $('#message .btn'). attr("class","btn btn-danger");
        $('#message .modal-body').attr("class"," modal-body alert alert-error").html(message);
        $('#message').modal('show');
    };
    //提交菜单 
    $scope.submit=function(){
            $http({
                method  : 'POST',
                url     : 'index.php?r=index/submit',
                data    :$scope.cart,  // pass in data as strings
            })
            .success(function(data, status, headers, config){
            if(data.status=='1'){
                $scope.cart.items=[];//清空购物车
                $scope.loadOrder();
                $scope.success(data.message);
            }
            else{
                $scope.error(data.message);
            }
        });
    };
    
    //注册
    $scope.registerCtrl = function() {
            $http({
            method  : 'POST',
            url     : 'index.php?r=index/register',
            data    : $.param($scope.user),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        })
        .success(function(data) {
            if(data.status=='1'){
                $('#register').modal('hide');
                $scope.loadUser();//加载用户信息
                $scope.success(data.message);
                setTimeout('location.reload();',3000);
            }
            else{
                $('#register').modal('hide');
                $scope.error(data.message);
            }
        });
    };
    
    //登录
    $scope.loginCtrl = function() {
        $http({
            method  : 'POST',
            url     : 'index.php?r=index/login',
            data    : $.param($scope.user),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        })
        .success(function(data) {
            if(data.status=='1'){
                $('#login').modal('hide');
                $scope.loadUser();//加载用户信息
                location.reload();
            }
            else{
                $('#login').modal('hide');
                $scope.error(data.message);
            }
        });
    };    
    //编辑个人资料
    $scope.infoCtrl = function() {
        $http({
            method  : 'POST',
            url     : 'index.php?r=index/info',
            data    : $.param($scope.user),  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        })
        .success(function(data) {
            if(data.status=='1'){
                $scope.loadUser();//加载用户信息
                $scope.success(data.message);
            }
            else{
                $scope.error(data.message);
            }
        });
    };     
    
    $scope.order.submit=function(id){
        $http({
            method  : 'POST',
            url     : 'index.php?r=order/submit',
            data    : 'id='+id,  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        })
        .success(function(data) {
            if(data.status=='1'){
                $scope.success(data.message);
                $scope.loadOrder();//加载订单信息
            }
            else{
                $scope.error(data.message);
            }
        });
    };
    $scope.order.paid=function(id){
         $http({
            method  : 'POST',
            url     : 'index.php?r=order/paid',
            data    : 'id='+id,  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        })
        .success(function(data) {
            if(data.status=='1'){
                $scope.loadOrder();//加载订单信息
                $scope.success(data.message);
            }
            else{
                $scope.error(data.message);
            }
        });       
    };
    $scope.order.delete=function(id){
        $http({
            method  : 'POST',
            url     : 'index.php?r=order/delete',
            data    : 'id='+id,  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        })
        .success(function(data) {
            if(data.status=='1'){
                $scope.loadOrder();//加载订单信息
            }
            else{
                $scope.error(data.message);
            }
        });
    };
    $scope.order.getChecked=function(e){
        var id=[];
        $(e).each(function () {  
            if($(this).attr("checked")=='checked')
                id.push($(this).val());
        });  
        return(id.join(','));
    };
   //获取对象数量 
   $scope.count=function(obj){
       var i=0;
       for(var j in obj){
           i++;
       };
       return i;
   };
   //全选、反选 
   $scope.checkAll=function(e){
        $(e).each(function () {  
            $(this).attr("checked", !$(this).attr("checked"));  
        });  
   };
});



menu.directive('datepicker', function () {  
        return {  
            restrict: 'A',  
            require: "ngModel",    
            link: function (scope, element, attr,ngModelCtrl) {  
                element.datetimepicker({
                        language:  'zn-CN',
                        dateFormat:'yyyy-mm-dd',
                        weekStart: 1,
                        todayBtn:  1,
                        autoclose: 1,
                        todayHighlight: 1,
                        minView:2,
                        forceParse: 0
                    }).on('changeDate', function(e) {  
                    // var outputDate = new Date(e.date);  
                    // var n = outputDate.getTime();  
                    ngModelCtrl.$setViewValue(element.val());  
                    scope.$apply();  
                });  
                var component = element.siblings('[data-toggle="datepicker"]');  
                if (component.length) {  
                    component.on('click', function () {  
                        element.trigger('focus');  
                    });  
                }  
            }  
        };  
});  


//data格式化
Date.prototype.format = function(format)
{
    var o = {
        "M+": this.getMonth() + 1, //month
        "d+": this.getDate(), //day
        "h+": this.getHours(), //hour
        "m+": this.getMinutes(), //minute
        "s+": this.getSeconds(), //second
        "q+": Math.floor((this.getMonth() + 3) / 3), //quarter
        "S": this.getMilliseconds() //millisecond
    }
    if (/(y+)/.test(format))
        format = format.replace(RegExp.$1,
                (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(format))
            format = format.replace(RegExp.$1,
                    RegExp.$1.length == 1 ? o[k] :
                    ("00" + o[k]).substr(("" + o[k]).length));
    return format;
}