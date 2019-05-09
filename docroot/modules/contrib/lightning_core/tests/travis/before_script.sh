#!/usr/bin/env bash

# NAME
#     before_script.sh - Run ORCA tests
#
# SYNOPSIS
#     before_script.sh
#
# DESCRIPTION
#     Imports the database fixture for upgrade tests.

cd "$(dirname "$0")"; source _includes.sh

# Exit early if no DB fixture is specified.
[[ "$DB_FIXTURE" ]] || exit 0

cd "$ORCA_FIXTURE_DIR/docroot"

DB="$TRAVIS_BUILD_DIR/tests/fixtures/$DB_FIXTURE.php.gz"

php core/scripts/db-tools.php import ${DB}

drush php:script "$TRAVIS_BUILD_DIR/tests/update.php"

# Ensure menu_ui is installed.
drush pm-enable menu_ui --yes

drush updatedb --yes
drush update:lightning --no-interaction --yes

# Reinstall modules which were blown away by the database restore.
orca fixture:enable-modules

# Reinstall from exported configuration to prove that it's coherent.
drush config:export --yes
drush site:install --yes --existing-config

# Big Pipe interferes with non-JavaScript functional tests, so uninstall it now.
drush pm-uninstall big_pipe --yes

# Set the fixture state to reset to between tests.
orca fixture:backup -f
