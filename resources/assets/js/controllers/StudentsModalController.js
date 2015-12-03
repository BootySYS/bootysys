module.exports = function ($scope, $uibModalInstance, student) {

    $scope.student = student;

    $scope.ok = function () {
        $uibModalInstance.close();
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };

};