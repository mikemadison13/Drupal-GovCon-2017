@lightning @lightning_workflow @api
Feature: Moderation Dashboard

  @ea966cba
  Scenario: Administrators can use the dashboard
    Given I am logged in as a user with the administrator role
    When I click "Moderation Dashboard"
    Then I should see a dashboard for moderating content
