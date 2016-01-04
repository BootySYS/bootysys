Feature: Delete a professor
  In order to edit the professors, we need to have the possibility to delete professors for different reasons
  As a website user in the role of an university
  I need to be able to delete a professor

  @javascript
  Scenario: Delete professor
    Given I am on "http://bootysys.app"
    When I follow "Log in"
    And I fill in "email" with "max.mustermann@haw-hamburg.de"
    And I fill in "password" with "123456"
    And I check "remember"
    And I press "Log in"
    And I should see "Dashboard"
    And I follow "Professors"
    And I click on the element with id "delete-0"

