@lightning @lightning_media @api @errors
Feature: Uploading media assets through the media browser

  @1f81e59b
  Scenario Outline: Uploading a file from within the media browser
    Given I am logged in as a user with the "access media_browser entity browser pages, access media overview, create media" permissions
    When I create media named "<title>" by uploading "<file>"
    Then I should see "<title>" in the media library

    Examples:
      | file     | title       |
      | test.jpg | Foobazzz    |
      | test.mp4 | Foovideo    |
      | test.mp3 | Fooaudio    |
      | test.pdf | A test file |

  # TODO: Convert the rest of the tests to PHPUnit. They are not user stories
  # and should not be tested in a BDD framework.

  @security @627aeb22
  Scenario: Upload widget will not allow the user to create media of bundles they cannot access
    Given I am logged in as a user with the media_creator role
    When I visit "/entity-browser/iframe/media_browser"
    And I upload "test.php"
    Then the "#entity" element should be empty
