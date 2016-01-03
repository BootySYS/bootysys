module.exports = function ($scope, $uibModalInstance, $http, student) {

    $scope.student = student;

    $scope.ok = function () {
        $uibModalInstance.close();
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };

    $scope.delete = function(student) {

        $scope.loading = true;

        $http.delete('/students/delete', {params: {id: student.id}})
            .then(function (result) {
                if (result.status == 200) {
                    $window.location.reload();
                }
            });
    };

    $scope.deleteMember = function(student) {

        $scope.loading = true;

        $http.delete('/teams/delete', {params: {id: student.id}})
            .then(function (result) {
                if (result.status == 200) {
                    $window.location.reload();
                }
            });
    };

    $scope.updateMember = function (student) {

        $scope.state = 'update';
        $scope.memberToUpdate = student;
    };



};