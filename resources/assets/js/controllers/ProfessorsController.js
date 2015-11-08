module.exports = function($scope, $http) {

    $scope.professors = [];

    $scope.state = 'all';

    $scope.newProfessor = {
        first_name: '',
        last_name: '',
        email: ''

    };

    function init() {
        $http.get('/professors/all').then(function (result) {
            $scope.professors = result.data;
        });
    }

    init();

    $scope.addProfessor = function() {
        $scope.state = 'add';
    };

    $scope.cancel = function () {
        $scope.state = 'all';
    };

    $scope.submitNewProfessor = function() {
        $http.post('/professors/store', $scope.newProfessor).then(function (result) {
            console.log(result);
        });
    };
};