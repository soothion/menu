
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

    $http({method: 'GET', url: 'index.php?r=index/list'}).
    success(function(data, status, headers, config) {
      $scope.items = data;
    }).
    error(function(data, status, headers, config) {
        alert('error: ' + data);
    });
    
    $scope.submit=function(){
        $http.post('index.php?r=index/submit', $scope.cart.items).success(function(data, status, headers, config){
            if(data.status=='1'){
                $('#myModal').modal('hide');
                $scope.cart.items=[];//清空购物车
                $('#message .btn').addClass('btn-success');
                $('#message .modal-body').addClass('alert-success').html(data.message);
                $('#message').modal('show');
            }
            else{
                $('#myModal').modal('hide');
                $('#message .btn').addClass('btn-danger');
                $('#message .modal-body').addClass('alert-error').html(data.message);
                $('#message').modal('show');
            }
        });
    }
});

