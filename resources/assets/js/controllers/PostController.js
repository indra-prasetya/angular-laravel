angular.module('PostController', []).controller('PostController', ['$scope', '$location', '$routeParams', 'Post',
    function ($scope, $location, $routeParams, Post) {
        $scope.create = function () {
            var post = new Post({
                title: this.title,
                body: this.body
            });
            post.$save(function (res) {
                $location.path('posts/show/' + res.id);
                $scope.body = '';
            }, function (err) {
                console.log(err);
            });
        };

        $scope.find = function () {
            $scope.posts = Post.query();
        };

        $scope.remove = function (post) {           
            post.$remove(function (res) {
                alert('Delete success!');
                $location.path('/posts');
            }, function (err) {
                console.log(err);
            });
        };

        $scope.update = function (post) {
            console.log(post);
            post.$update(function (res) {
                $location.path('/posts/show/' + post.id);
            }, function (err) {
                console.log(err);
            });
        };

        $scope.findOne = function () {
            var splitPath = $location.path().split('/');
            var postId = splitPath[splitPath.length - 1];
            $scope.post = Post.get({postId: postId});
        };
    }
]);
