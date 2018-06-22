var routerApp = angular.module('routerApp', ['ui.router']);

routerApp.config(function($stateProvider) {
    $stateProvider
        // HOME STATES AND NESTED VIEWS ========================================
        .state('home', {
            url: '/home',
            templateUrl: 'noidungtrangchu.php'
        })

        // ABOUT PAGE AND MULTIPLE NAMED VIEWS =================================
        .state('dichvu', {
            url: '/dichvu',
            templateUrl: 'nhanvien/quanly_dv_thongtin.php'    
        });

});