var angular = require('angular');
require('angular-bootstrap-npm');

angular.module('app', ['ui.bootstrap'])
        .directive('loader', require('./directives/loader'))
        .directive('professorsList', require('./directives/professorsList'))
        .controller('ModulesController', require('./controllers/ModulesController'));
