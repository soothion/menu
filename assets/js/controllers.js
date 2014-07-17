var menu = angular.module('myApp', []);
menu.controller('MenuList', function($scope, $http){
  $http({method: 'GET', url: 'index.php?r=index/list'}).
  success(function(data, status, headers, config) {
    $scope.items = data;
  }).
  error(function(data, status, headers, config) {
      alert('error: ' + data);
  });
  
    $scope.restaurant = function (id) {  
      $scope.filter.rid=id; 
    }  
});

menu.filter('restaurant', function() {     
    return function(inputArray) {         
        var array = []; 
                for (var i = 0; i < inputArray.length; i++) {             
                                if (i % 2 !== 0) { 
                            array.push(inputArray[i]);
                     }
                 } 
                return array;
         }
 });
