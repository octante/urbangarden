Feature: admin
  In order to access the admin interface
  As a user
  I need to be able to log in to the website

  Scenario: Enter the admin with no credentials
    Given I am on "/admin"
    Then I should be on "/login"