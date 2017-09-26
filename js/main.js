(function () {
  'use strict';
  angular
    .module('app')
    .controller('mainCtrl', mainCtrl);

  function mainCtrl() {
    var vm = this;

    vm.test = "TESTING";
  }; // end of controller
})(); // end of iife
