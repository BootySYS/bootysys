Feature: Add a professor
  In order to assign professors to modules, we need to create professors (As an alternative you could use the File importer to import professors)
  As a website user in the role of an university
  I need to be able to add a professor

  @javascript
  Scenario: Add professor
    Given I am on "http://bootysys.app"
    When I follow "Log in"
    And I fill in "email" with "max.mustermann@haw-hamburg.de"
    And I fill in "password" with "123456"
    And I check "remember"
    And I press "Log in"
    And I should see "Dashboard"
    And I follow "Professors"
    And I should see "Add professor"
    And I click on the element with id "addProfessor"
    And I should see "First Name"
    And I fill in "first_name" with "Renate"
    And I fill in "last_name" with "Granate"
    And I fill in "email" with "renate.granate@haw-hamburg.de"
    And I click on the element with id "save"
    And the "table" element should contain "Renate"
    And the "table" element should contain "Granate"
    And the "table" element should contain "renate.granate@haw-hamburg.de"

