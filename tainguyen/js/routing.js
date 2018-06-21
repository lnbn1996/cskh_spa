var routerApp = angular.module('routerApp', ['ui.router']);

routerApp.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/home');
    appModule.config(['$locationProvider', function($locationProvider) {
      $locationProvider.hashPrefix('');
    }]);
    $stateProvider

        // HOME STATES AND NESTED VIEWS ========================================
        .state('home', {
            url: '/home',
            templateUrl: 'noidungtrangchu.php'
        })

        // ABOUT PAGE AND MULTIPLE NAMED VIEWS =================================
        .state('dichvu', {
            url: '/dichvu',
            templateUrl: 'dichvu.php'    
        });

});