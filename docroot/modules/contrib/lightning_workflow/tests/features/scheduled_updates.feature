@api @lightning_workflow @javascript
Feature: Scheduled updates to content

  @0e5b60fd @with-module:test_unmoderated_content_type
  Scenario: Scheduling a moderation state change on an unmoderated content type
    Given I am logged in as a user with the administrator role
    And unmoderated content:
      | title     | path       |
      | Jucketron | /jucketron |
    When I visit "/jucketron"
    And I visit the edit form
    Then I should not see the link "Schedule a transition"
