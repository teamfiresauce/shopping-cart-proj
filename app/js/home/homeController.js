(function () {
  'use strict';
  angular
    .module('app')
    .controller('homeCtrl', homeCtrl);

  function homeCtrl() {
    var vm = this;

    vm.buttonName = "Submit";

    vm.fooBar = function() {
      console.log("input name:", vm.foo);
    }

  }; // end of controller
})(); // end of iife
