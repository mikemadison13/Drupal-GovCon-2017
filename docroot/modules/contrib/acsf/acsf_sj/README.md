CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation


INTRODUCTION
------------

This module connects to Acquia Cloud Site Factory's Scheduled Jobs functionality.


REQUIREMENTS
------------

This module works only in an environment on which the Acquia Cloud Site Factory
Scheduled Job tools have been installed.


INSTALLATION
------------

 * Make a request to Acquia for SJ to be installed.
 
 * Enable as you would normally install a contributed Drupal module. See
   https://docs.acquia.com/resource/module-install-d8/ for further information.

Local development
-----------------

The standard 'acsf_sj.client' service will throw fatal errors if the required
SJ binary is not available. For local development where this is not the case,
we provide a reference service. This can be enabled through standard means,
outlined in sites/development.services.yml:

 * Create a development.services.yml file with local services definitions, or
   add to it if you already have one:
   ```
   # Local development services.
   services:
     acsf_sj.client:
       class: Drupal\acsf_sj\Api\SjLocalDevClient
       arguments: ['@request_stack', '@logger.channel.acsf_sj']
   ```
 
 * Create a post-settings-php hook (see 
   https://docs.acquia.com/site-factory/extend/hooks/settings-php/ for further
   information), containing something like the following:
   ```php
   if (!is_acquia_host()) {
     $settings['container_yamls'][] = 'PATH/TO/development.services.yml';
   }
   ```
