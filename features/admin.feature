Feature: Admin login
  In order to access the admin interface
  As a user
  I need to be able to log in to the website

  @done
  Scenario: Enter the admin with no credentials
    Given I am on "/admin"
    Then I should be on "/login"

  @done
  Scenario: Login with correct credentials
    Given I am on "/login"
    When I fill in the following:
      | urbangarden_user_form_type_login__username    | lorem@ipsum.com |
      | urbangarden_user_form_type_login__password | 123456            |
    When I press "urbangarden_user_form_type_login_send"
    Then I should be on "/"

  @done
  Scenario: As a logged user I can see administration page
    Given I am logged as "lorem@ipsum.com" - "123456"
    Then I am on "/admin"
    Then I should see "Page Header"