Feature: Sign up
  In order to use Pazzam
  As a website user in the role of an university
  I need to be able to sign up to the service

  @javascript
  Scenario: Sign up for Pazzam
    Given I am on "http://bootysys.app"
    When I follow "Sign up"
    And I fill in "name" with "HAW"
    And I fill in "contact_first_name" with "Max"
    And I fill in "contact_last_name" with "Mustermann"
    And I fill in "email" with "maximanus.mustermann@haw-hamburg.de"
    And I fill in "state" with "Deutschland"
    And I fill in "city" with "Hamburg"
    And I fill in "zip_code" with "20097"
    And I fill in "street" with "Berliner Tor 7"
    And I fill in "password" with "123456"
    And I fill in "confirm_password" with "123456"
    And I press "Register"
    Then I should see "Max Mustermann"

