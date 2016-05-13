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

        $scope.removeIdea = function (idea) {
            console.info("Trying to remove idea #" + idea.id);
            idea.$delete(function () {
                console.info("Idea deleted");
                $scope.ideas = Idea.query();
            });
        };
        $scope.idea = new Idea();
        $scope.saveIdea = function () {

            console.info("Trying to add idea ");
            console.info($scope.idea);
            if ($scope.ideas.id) {
                $scope.idea.$update(function(){
                   console.info("Idea updated");
                    $scope.ideas = Idea.query();
                    $scope.idea = new Idea();
                });
            } else {
                $scope.idea.$save(function () {
                    console.info("Idea saved");
                    $scope.ideas = Idea.query();
                    $scope.idea = new Idea();
                });
            }

        }


        $scope.editIdea = function (idea) {
            $scope.idea = idea;
        }

    });
