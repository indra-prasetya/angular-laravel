angular.module('PostService', []).factory('Post', ['$resource',
    function ($resource) {
        return $resource('/api/post/:postId', {
            postId: '@id'
        }, {
            update: {
                method: 'PUT'
            }
        });
    }
]);