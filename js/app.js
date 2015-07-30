var app = angular.module('student-search',['ngRoute']);

app.config(['$routeProvider', '$locationProvider',function($routeProvider, $locationProvider){
    $routeProvider
        .when('/profile/:username',{
            templateUrl : 'partials/profile.html',
            controller : 'profileController'
        })
        .otherwise({
            templateUrl : 'partials/welcome.html'
        });

    $locationProvider.html5Mode({
        enabled : false,
        requireBase : false
    });
}]);

app.factory('getUserData',function($http,$q){
    return {
        getByUsername : function(username){
            var deferred = $q.defer();
            $http.get('script/user_data.php?username='+username).then(function(data){
                deferred.resolve(data);
            });
            return deferred.promise;
        }
    }
});

app.directive('searchForm',function($http,$timeout,$location){
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
                scope.$parent.loader = true;
                param = 'name='+scope.name+'&username='+scope.username+'&roll_no='+scope.roll_no+'&address='+scope.address+'&gender='+scope.gender+'&batch='+scope.batch+'&hall='+scope.hall+'&program='+scope.program+'&department='+scope.department+'&blood='+scope.blood;

                $http.get('script/search.php?'+param).success(function(response){
                	$location.path('/welcome');
                    scope.$parent.searchResult = response;
                    $timeout(function(){
                        scope.$parent.loader = false;
                    });
                });
            });
        }
    }
});

app.controller('appController',function($scope,$rootScope,$location){
    $rootScope.og_data = {
        title : 'Student Search | IITK',
        description : null,
        image : null,
        url : $location.absUrl()
    };
    $scope.jumbo_flag = true;
    $scope.searchResult = null;
    $scope.loader = false;
});

app.controller('profileController',function($scope,$routeParams,$rootScope,getUserData) {
    getUserData.getByUsername($routeParams.username).then(function(response){
        $scope.userData = response.data.data;
        var descp = 'Roll No. : '+$scope.userData.roll_no+' | Department : '+$scope.userData.department;
        $rootScope.og_data = {
            title : $scope.userData.name,
            description : descp,
            image : $scope.userData.photo,
            url : 'http://home.iitk.ac.in/~'+$scope.userData.username
        };
    });
});
