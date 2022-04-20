# Acquia BLT Drupal Check integration

This is an [Acquia BLT](https://github.com/acquia/blt) plugin providing [Drupal Check](https://github.com/mglaman/drupal-check) integration.

This plugin is **community-created** and **community-supported**. Acquia does not provide any direct support for this software or provide any warranty as to its stability.

BLT itself used to provide this, but it was removed in 2020 here: https://github.com/acquia/blt/pull/4254.

This plugin replaces the basic functionality in the blt:validate namespace.

## Installation and usage

To use this plugin, you must already have a Drupal project using BLT 13 (or higher).

1. Add this plugin to your project using composer:

Add the following to the repositories section of your composer.json (as this plugin is not yet on packagist).
```json
"repositories": {
  "blt-drupal-check": {
    "type": "vcs",
    "url": "https://github.com/mikemadison13/blt-drupal-check.git",
    "no-api": true
  }
}
```

Add the plugin to your composer with the following command:

`composer require  mikemadison13/blt-drupal-check`

2. Run all commands automatically with the `blt validate` command or individual commands manually with:

```shell
blt deprecated:modules
blt deprecated:themes
blt deprecated:profiles
```
