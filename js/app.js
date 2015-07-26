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

app.directive('searchForm',function($http){
    return {
        restrict: 'A',
  		scope: false,
        link : function(scope,ele,attr){
            scope.name = null;
            scope.username = null;
            scope.roll_no = null;
            scope.address = null;
            scope.gender = 'all';
            scope.batch = 'all';
            scope.hall = 'all';
            scope.program = 'all';
            scope.department = 'all';
            scope.blood = 'all';

            ele.on('change',function(){
                scope.$parent.jumbo_flag = false;
                param = {
                    name : scope.name,
                    username : scope.username,
                    roll_no : scope.roll_no,
                    address : scope.address,
                    gender : scope.gender,
                    batch : scope.batch,
                    hall : scope.hall,
                    program : scope.program,
                    department : scope.department,
                    blood : scope.blood
                };

                $http.post('script/search.php',param).success(function(response){
                    scope.$parent.searchResult = response;
                });
            });
        }
    }
});

app.controller('appController',function($scope){
    $scope.jumbo_flag = true;
    $scope.searchResult = null;
});
