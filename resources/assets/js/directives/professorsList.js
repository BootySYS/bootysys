module.exports = function() {
    return {
        restrict: 'E',
        replace: true,
        scope: {
            professors: '=',
            onSelect: '&',
            deSelect: '&'
        },
        link: function(scope) {
            scope.selectedProfessorIds = [];

            scope.handleSelection = function(professor) {
                if (!scope.selected(professor)) {
                    scope.onSelect({professor: professor});
                    scope.selectedProfessorIds.push(professor.id);
                } else {
                    scope.selectedProfessorIds.splice(scope.selectedProfessorIds.indexOf(professor.id), 1);
                    scope.deSelect({professor: professor});
                }
            };

            scope.selected = function (professor) {
                return scope.selectedProfessorIds.indexOf(professor.id) >= 0;
            }
        },
        template: require('../templates/professorsList.html')
    }
};