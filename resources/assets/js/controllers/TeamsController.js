module.exports = function($scope, $http, $window, $uibModal, $log, moduleService) {

    $scope.teams = [];

    $scope.state = 'all';

    $scope.alerts = [];

    function init() {
        $http.get('/teams/all').then(function (result) {
            $scope.teams = result.data;
        });
    }

    init();


    $scope.cancel = function () {
        $scope.state = 'all';
    };

    //$scope.submitNewStudent = function() {
    //
    //    $scope.loading = true;
    //    $scope.alerts = [];
    //
    //    $http.post('/students/store', $scope.newStudent)
    //        .then(function (result) {
    //
    //            $scope.students.push(result.data);
    //            $window.location.reload();
    //
    //        }, function (response) {
    //            var alerts = [];
    //
    //            angular.forEach(response.data, function(errors, field) {
    //
    //                for (var i in errors) {
    //                    alerts.push(errors[i]);
    //                }
    //            });
    //
    //            $scope.alerts.push({
    //                type: 'danger',
    //                msg: alerts
    //            });
    //
    //            $scope.loading = false;
    //        });
    //};


    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };

    $scope.delete = function(team) {

        $scope.loading = true;

        $http.delete('/teams/delete', {params: {id: team.id}})
            .then(function (result) {
                if (result.status == 200) {
                    $window.location.reload();
                }
            });
    };


    $scope.updateTeam = function (team) {

        $scope.state = 'update';
        $scope.teamToUpdate = team;
    };


    $scope.updateOldTeam = function(team) {
        $scope.loading = true;
        $scope.alerts = [];
        $http.put('/teams/update',team)
            .then(function (result) {

                $scope.teams.push(result.data);
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

    $scope.showTeam = function (team) {

        $uibModal.open({
            animation: false,
            template: require('../templates/modals/team.html'),
            controller: 'TeamsModalController',
            size: 'lg',
            resolve: {
                student: function () {
                    return team;
                }
            }
        });
    };
};