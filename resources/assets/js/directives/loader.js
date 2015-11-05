module.exports = ['$http' ,function ($http) {
    return {
        restrict: 'E',
        template: require('../templates/loader.html'),
        replace: true,
        link: function (scope, elm, attrs)
        {

        }
    };
}];