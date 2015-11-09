module.exports = function($scope, $http, $window, $uibModal, $log, moduleService) {

    $scope.modules = [];
    $scope.professors = [];

    $scope.state = 'all';

    $scope.alerts = [];

    $scope.newModule = {
        name: '',
        short_name: '',
        description: '',
        professors: []
    };

    $scope.loading = false;

    function init() {
        moduleService.getModules().then(function (response) {
            $scope.modules = response.data;
        });

        $http.get('/professors/all').then(function(result) {
            $scope.professors = result.data;
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

        $scope.loading = true;

        $scope.alerts = [];

        $http.post('/modules/store', $scope.newModule)
            .then(function (result) {

                $scope.modules.push(result.data);
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

    $scope.addProfessor = function(professor) {

        if ($scope.newModule.professors.indexOf(professor.id) < 0) {
            $scope.newModule.professors.push(professor.id);
        }

    };

    $scope.removeProfessor = function(professor) {
        $scope.newModule.professors.splice($scope.newModule.professors.indexOf(professor.id), 1);
    };

    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };

    $scope.showModule = function (module) {

        var modalInstance = $uibModal.open({
            animation: true,
            template: require('../templates/modals/module.html'),
            controller: 'ModulesModalController',
            size: 'lg',
            resolve: {
                module: function () {
                    return module;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
        }, function () {
            $log.info('Modal dismissed at: ' + new Date());
        });

    };
};