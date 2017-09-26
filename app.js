(function() {
    'use strict';
angular
.module('app', ['ui.router'])
.config(appConfig); 

function appConfig ($stateProvider, $urlRouterProvider, $httpProvider) {

        $urlRouterProvider.otherwise('/main');

        $stateProvider
            .state('main', {
                url: '/main',
                templateUrl: 'js/main.html',
                controller: 'mainCtrl',
                controllerAs: 'vm'
            })

    };
})(); // end of iife
