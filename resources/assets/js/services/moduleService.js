module.exports = function($http, $q) {

    var deferred = $q.defer();

    var modules = [];

    $http.get('/modules/all').then(function (response) {
        deferred.resolve(response);
        modules = response.data;
    });

    this.getModules = function () {
      return deferred.promise;
    };

};