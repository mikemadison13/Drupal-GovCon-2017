@lightning @lightning_media @api @javascript @with-module:test_0c61daf8
Feature: Embed code widget's bundle select

  Background:
    Given I am logged in as a user with the "media_creator, media_manager" roles
    When I visit "/entity-browser/iframe/media_browser"
    And I press the "Create embed" button
    And I enter "https://www.youtube.com/watch?v=zQ1_IbFFbzA" for "input"
    And I wait for AJAX to finish
    And I wait 1 second

  @0c61daf8
  Scenario: Embed code widget asks for bundle when ambiguous
    Then I should see a "Bundle" field
    And I should not see a "Name" field

  @31def8f2
  Scenario: Embed code widget switches to inline entity form after selecting bundle
    When I select "Test Video 2" from "Bundle"
    And I wait for AJAX to finish
    And I wait 1 second
    Then I should not see a "Bundle" field
    And I should see a "Name" field

  @59725782
  Scenario: Embed code widget creates entity with correct bundle
    When I select "Test Video 2" from "Bundle"
    And I wait for AJAX to finish
    And I wait 1 second
    And I enter "Foobaz" for "Name"
    And I press the "Place" button
    And I wait for AJAX to finish
    And I wait 1 second
    And I visit "/admin/content/media-table"
    Then I should see "Foobaz"
    And I should see "Test Video 2"
