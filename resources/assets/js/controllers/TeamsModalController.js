module.exports = function ($scope, $uibModalInstance, team) {

    $scope.team = team;

    $scope.ok = function () {
        $uibModalInstance.close();
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };

};