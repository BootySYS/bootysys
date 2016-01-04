Feature: Update details of a student
  In order to edit the students, we need to have the possibility to change the saved data of a student
  As a website user in the role of an university
  I need to be able to edit a student

  @javascript
  Scenario: Update student
    Given I am on "http://bootysys.app"
    When I follow "Log in"
    And I fill in "email" with "max.mustermann@haw-hamburg.de"
    And I fill in "password" with "123456"
    And I check "remember"
    And I press "Log in"
    And I should see "Dashboard"
    And I follow "Students"
    And I click on the element with id "update-0"
    And I fill in "emailUpdate" with "uwe.schuhweg@haw-hamburg.de"
    And I click on the element with id "saveUpdate"
    Then the "table" element should contain "uwe.schuhweg@haw-hamburg.de"