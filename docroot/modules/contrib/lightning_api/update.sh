#!/bin/bash

FIXTURE=$TRAVIS_BUILD_DIR/tests/fixtures/$1.php.gz

if [ -e $FIXTURE ]; then
    drush sql:drop --yes
    php core/scripts/db-tools.php import $FIXTURE

    # Forcibly uninstall Lightning Dev, since it is no longer needed, switch the
    # profile from Standard to Minimal, and remove defunct config.
    drush php:eval "Drupal::configFactory()->getEditable('core.extension')->clear('module.lightning_dev')->clear('module.standard')->set('module.minimal', 1000)->set('profile', 'minimal')->save();"
    drush php:eval "Drupal::keyValue('system.schema')->deleteMultiple(['lightning_dev']);"
    drush php:eval "Drupal::configFactory()->getEditable('entity_browser.browser.media_browser')->delete();"
    drush php:eval "Drupal::configFactory()->getEditable('media.type.tweet')->delete();"
fi

drush updatedb --yes
drush update:lightning --no-interaction --yes

# Reinstall from exported configuration to prove that it's coherent.
drush config:export --yes
drush site:install --yes --existing-config

# Big Pipe interferes with non-JavaScript functional tests, so uninstall it now.
drush pm-uninstall big_pipe --yes
