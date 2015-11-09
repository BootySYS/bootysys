module.exports = function($scope, $http, $window) {

    $scope.professors = [];

    $scope.state = 'all';

    $scope.alerts = [];

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

        $scope.loading = true;
        $scope.alerts = [];

        $http.post('/professors/store', $scope.newProfessor)
            .then(function (result) {

                $scope.professors.push(result.data);
                $window.location.reload();

            }, function (response) {
                var alerts = [];

                angular.forEach(response.data, function(errors, field) {

                    for (var i in errors) {
                        alerts.push(errors[i]);
                    }
                });

                $scope.alerts.push({
                    type: 'danger',
                    msg: alerts
                });

                $scope.loading = false;
            });
    };

    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };

    $scope.delete = function(professor) {

        $scope.loading = true;

        $http.delete('/professors/delete', {params: {id: professor.id}})
            .then(function (result) {
                if (result.status == 200) {
                    $window.location.reload();
                }
            });
    };
};