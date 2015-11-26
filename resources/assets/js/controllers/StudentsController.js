module.exports = function($scope, $http, $window) {

    $scope.students = [];

    $scope.state = 'all';

    $scope.alerts = [];

    $scope.newStudent = {
        first_name: '',
        last_name: '',
        email: '',
        major:'',
        semester:''
    };

    function init() {
        $http.get('/students/all').then(function (result) {
            $scope.students = result.data;
        });
    }

    init();

    $scope.addStudent = function() {
        $scope.state = 'add';
    };

    $scope.cancel = function () {
        $scope.state = 'all';
    };

    $scope.submitNewStudent = function() {

        $scope.loading = true;
        $scope.alerts = [];

        $http.post('/students/store', $scope.newStudent)
            .then(function (result) {

                $scope.students.push(result.data);
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

    $scope.delete = function(student) {

        $scope.loading = true;

        $http.delete('/students/delete', {params: {id: student.id}})
            .then(function (result) {
                if (result.status == 200) {
                    $window.location.reload();
                }
            });
    };


    $scope.updateStudent = function (student) {

        $scope.state = 'update';
       $scope.studentToUpdate = student;
    };


    $scope.updateOldStudent = function(student) {
        $scope.loading = true;
        $scope.alerts = [];
        $http.put('/students/update',student)
            .then(function (result) {

                $scope.students.push(result.data);
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
};