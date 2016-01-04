Feature: Log in
  In order to use Pazzam
  As a website user in the role of an university
  I need to be able to log in to the service

  @javascript
  Scenario: Log in to Pazzam
    Given I am on "http://bootysys.app"
    When I follow "Log in"
    And I fill in "email" with "max.mustermann@haw-hamburg.de"
    And I fill in "password" with "123456"
    And I check "remember"
    And I press "Log in"
    And I follow "Log out"
    Then I should see "Manage your students"

