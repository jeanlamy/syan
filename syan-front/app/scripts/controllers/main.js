'use strict';

/**
 * @ngdoc function
 * @name syanFrontApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the syanFrontApp
 */
angular.module('syanFrontApp')
  .controller('MainCtrl', function ($scope, $http, Idea) {
      $scope.ideas = Idea.query();

      $scope.removeIdea = function(idea){
        console.info("Trying to remove idea #"+idea.id);
          idea.$delete(function() {
              console.info("Idea deleted");
              $scope.ideas = Idea.query();
          });
      };


  });
