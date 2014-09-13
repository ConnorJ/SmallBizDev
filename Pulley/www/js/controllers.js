angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope) {
})

.controller('FriendsCtrl', function($scope, Friends) {
  $scope.friends = Friends.all();
})

.controller('FavoritesCtrl', function($scope, Favorites) {
  $scope.favorites = Favorites.all();
})

.controller('CouponsCtrl', function($scope, Coupons) {
  $scope.coupons = Coupons.all();
})

.controller('CouponsDetailCtrl', function($scope, $stateParams, Coupons) {
  $scope.coupon = Coupons.get($stateParams.couponsId);
})


.controller('FriendDetailCtrl', function($scope, $stateParams, Friends) {
  $scope.friend = Friends.get($stateParams.friendId);
})

.controller('AccountCtrl', function($scope) {
});
