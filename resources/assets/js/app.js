var angular = require('angular');
require('angular-bootstrap-npm');

(function () {

    angular.module('app', ['ui.bootstrap', 'app.modals', 'app.directives', 'app.services'])
        .controller('ModulesController', require('./controllers/ModulesController'))
        .controller('ProfessorsController', require('./controllers/ProfessorsController'));

    angular.module('app.directives', [])
        .directive('loader', require('./directives/loader'))
        .directive('professorsList', require('./directives/professorsList'))
        .directive('coursesList', require('./directives/coursesList'))
        .directive('courseGroupsList', require('./directives/courseGroupsList'));

    angular.module('app.modals', [])
        .controller('ModulesModalController', require('./controllers/ModulesModalController'));

    angular.module('app.services', [])
        .service('moduleService', require('./services/moduleService'));

})();
