(function() {
    'use strict';
angular
.module('app', ['ui.router'])
.config(appConfig); 

function appConfig ($stateProvider, $urlRouterProvider, $httpProvider) {

        $urlRouterProvider.otherwise('/home');

        $stateProvider
            .state('home', {
                url: '/home',
                templateUrl: 'js/home/home.html',
                controller: 'homeCtrl',
                controllerAs: 'vm'
            })

    };
})(); // end of iife
