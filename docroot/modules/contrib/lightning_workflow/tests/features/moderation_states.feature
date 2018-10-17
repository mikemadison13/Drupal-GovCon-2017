@lightning @lightning_workflow @api
Feature: Workflow moderation states
  As a site administator, I need to be able to manage moderation states for
  content.

  Background:
    Given node_type entities:
      | type        | name        |
      | unmoderated | Unmoderated |

  @c9391f57
  Scenario: Anonymous users should not be able to access content in an unpublished, non-draft state.
    Given page content:
      | title             | promote | moderation_state |
      | Moderation Test 1 | 1       | review           |
    When I go to "/"
    Then I should not see the link "Moderation Test 1"

  @b3ca1fae
  Scenario: Users with permission to transition content between moderation states should be able to see content in an unpublished, non-draft state.
    Given I am logged in as a user with the "access content overview, view any unpublished content" permissions
    And page content:
      | title             | moderation_state |
      | Moderation Test 2 | review           |
    When I visit "/admin/content"
    And I click "Moderation Test 2"
    Then the response status code should be 200

  @03ebc3ee
  Scenario: Publishing an entity by transitioning it to a published state
    Given I am logged in as a user with the "access content overview, view any unpublished content, use editorial transition review, use editorial transition publish, create page content, edit any page content, create url aliases" permissions
    And page content:
      | title             | promote | moderation_state |
      | Moderation Test 3 | 1       | review           |
    When I visit "/admin/content"
    And I click "Moderation Test 3"
    And I visit the edit form
    And I select "Published" from "moderation_state[0][state]"
    And I press "Save"
    And I visit "/user/logout"
    And I visit "/node"
    Then I should see the link "Moderation Test 3"

  @c0c17d43
  Scenario: Transitioning published content to an unpublished state
    Given I am logged in as a user with the "access content overview, use editorial transition publish, use editorial transition archive, create page content, edit any page content, create url aliases" permissions
    And page content:
      | title             | promote | moderation_state |
      | Moderation Test 4 | 1       | published        |
    And I visit "/admin/content"
    And I click "Moderation Test 4"
    And I visit the edit form
    And I select "Archived" from "moderation_state[0][state]"
    And I press "Save"
    And I visit "/user/logout"
    And I go to "/node"
    Then I should not see the link "Moderation Test 4"

  @cead87f0
  Scenario: Filtering content by moderation state
    Given I am logged in as a user with the "access content overview" permission
    And page content:
      | title          | moderation_state |
      | John Cleese    | review           |
      | Terry Gilliam  | review           |
      | Michael Palin  | published        |
      | Graham Chapman | published        |
      | Terry Jones    | draft            |
      | Eric Idle      | review           |
    When I visit "/admin/content"
    And I select "In review" from "moderation_state"
    And I apply the exposed filters
    Then I should see "John Cleese"
    And I should see "Terry Gilliam"
    And I should not see "Michael Palin"
    And I should not see "Graham Chapman"
    And I should not see "Terry Jones"
    And I should see "Eric Idle"

  @6a1db3b1
  Scenario: Examining the moderation history of a piece of content
    Given I am logged in as a user with the administrator role
    And page content:
      | title           | moderation_state |
      | Samuel L. Ipsum | draft            |
    When I visit "/admin/content"
    And I click "Samuel L. Ipsum"
    And I visit the edit form
    And I select "In review" from "moderation_state[0][state]"
    And I press "Save"
    And I visit the edit form
    And I select "Published" from "moderation_state[0][state]"
    And I press "Save"
    And I click "History"
    Then I should see "Set to draft"
    And I should see "Set to review"
    And I should see "Set to published"

  @javascript @763fbb2c
  Scenario: Quick edit a forward revision
    Given I am logged in as a user with the administrator role
    And page content:
      | title | moderation_state | path   |
      | Squid | published        | /squid |
    When I visit "/squid"
    And I visit the edit form
    And I select "Draft" from "moderation_state[0][state]"
    And I press "Save"
    And I wait 2 seconds
    Then I should see a "system_main_block" block with Quick Edit

  @35d54919
  Scenario: Unmoderated content types are visible in the Content view
    Given unmoderated content:
      | title       |
      | Lazy Lummox |
    And I am logged in as a user with the administrator role
    When I visit "admin/content"
    And I select "- Any -" from "moderation_state"
    And I apply the exposed filters
    Then I should see the link "Lazy Lummox"

  @7cef449b
  Scenario: Unmoderated content types have the "Create new revision" Checkbox
    Given I am logged in as a user with the administrator role
    And unmoderated content:
      | title      |
      | Deft Zebra |
    When I visit "/admin/content"
    And I click "Deft Zebra"
    And I visit the edit form
    Then I should see a "Create new revision" field

  @d364fb3a
  Scenario: Removing access to workflow actions that do not make sense with moderated content
    Given I am logged in as a user with the administrator role
    And page content:
      | title | moderation_state |
      | Foo   | draft            |
      | Bar   | draft            |
      | Baz   | draft            |
    When I visit "/admin/content"
    And I select "Draft" from "moderation_state"
    And I apply the exposed filters
    Then the "Action" field should not have a "node_publish_action" option
    And the "Action" field should not have a "node_unpublish_action" option

  @22c6b9df
  Scenario: Edit forms should load the latest revision
    Given I am logged in as a user with the "create page content, edit own page content, view latest version, view own unpublished content, use editorial transition create_new_draft, use editorial transition publish" permissions
    When I visit "/node/add/page"
    And I enter "Smells Like Teen Spirit" for "Title"
    And I select "Published" from "moderation_state[0][state]"
    And I press "Save"
    And I visit the edit form
    And I enter "Polly" for "Title"
    And I select "Draft" from "moderation_state[0][state]"
    And I press "Save"
    And I visit the edit form
    Then the "Title" field should contain "Polly"
