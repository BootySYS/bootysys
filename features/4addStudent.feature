Feature: Add a student
  In order to create student teams, we need to create student (As an alternative you could use the File importer to import students)
  As a website user in the role of an university
  I need to be able to add a student

  @javascript
  Scenario: Add student
    Given I am on "http://bootysys.app"
    When I follow "Log in"
    And I fill in "email" with "max.mustermann@haw-hamburg.de"
    And I fill in "password" with "123456"
    And I check "remember"
    And I press "Log in"
    And I should see "Dashboard"
    And I follow "Students"
    And I should see "Add student"
    And I click on the element with id "addStudent"
    And I should see "First Name"
    And I fill in "first_name" with "Uwe"
    And I fill in "last_name" with "Schuhwe"
    And I fill in "email" with "uwe.schuhwe@haw-hamburg.de"
    And I fill in "major" with "Computer Science"
    And I fill in "semester" with "1"
    And I click on the element with id "save"
    And the "table" element should contain "Uwe"
    And the "table" element should contain "Schuhwe"
    And the "table" element should contain "uwe.schuhwe@haw-hamburg.de"
    And the "table" element should contain "1"
    And the "table" element should contain "Computer Science"
    And the "table" element should not contain "Schmingo"


