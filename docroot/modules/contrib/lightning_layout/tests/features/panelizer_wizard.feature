@lightning @lightning_layout @api
Feature: Panelizer wizard

  @javascript @7917f3ad
  Scenario: Switch between defined layouts.
    Given I am logged in as a user with the "landing_page_creator, layout_manager" roles
    And I visit "/admin/structure/panelizer/edit/node__landing_page__full__two_column/content"
    And I place the "Authored by" block into the first panelizer region
    And I press "Update and save"
    And landing_page content:
      | title  | path    |
      | Foobar | /foobar |
    When I visit "/foobar"
    And I visit the edit form
    And I select "Two Column" from "Full content"
    And press "Save"
    Then I should see "Authored by"
    And I visit the edit form
    And I select "Single Column" from "Full content"
    And press "Save"
    And I should not see "Authored by"
    And I visit "/admin/structure/panelizer/edit/node__landing_page__full__two_column/content"
    And I remove the "Authored by" block from the first panelizer region
