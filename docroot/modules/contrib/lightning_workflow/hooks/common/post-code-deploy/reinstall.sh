#!/bin/sh
#
# Cloud Hook: Reinstall Minimal with Lightning Workflow

site="$1"
target_env="$2"

drush @$site.$target_env site-install minimal --account-pass=admin --yes
drush @$site.$target_env pm-enable lightning_workflow lightning_scheduler lightning_dev --yes
