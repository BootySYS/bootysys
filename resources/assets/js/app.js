var angular = require('angular');
require('angular-bootstrap-npm');

(function () {

    angular.module('app', ['ui.bootstrap', 'app.modal'])
        .directive('loader', require('./directives/loader'))
        .directive('professorsList', require('./directives/professorsList'))
        .controller('ModulesController', require('./controllers/ModulesController'))
        .controller('ProfessorsController', require('./controllers/ProfessorsController'));

    angular.module('app.modal', ['ui.bootstrap']).
        controller('ModulesModalController', require('./controllers/ModulesModalController'));

})();

