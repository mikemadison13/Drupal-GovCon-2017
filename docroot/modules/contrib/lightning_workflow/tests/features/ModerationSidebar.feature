@lightning @lightning_workflow
Feature: A sidebar for moderating content

  @1d83813d @javascript @api
  Scenario: Moderating content using the sidebar
    Given I am logged in as a page_reviewer
    When I am viewing a page in the Draft state
    Then I should be able to transition to the Published state without leaving the page
