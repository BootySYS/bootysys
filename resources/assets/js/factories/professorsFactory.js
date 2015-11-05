module.exports = function($http) {
    return {
        get: function (url) {
            $http.get('/professors/' + url).then(function (response) {
                return response.data;
            });
        }
    };
};