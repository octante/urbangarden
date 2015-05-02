Feature: User register
  In order to register in the website
  As a user
  I need to be able to register in the website

  @done
  Scenario: Show register form
    Given I am on "/signup"
    Then the response should contain "urbangarden_user_form_type_register"

  @done
  Scenario: Register a user
    Given I am on "/signup"
    When I fill in the following:
      | urbangarden_user_form_type_register_email    | lorem-ipsum@ipsum.com |
      | urbangarden_user_form_type_register_password | 123456            |
    When I press "urbangarden_user_form_type_register_send"
    Then I should see "tot ok"