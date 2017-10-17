(function () {
    'use strict';
    angular
      .module('app')
      .service('productService', productService);
  
    function productService($http) {

      this.getAllProducts = function() {
        $http({
          method: 'GET',
          url: 'http://jeremytporter.com/sauce_api/server.php?method=getAllProducts'
        }).then(function successCallback(response) {
            return response;
          }, function errorCallback(response) {
            return response;
          });
      }


    }; // end of service
  })(); // end of iife
  