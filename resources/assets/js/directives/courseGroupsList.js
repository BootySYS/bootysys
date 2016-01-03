module.exports = function($http) {

    return {
        restrict: 'E',
        replace: true,
        scope: {
            courses: '='
        },
        link: function (scope) {

            scope.event = {};
            scope.group = {};

            scope.addGroupActive = false;
            scope.addEventActive = false;

            scope.setActiveCourse = function (course) {
                scope.activeCourse = course;
            };

            scope.addGroup = function() {
                scope.addGroupActive = !scope.addGroupActive;
            };

            scope.saveGroup = function() {
                var request = {};
                request.module_id = scope.activeCourse.module_id;
                request.course_id = scope.activeCourse.id;

                request.group = scope.group;

                $http.post('/modules/course/group', request).then(function(result) {
                    scope.addGroupActive = false;
                }, function (result) {
                    var alerts = [];

                    angular.forEach(result.data, function(errors, field) {

                        for (var i in errors) {
                            alerts.push(errors[i]);
                        }
                    });

                    scope.alerts.push({
                        type: 'danger',
                        msg: alerts
                    });
                })
            };

            scope.addEvent = function(group) {
                scope.addEventActive = !scope.addEventActive;
                scope.activeGroup = group;
            };

            scope.saveEvent = function() {

                var request = {};
                request.group_id = scope.activeGroup.id;

                request.event = scope.event;

                $http.post('/modules/course/group/event', request).then(function(result) {
                    scope.addEventActive = false;
                }, function (result) {
                    var alerts = [];

                    angular.forEach(result.data, function(errors, field) {

                        for (var i in errors) {
                            alerts.push(errors[i]);
                        }
                    });

                    scope.alerts.push({
                        type: 'danger',
                        msg: alerts
                    });
                })

            };

        },
        template: require('../templates/courseGroupsList.html')
    };

};