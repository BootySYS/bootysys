module.exports = function() {

    return {
        restrict: 'E',
        replace: true,
        scope: {
            courses: '='
        },
        link: function (scope) {

        },
        template: require('../templates/courseGroupsList.html')
    };

};