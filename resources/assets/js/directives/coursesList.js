module.exports = function($http) {
    return {
        restrict: 'E',
        relplace: true,
        scope: {
            module: '=',
            onClick: '&'
        },
        link: function(scope) {
            scope.addCourseActive = false;
            scope.alerts = [];

            scope.course = {};

            scope.addCourse = function() {
                scope.addCourseActive = !scope.addCourseActive;
                scope.alerts = [];
                scope.course = {};
            };

            scope.saveCourse = function() {

                scope.course.module_id = scope.module.id;

                $http.post('/modules/course', scope.course)
                    .then(function (response) {
                        scope.module.courses.push(response.data);
                        scope.course = {};
                        scope.addCourseActive = false;
                    }, function (response) {
                        var alerts = [];

                        angular.forEach(response.data, function(errors, field) {

                            for (var i in errors) {
                                alerts.push(errors[i]);
                            }
                        });

                        scope.alerts.push({
                            type: 'danger',
                            msg: alerts
                        });
                    });
            };

            scope.closeAlert = function(index) {
                scope.alerts.splice(index, 1);
            };

            scope.removeCourse = function (index) {
                $http.delete('/modules/course', {params: {module_id: scope.module.id, course_id: scope.module.courses[index].id}}).then(function (response) {
                    if (response.status == 200) {
                        scope.module.courses.splice(index, 1);
                    }
                });
            };
        },
        template: require('../templates/coursesList.html')
    }
};
