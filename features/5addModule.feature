Feature: Add a Module
  In order to insert new modules, we need to create modules (As an alternative you could use the File importer to import professors)
  As a website user in the role of an university
  I need to be able to create a module

  @javascript
  Scenario: Create module
    Given I am on "http://bootysys.app"
    When I follow "Log in"
    And I fill in "email" with "max.mustermann@haw-hamburg.de"
    And I fill in "password" with "123456"
    And I check "remember"
    And I press "Log in"
    And I should see "Dashboard"
    And I follow "Modules"
    And I should see "Add module"
    And I click on the element with id "addModule"
    And I should see "Short Name"
    And I fill in "name" with "Moding"
    And I fill in "short_name" with "Mo"
    And I fill in "description" with "Learn the essentials of Moding"
    And I click on the element with id "professor-0"
    And I click on the element with id "save"