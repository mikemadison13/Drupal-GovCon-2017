@lightning @lightning_media @api
Feature: Creating media assets from within the media browser using embed codes

  @2c43f38c
  Scenario Outline: Creating media assets from within the media browser using embed codes
    Given I am logged in as a user with the "access media_browser entity browser pages, access media overview, create media" permissions
    When I create media named "<title>" using the embed code "<embed_code>"
    Then I should see "<title>" in the media library

    Examples:
      | embed_code                                             | title                     |
      | https://www.youtube.com/watch?v=zQ1_IbFFbzA            | The Pill Scene            |
      | https://vimeo.com/25585320                             | Drupal 8 HTML5 Initiative |
      | https://twitter.com/webchick/status/672110599497617408 | angie speaks              |
      | https://www.instagram.com/p/jAH6MNINJG                 | Drupal Does LSD           |
