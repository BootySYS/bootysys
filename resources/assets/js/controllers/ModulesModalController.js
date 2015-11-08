module.exports = function ($scope, $uibModalInstance, module) {

    $scope.module = module;

    $scope.ok = function () {
        $uibModalInstance.close();
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };

};