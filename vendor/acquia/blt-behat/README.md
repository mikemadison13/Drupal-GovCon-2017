Acquia BLT Behat
====

This is an [Acquia BLT](https://github.com/acquia/blt) plugin providing integration with the Behat test framework.

This plugin provides a set of commands in the `tests` namespace that use these frameworks to run automated tests on your Drupal site.

This plugin is **community-supported**. Acquia does not provide any direct support for this software or provide any warranty as to its stability.

This plugin is provided solely as a backwards-compatible shim for customers upgrading from BLT 11. We recommend that anyone implementing new tests on a Drupal project use PHPUnit instead of Behat. PHPUnit now even supports Gherkin syntax if you prefer to preserve your human-readable Gherkin features: https://medium.com/@jonathanjfshaw/write-better-tests-by-using-behat-with-phpunit-ddb08d449b73

## Installation and usage

To use this plugin, you must already have a Drupal project using BLT 12 or higher.

In your project, require the plugin with Composer:

`composer require acquia/blt-behat`

# License

Copyright (C) 2020 Acquia, Inc.

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License version 2 as published by the Free Software Foundation.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
