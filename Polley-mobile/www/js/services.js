angular.module('starter.services', [])

/**
 * A simple example service that returns some data.
 */
.factory('Coupons', function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var coupons = [
    { id: 0, name: 'Scruff McGruff' },
    { id: 1, name: 'G.I. Joe' },
    { id: 2, name: 'Miss Frizzle' },
    { id: 3, name: 'Scruff McGruff' },
    { id: 4, name: 'G.I. Joe' },
    { id: 5, name: 'Miss Frizzle' },
    { id: 6, name: 'Scruff McGruff' },
    { id: 7, name: 'G.I. Joe' },
    { id: 8, name: 'Miss Frizzle' },
    { id: 9, name: 'Scruff McGruff' },
    { id: 10, name: 'G.I. Joe' },
    { id: 11, name: 'Miss Frizzle' },
    { id: 12, name: 'Ash Ketchum' }
  ];

  return {
    all: function() {
      return coupons;
    },
    get: function(couponsId) {
      // Simple index lookup
      return coupons[couponId];
    }
  }
});