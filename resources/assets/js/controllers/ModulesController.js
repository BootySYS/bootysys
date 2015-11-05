module.exports = function($scope, $http) {

    $scope.modules = [];

    $scope.state = 'all';

    $scope.newModule = {
        name: 'Test Module',
        short_name: '',
        description: '',
        professors: ''
    };

    function init() {
        $http.get('/modules/all').then(function (result) {
            $scope.modules = result.data;
        });
    }

    init();

    $scope.addModule = function() {
        $scope.state = 'add';
    };

    $scope.cancel = function () {
        $scope.state = 'all';
    };

    $scope.submitNewModule = function() {
        $http.post('/modules/store', $scope.newModule).then(function (result) {
            console.log(result);
        });
    };
};