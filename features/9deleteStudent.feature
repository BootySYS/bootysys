Feature: Delete a student
  In order to edit the students, we need to have the possibility to delete students for different reasons
  As a website user in the role of an university
  I need to be able to delete a student

  @javascript
  Scenario: Delete student
    Given I am on "http://bootysys.app"
    When I follow "Log in"
    And I fill in "email" with "max.mustermann@haw-hamburg.de"
    And I fill in "password" with "123456"
    And I check "remember"
    And I press "Log in"
    And I should see "Dashboard"
    And I follow "Students"
    And I click on the element with id "delete-0"

