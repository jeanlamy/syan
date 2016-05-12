'use strict';

/**
 * @ngdoc function
 * @name syanFrontApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the syanFrontApp
 */
angular.module('syanFrontApp')
  .controller('MainCtrl', function ($scope, $http) {
      $http.get("http://localhost:8000/api/ideas.json")
          .then(function (response) {
              
              $scope.ideas = response.data;
          });
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
