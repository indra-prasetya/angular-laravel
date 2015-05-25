angular.module('appRoutes', []).config(['$routeProvider', '$locationProvider', '$httpProvider',
  function ($routeProvider, $locationProvider, $httpProvider) {
    $routeProvider
      .when('/', {
        templateUrl: '/partials/index',
        controller: 'MainController'
      })
      .when('/:category/:action?/:id?', {
        templateUrl: function (params) {
          var allowedParams = ['category', 'action', 'id'];
          var paramVals = [];
          for (var key in params) {
            if (allowedParams.indexOf(key) !== -1) {
              paramVals.push(params[key]);
            }
          }
          console.log('/partials/' + paramVals.join('/'));
          return '/partials/' + paramVals.join('/');
        }
      })
      .otherwise({
        redirectTo: '/'
      });
    
    $locationProvider.html5Mode(true);

    $httpProvider.interceptors.push(['$rootScope', '$q', '$localStorage', '$location',
      function ($rootScope, $q, $localStorage, $location) {
        return {
          'request': function (config) {
            config.headers = config.headers || {};
            if ($localStorage.token) {
              config.headers.Authorization = 'Bearer ' + $localStorage.token;
            }
            return config;
          },
          'response': function (res) {
          	console.log(res);
            if (res.data.status === 401) {
              // Handle unauthenticated user.
              $location.path('/auth/login');
			  $location.replace();
            }
            return res || $q.when(res);
          }
        };
      }
    ]);
  }
]);
