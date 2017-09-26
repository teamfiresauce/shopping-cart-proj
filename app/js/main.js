(function () {
  'use strict';
  angular
    .module('app')
    .controller('mainCtrl', mainCtrl);

  function mainCtrl() {
    var vm = this;

    vm.buttonName = "Submit";

    vm.fooBar = function() {
      console.log("input name:", vm.foo);
    }

  }; // end of controller
})(); // end of iife
