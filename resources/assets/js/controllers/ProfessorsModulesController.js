module.exports = function($scope, $http, $window, $uibModal, $log, moduleService) {

    $scope.state = 'all';

    $scope.alerts = [];


    $scope.loading = false;

    function init() {
        moduleService.getModules().then(function (response) {
            $scope.modules = response.data;
        });

        $http.get('/professors/your-modules/all').then(function(result) {
            $scope.professors = result.data;
        });
    }

    init();

    $scope.cancel = function () {
        $scope.state = 'all';
    };


    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };

    $scope.showModule = function (module) {

        $uibModal.open({
            animation: false,
            template: require('../templates/modals/module.html'),
            controller: 'ModulesModalController',
            size: 'lg',
            resolve: {
                module: function () {
                    return module;
                }
            }
        });
    };
};