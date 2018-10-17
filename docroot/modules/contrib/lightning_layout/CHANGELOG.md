## 1.4.0
* Patched Panelizer to support translations. (#40)
* The Landing Page content type now includes out-of-the-box support for
  Pathauto. (#37)
* Fixed a bug which could cause Behat test failures due to a conflict with
  Content Moderation. (Issue #2989369)

## 1.3.0
* Allow Lightning Core 3.x and Drupal core 8.6.x.
* Updated logic to check for the null value in PanelizerWidget (Issue #2966924)
* Lightning Landing Page now checks for the presence of Lightning Workflow, not
  Content Moderation when opting into moderation. (Issue #2984739)

## 1.2.0
* Updated to Panelizer 4.1 and Panels 4.3.

## 1.1.0
* Entity Blocks was updated to its latest stable release and is no longer
  patched by Lightning Layout.
* Behat contexts bundled with Lightning Layout were moved into the
  `Acquia\LightningExtension\Context` namespace.

## 1.0.0
* No changes since last release.

## 1.0.0-rc1
* Fixed a configuration problem that caused an unneeded dependency on the
  Lightning profile. (Issue #2933445)
 
