var app = angular.module('student-search',['ngRoute']);


app.config(['$routeProvider', '$locationProvider',function($routeProvider, $locationProvider){
    $routeProvider
        .when('/student/:username',{
            templateUrl : 'partials/profile.html'
        })
        .otherwise({
            templateUrl : 'partials/welcome.html'
        });

    $locationProvider.html5Mode({
        enabled : false,
        requireBase : false
    });
}]);

app.controller('appController',function($scope){
    //
});
