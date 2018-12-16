@lightning @lightning_media @api @javascript @with-module:test_aab7f955
Feature: Upload widget's bundle select

  Background:
    Given I am logged in as a user with the "media_creator, media_manager" roles
    When I visit "/node/add/page"
    And I open the media browser
    And I upload "test.jpg"

  @aab7f955
  Scenario: Upload widget asks for bundle when ambiguous
    Then I should see a "Bundle" field
    And I should not see a "Name" field

  @ba082b0d
  Scenario: Upload widget switches to inline entity form after selecting bundle
    When I select "Test Image 2" from "Bundle"
    And I wait for AJAX to finish
    And I wait 1 second
    Then I should not see a "Bundle" field
    And I should see a "Name" field

  @acd5f0df
  Scenario: Upload widget creates entity with correct bundle
    When I select "Test Image 2" from "Bundle"
    And I wait for AJAX to finish
    And I wait 1 second
    And I enter "Foobar" for "Name"
    And I press the "Place" button
    And I wait for AJAX to finish
    And I wait 1 second
    And I visit "/admin/content/media-table"
    Then I should see "Foobar"
    And I should see "Test Image 2"
