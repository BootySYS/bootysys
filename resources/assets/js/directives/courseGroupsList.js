module.exports = function() {

    return {
        restrict: 'E',
        replace: true,
        scope: {
            courses: '='
        },
        link: function (scope) {

            scope.setActiveCourse = function (course) {
                scope.activeCourse = course;
            };

        },
        template: require('../templates/courseGroupsList.html')
    };

};