#!/bin/bash

FIXTURE=$TRAVIS_BUILD_DIR/tests/fixtures/$1.php.gz

if [ -f $FIXTURE ]; then
    drush sql:drop --yes
    php core/scripts/db-tools.php import $FIXTURE

    # Forcibly uninstall Lightning Dev.
    drush php:eval "Drupal::configFactory()->getEditable('core.extension')->clear('module.lightning_dev')->save();"
    drush php:eval "Drupal::keyValue('system.schema')->deleteMultiple(['lightning_dev']);"
    # Remove Lightning Workflow-related settings.
    drush php:eval "entity_load('node_type', 'page')->unsetThirdPartySetting('lightning_workflow', 'workflow')->save();"
    # Ensure menu_ui is installed.
    drush pm-enable menu_ui --yes
fi

drush updatedb --yes
drush update:lightning --no-interaction --yes

# Reinstall from exported configuration to prove that it's coherent.
drush config:export --yes
drush site:install --yes --existing-config

# Big Pipe interferes with non-JavaScript functional tests, so uninstall it now.
drush pm-uninstall big_pipe --yes
