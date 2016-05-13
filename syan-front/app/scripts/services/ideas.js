'use strict'

var service = angular.module("syan.services", ["ngResource"]);
service.factory("Idea", function ($resource) {
    return $resource(
        "http://localhost:8000/api/ideas/:id.json",
        {id: "@id" },
        {
            "delete":{method: "DELETE"},
            "update": {method: "PUT"},
            "save": {method:"POST"},
            "reviews": {'method': 'GET', 'params': {'reviews_only': "true"}, isArray: true}

        }
    );
});