var angular = require('angular');

angular.module('app', [])
        .controller('ModulesController', require('./controllers/ModulesController'))
        .controller('ProfessorsController', require('./controllers/ProfessorsController'));
