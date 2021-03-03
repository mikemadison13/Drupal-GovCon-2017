<?php

/*
 * This file is part of Composer.
 *
 * (c) Nils Adermann <naderman@naderman.de>
 *     Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;

/**
 * This class is copied in every Composer installed project and available to all
 *
 * To require it's presence, you can require `composer-runtime-api ^2.0`
 */
class InstalledVersions
{
    private static $installed = array (
  'root' => 
  array (
    'pretty_version' => '1.0.0+no-version-set',
    'version' => '1.0.0.0',
    'aliases' => 
    array (
    ),
    'reference' => NULL,
    'name' => 'acquia/blt-project',
  ),
  'versions' => 
  array (
    'acquia/blt' => 
    array (
      'pretty_version' => '12.7.0',
      'version' => '12.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ce857cf07a25f7e638b9cde5bf7adc42085eb40b',
    ),
    'acquia/blt-behat' => 
    array (
      'pretty_version' => 'v1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8d9f7cddb19f9ffb2c09d5692ede1582b871e0c7',
    ),
    'acquia/blt-phpcs' => 
    array (
      'pretty_version' => 'v1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '221f4d9719836620563b291d57f7e39458a4ef1e',
    ),
    'acquia/blt-project' => 
    array (
      'pretty_version' => '1.0.0+no-version-set',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'acquia/coding-standards' => 
    array (
      'pretty_version' => 'v0.5.1',
      'version' => '0.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e12b3e73af64c53ac1883c53a88e1194dc220743',
    ),
    'acquia/drupal-environment-detector' => 
    array (
      'pretty_version' => 'v1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '75a6038aec028c8f2c0136e1e291d6305b94f64e',
    ),
    'acquia/lightning' => 
    array (
      'pretty_version' => '5.1.2',
      'version' => '5.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '974bf7084d83ffac46a819b0047637e94c4ce146',
    ),
    'acquia/memcache-settings' => 
    array (
      'pretty_version' => 'v1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a45c708cb88a57324f9c7a2259ebc61aa8438fc7',
    ),
    'ajgl/breakpoint-twig-extension' => 
    array (
      'pretty_version' => '0.3.5',
      'version' => '0.3.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '9875feea0ac4bc3c9f308c62bae4727669d6052a',
    ),
    'asm89/stack-cors' => 
    array (
      'pretty_version' => '1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b9c31def6a83f84b4d4a40d35996d375755f0e08',
    ),
    'behat/behat' => 
    array (
      'pretty_version' => 'v3.8.1',
      'version' => '3.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fbb065457d523d9856d4b50775b4151a7598b510',
    ),
    'behat/gherkin' => 
    array (
      'pretty_version' => 'v4.8.0',
      'version' => '4.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2391482cd003dfdc36b679b27e9f5326bd656acd',
    ),
    'behat/mink' => 
    array (
      'pretty_version' => 'v1.8.1',
      'version' => '1.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '07c6a9fe3fa98c2de074b25d9ed26c22904e3887',
    ),
    'behat/mink-browserkit-driver' => 
    array (
      'pretty_version' => 'v1.3.4',
      'version' => '1.3.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e3b90840022ebcd544c7b394a3c9597ae242cbee',
    ),
    'behat/mink-extension' => 
    array (
      'pretty_version' => '2.3.1',
      'version' => '2.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '80f7849ba53867181b7e412df9210e12fba50177',
    ),
    'behat/mink-goutte-driver' => 
    array (
      'pretty_version' => 'v1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8b9ad6d2d95bc70b840d15323365f52fcdaea6ca',
    ),
    'behat/mink-selenium2-driver' => 
    array (
      'pretty_version' => 'v1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '312a967dd527f28980cce40850339cd5316da092',
    ),
    'behat/transliterator' => 
    array (
      'pretty_version' => 'v1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3c4ec1d77c3d05caa1f0bf8fb3aae4845005c7fc',
    ),
    'bex/behat-extension-driver-locator' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd97d2413eb015f57746786d13d10cd932c55dd58',
    ),
    'bex/behat-screenshot' => 
    array (
      'pretty_version' => '2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c2d3d901f8a096961e6e526cda561ad62bbb2f3d',
    ),
    'bower-asset/blazy' => 
    array (
      'pretty_version' => '1.8.2',
      'version' => '1.8.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '5becad405976695e6016ba301be4f22ba61d5b95',
    ),
    'bower-asset/cropper' => 
    array (
      'pretty_version' => 'v2.3.4',
      'version' => '2.3.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '30c58b29ee21010e17e58ebab165fbd84285c685',
    ),
    'bower-asset/jquery' => 
    array (
      'pretty_version' => '3.5.1',
      'version' => '3.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4c0e4becb8263bb5b3e6dadc448d8e7305ef8215',
    ),
    'bower-asset/slick-carousel' => 
    array (
      'pretty_version' => 'v1.8.1',
      'version' => '1.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f40c9d6a02a5c08b5f4dd80fdada3a854a59bee',
    ),
    'caxy/php-htmldiff' => 
    array (
      'pretty_version' => 'v0.1.11',
      'version' => '0.1.11.0',
      'aliases' => 
      array (
      ),
      'reference' => '6bc1c4ad59587027b09bf50c0e086b0f45d86c86',
    ),
    'chi-teck/drupal-code-generator' => 
    array (
      'pretty_version' => '1.33.1',
      'version' => '1.33.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5f814e980b6f9cf1ca8c74cc9385c3d81090d388',
    ),
    'composer/ca-bundle' => 
    array (
      'pretty_version' => '1.2.9',
      'version' => '1.2.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '78a0e288fdcebf92aa2318a8d3656168da6ac1a5',
    ),
    'composer/composer' => 
    array (
      'pretty_version' => '2.0.9',
      'version' => '2.0.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '591c2c155cac0d2d7f34af41d3b1e29bcbfc685e',
    ),
    'composer/installers' => 
    array (
      'pretty_version' => 'v1.10.0',
      'version' => '1.10.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1a0357fccad9d1cc1ea0c9a05b8847fbccccb78d',
    ),
    'composer/semver' => 
    array (
      'pretty_version' => '3.2.4',
      'version' => '3.2.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a02fdf930a3c1c3ed3a49b5f63859c0c20e10464',
    ),
    'composer/spdx-licenses' => 
    array (
      'pretty_version' => '1.5.5',
      'version' => '1.5.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'de30328a7af8680efdc03e396aad24befd513200',
    ),
    'composer/xdebug-handler' => 
    array (
      'pretty_version' => '1.4.5',
      'version' => '1.4.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f28d44c286812c714741478d968104c5e604a1d4',
    ),
    'consolidation/annotated-command' => 
    array (
      'pretty_version' => '4.2.4',
      'version' => '4.2.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ec297e05cb86557671c2d6cbb1bebba6c7ae2c60',
    ),
    'consolidation/comments' => 
    array (
      'pretty_version' => '1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '908832ce3c8174a9414d741913543fd058aac5fb',
    ),
    'consolidation/config' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cac1279bae7efb5c7fb2ca4c3ba4b8eb741a96c1',
    ),
    'consolidation/filter-via-dot-access-data' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a53e96c6b9f7f042f5e085bf911f3493cea823c6',
    ),
    'consolidation/log' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '82a2aaaa621a7b976e50a745a8d249d5085ee2b1',
    ),
    'consolidation/output-formatters' => 
    array (
      'pretty_version' => '4.1.2',
      'version' => '4.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '5821e6ae076bf690058a4de6c94dce97398a69c9',
    ),
    'consolidation/robo' => 
    array (
      'pretty_version' => '2.2.2',
      'version' => '2.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b365df174d9cfb0f5814e4f3275a1c558b17bc4c',
    ),
    'consolidation/self-update' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dba6b2c0708f20fa3ba8008a2353b637578849b4',
    ),
    'consolidation/site-alias' => 
    array (
      'pretty_version' => '3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fd40a03f80f8fd4684b10bef8c8c4ec5a9a9bf26',
    ),
    'consolidation/site-process' => 
    array (
      'pretty_version' => '4.0.0',
      'version' => '4.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ad86475eb3fe73490eb1b6ff2e74ee0f09952e9d',
    ),
    'container-interop/container-interop' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '79cbf1341c22ec75643d841642dd5d6acd83bdb8',
    ),
    'container-interop/container-interop-implementation' => 
    array (
      'provided' => 
      array (
        0 => '^1.2',
      ),
    ),
    'cweagans/composer-patches' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ae02121445ad75f4eaff800cc532b5e6233e2ddf',
    ),
    'd8-contrib-modules/cloudflarephpsdk' => 
    array (
      'pretty_version' => '1.0.0-alpha5',
      'version' => '1.0.0.0-alpha5',
      'aliases' => 
      array (
      ),
      'reference' => '4bd00bacdb3aa56e88cbd871c3db7925eb0a9e66',
    ),
    'dealerdirect/phpcodesniffer-composer-installer' => 
    array (
      'pretty_version' => 'v0.7.1',
      'version' => '0.7.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fe390591e0241955f22eb9ba327d137e501c771c',
    ),
    'defuse/php-encryption' => 
    array (
      'pretty_version' => 'v2.2.1',
      'version' => '2.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f407c43b953d571421e0020ba92082ed5fb7620',
    ),
    'dflydev/dot-access-data' => 
    array (
      'pretty_version' => 'v1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3fbd874921ab2c041e899d044585a2ab9795df8a',
    ),
    'dmore/behat-chrome-extension' => 
    array (
      'pretty_version' => '1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6279986ef85ac179f055460502e9b11c3784146c',
    ),
    'dmore/chrome-mink-driver' => 
    array (
      'pretty_version' => '2.7.0',
      'version' => '2.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd66765fb7f448e8b2bca2b899308a4a6d8a69264',
    ),
    'dnoegel/php-xdg-base-dir' => 
    array (
      'pretty_version' => 'v0.1.1',
      'version' => '0.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8f8a6e48c5ecb0f991c2fdcf5f154a47d85f9ffd',
    ),
    'doctrine/annotations' => 
    array (
      'pretty_version' => '1.12.1',
      'version' => '1.12.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b17c5014ef81d212ac539f07a1001832df1b6d3b',
    ),
    'doctrine/cache' => 
    array (
      'pretty_version' => '1.10.2',
      'version' => '1.10.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '13e3381b25847283a91948d04640543941309727',
    ),
    'doctrine/collections' => 
    array (
      'pretty_version' => '1.6.7',
      'version' => '1.6.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '55f8b799269a1a472457bd1a41b4f379d4cfba4a',
    ),
    'doctrine/common' => 
    array (
      'pretty_version' => '2.13.3',
      'version' => '2.13.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f3812c026e557892c34ef37f6ab808a6b567da7f',
    ),
    'doctrine/event-manager' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '41370af6a30faa9dc0368c4a6814d596e81aba7f',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => '1.4.3',
      'version' => '1.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '4650c8b30c753a76bf44fb2ed00117d6f367490c',
    ),
    'doctrine/lexer' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e864bbf5904cb8f5bb334f99209b48018522f042',
    ),
    'doctrine/persistence' => 
    array (
      'pretty_version' => '1.3.8',
      'version' => '1.3.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '7a6eac9fb6f61bba91328f15aa7547f4806ca288',
    ),
    'doctrine/reflection' => 
    array (
      'pretty_version' => '1.2.2',
      'version' => '1.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fa587178be682efe90d005e3a322590d6ebb59a5',
    ),
    'drupal/acquia_connector' => 
    array (
      'pretty_version' => '2.0.0-rc3',
      'version' => '2.0.0.0-RC3',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.0-rc3',
    ),
    'drupal/acquia_purge' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/acquia_telemetry-acquia_telemetry' => 
    array (
      'pretty_version' => '1.0.0-alpha5',
      'version' => '1.0.0.0-alpha5',
      'aliases' => 
      array (
      ),
      'reference' => '1.0.0-alpha5',
    ),
    'drupal/action' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/admin_toolbar' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3.0.0',
    ),
    'drupal/adminimal_admin_toolbar' => 
    array (
      'pretty_version' => '1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.11',
    ),
    'drupal/aggregator' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/automated_cron' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/autosave_form' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.2',
    ),
    'drupal/ban' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/bartik' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/basic_auth' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/better_exposed_filters' => 
    array (
      'pretty_version' => '5.0.0-beta1',
      'version' => '5.0.0.0-beta1',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-5.0-beta1',
    ),
    'drupal/bg_image_formatter' => 
    array (
      'pretty_version' => '1.14.0',
      'version' => '1.14.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.14',
    ),
    'drupal/big_pipe' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/blazy' => 
    array (
      'pretty_version' => '2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.1',
    ),
    'drupal/block' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/block_content' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/block_exclude_pages' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2.0.0',
    ),
    'drupal/book' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/breakpoint' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/captcha' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/ckeditor' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/claro' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/classy' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/cloudflare' => 
    array (
      'pretty_version' => '1.0.0-beta2',
      'version' => '1.0.0.0-beta2',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-beta2',
    ),
    'drupal/coder' => 
    array (
      'pretty_version' => '8.3.12',
      'version' => '8.3.12.0',
      'aliases' => 
      array (
      ),
      'reference' => '719ddb16aec2e5da4ce274bf3bf8450caef564d4',
    ),
    'drupal/cog' => 
    array (
      'pretty_version' => '1.15.0',
      'version' => '1.15.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.15',
    ),
    'drupal/color' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/comment' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/components' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.2',
    ),
    'drupal/config' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/config_filter' => 
    array (
      'pretty_version' => '1.8.0',
      'version' => '1.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.8',
    ),
    'drupal/config_ignore' => 
    array (
      'pretty_version' => 'dev-2.x',
      'version' => 'dev-2.x',
      'aliases' => 
      array (
        0 => '2.x-dev',
      ),
      'reference' => '351164d9f1f6751006ef9bb691fb4b5fbd0812af',
    ),
    'drupal/config_split' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.7',
    ),
    'drupal/config_translation' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/conflict' => 
    array (
      'pretty_version' => '2.0.0-alpha2',
      'version' => '2.0.0.0-alpha2',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.0-alpha2',
    ),
    'drupal/consumers' => 
    array (
      'pretty_version' => '1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.11',
    ),
    'drupal/contact' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/contact_storage' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/content_moderation' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/content_translation' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/contextual' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core' => 
    array (
      'pretty_version' => '9.1.4',
      'version' => '9.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd16a7cb33b7a01e3b2e66d36e2011f27ba9786f4',
    ),
    'drupal/core-annotation' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-assertion' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-bridge' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-class-finder' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-datetime' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-dependency-injection' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-diff' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-discovery' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-event-dispatcher' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-file-cache' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-file-security' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-filesystem' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-front-matter' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-gettext' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-graph' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-http-foundation' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-php-storage' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-plugin' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-proxy-builder' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-render' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-serialization' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-transliteration' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-utility' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-uuid' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core-version' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/core_context' => 
    array (
      'pretty_version' => '1.0.0-beta4',
      'version' => '1.0.0.0-beta4',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-beta4',
    ),
    'drupal/crop' => 
    array (
      'pretty_version' => '2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.1',
    ),
    'drupal/ctools' => 
    array (
      'pretty_version' => '3.4.0',
      'version' => '3.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.4',
    ),
    'drupal/ctools_block' => 
    array (
      'pretty_version' => '3.4.0',
      'version' => '3.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'drupal/datetime' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/datetime_range' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/dblog' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/default_content' => 
    array (
      'pretty_version' => '2.0.0-alpha1',
      'version' => '2.0.0.0-alpha1',
      'aliases' => 
      array (
      ),
      'reference' => '2.0.0-alpha1',
    ),
    'drupal/devel' => 
    array (
      'pretty_version' => '4.1.1',
      'version' => '4.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4.1.1',
    ),
    'drupal/diff' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0',
    ),
    'drupal/dropzonejs' => 
    array (
      'pretty_version' => '2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.4',
    ),
    'drupal/drupal-driver' => 
    array (
      'pretty_version' => 'v2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ebc7fc3cbaa0b2eb7bcb100d1302dadb67a9de29',
    ),
    'drupal/drupal-extension' => 
    array (
      'pretty_version' => 'v4.1.0',
      'version' => '4.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f611a70aaa2d1ef6b3fdae9c35dc573508c7d648',
    ),
    'drupal/dynamic_page_cache' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/editor' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/embed' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.4',
    ),
    'drupal/entity_block' => 
    array (
      'pretty_version' => '1.0.0-beta3',
      'version' => '1.0.0.0-beta3',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-beta3',
    ),
    'drupal/entity_browser' => 
    array (
      'pretty_version' => '2.5.0',
      'version' => '2.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.5',
    ),
    'drupal/entity_browser_block' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/entity_embed' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/entity_reference' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/environment_indicator' => 
    array (
      'pretty_version' => '4.0.2',
      'version' => '4.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '4.0.2',
    ),
    'drupal/extlink' => 
    array (
      'pretty_version' => '1.5.0',
      'version' => '1.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.5',
    ),
    'drupal/field' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/field_group' => 
    array (
      'pretty_version' => '3.1.0',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.1',
    ),
    'drupal/field_layout' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/field_permissions' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/field_ui' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/file' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/filter' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/flag' => 
    array (
      'pretty_version' => '4.0.0-beta2',
      'version' => '4.0.0.0-beta2',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-4.0-beta2',
    ),
    'drupal/focal_point' => 
    array (
      'pretty_version' => '1.5.0',
      'version' => '1.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.5',
    ),
    'drupal/forum' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/google_analytics' => 
    array (
      'pretty_version' => '3.1.0',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.1',
    ),
    'drupal/hal' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/help' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/help_topics' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/history' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/honeypot' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '2.0.1',
    ),
    'drupal/image' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/image_widget_crop' => 
    array (
      'pretty_version' => '2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.3',
    ),
    'drupal/inline_entity_form' => 
    array (
      'pretty_version' => '1.0.0-rc8',
      'version' => '1.0.0.0-RC8',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-rc8',
    ),
    'drupal/inline_form_errors' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/jquery_ui' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.4',
    ),
    'drupal/jquery_ui_datepicker' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0',
    ),
    'drupal/jquery_ui_draggable' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.2',
    ),
    'drupal/jquery_ui_droppable' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.2',
    ),
    'drupal/jquery_ui_slider' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/jquery_ui_touch_punch' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1.0.0',
    ),
    'drupal/jsonapi' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/language' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/layout_builder' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/layout_builder_restrictions' => 
    array (
      'pretty_version' => '2.8.0',
      'version' => '2.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.8',
    ),
    'drupal/layout_builder_st' => 
    array (
      'pretty_version' => '1.0.0-alpha2',
      'version' => '1.0.0.0-alpha2',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-alpha2',
    ),
    'drupal/layout_builder_styles' => 
    array (
      'pretty_version' => '1.0.0-beta4',
      'version' => '1.0.0.0-beta4',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-beta4',
    ),
    'drupal/layout_discovery' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/layout_library' => 
    array (
      'pretty_version' => '1.0.0-beta2',
      'version' => '1.0.0.0-beta2',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-beta2',
    ),
    'drupal/lightning_api' => 
    array (
      'pretty_version' => '4.6.0',
      'version' => '4.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-4.6',
    ),
    'drupal/lightning_core' => 
    array (
      'pretty_version' => '5.5.0',
      'version' => '5.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-5.5',
    ),
    'drupal/lightning_layout' => 
    array (
      'pretty_version' => '2.9.0',
      'version' => '2.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.9',
    ),
    'drupal/lightning_media' => 
    array (
      'pretty_version' => '4.6.0',
      'version' => '4.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-4.6',
    ),
    'drupal/lightning_workflow' => 
    array (
      'pretty_version' => '3.16.0',
      'version' => '3.16.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.16',
    ),
    'drupal/link' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/linkicon' => 
    array (
      'pretty_version' => 'dev-1.x',
      'version' => 'dev-1.x',
      'aliases' => 
      array (
        0 => '1.x-dev',
      ),
      'reference' => 'bbdc64491ce1eb3560929ebb443878a31229f007',
    ),
    'drupal/locale' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/media' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/media_entity_instagram' => 
    array (
      'pretty_version' => '3.0.4',
      'version' => '3.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '3.0.4',
    ),
    'drupal/media_entity_twitter' => 
    array (
      'pretty_version' => '2.6.0',
      'version' => '2.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.6',
    ),
    'drupal/media_library' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/memcache' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.2',
    ),
    'drupal/menu_link_content' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/menu_ui' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/metatag' => 
    array (
      'pretty_version' => '1.15.0',
      'version' => '1.15.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.15',
    ),
    'drupal/migrate' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/migrate_drupal' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/migrate_drupal_multilingual' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/migrate_drupal_ui' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/minimal' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/moderation_dashboard' => 
    array (
      'pretty_version' => '1.0.0-beta2',
      'version' => '1.0.0.0-beta2',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-beta2',
    ),
    'drupal/moderation_sidebar' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.4',
    ),
    'drupal/mysql56' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/node' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/olivero' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/openapi' => 
    array (
      'pretty_version' => '2.0.0-rc3',
      'version' => '2.0.0.0-RC3',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.0-rc3',
    ),
    'drupal/openapi_jsonapi' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.0',
    ),
    'drupal/openapi_rest' => 
    array (
      'pretty_version' => '2.0.0-rc2',
      'version' => '2.0.0.0-RC2',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.0-rc2',
    ),
    'drupal/openapi_ui' => 
    array (
      'pretty_version' => '1.0.0-rc3',
      'version' => '1.0.0.0-RC3',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-rc3',
    ),
    'drupal/openapi_ui_redoc' => 
    array (
      'pretty_version' => '1.0.0-rc3',
      'version' => '1.0.0.0-RC3',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-rc3',
    ),
    'drupal/openapi_ui_swagger' => 
    array (
      'pretty_version' => '1.0.0-rc4',
      'version' => '1.0.0.0-RC4',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-rc4',
    ),
    'drupal/options' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/page_cache' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/page_manager' => 
    array (
      'pretty_version' => '4.0.0-beta6',
      'version' => '4.0.0.0-beta6',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-4.0-beta6',
    ),
    'drupal/panelizer' => 
    array (
      'pretty_version' => '5.0.0-beta3',
      'version' => '5.0.0.0-beta3',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-5.0-beta3',
    ),
    'drupal/panels' => 
    array (
      'pretty_version' => '4.6.0',
      'version' => '4.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-4.6',
    ),
    'drupal/panels_ipe' => 
    array (
      'pretty_version' => '4.6.0',
      'version' => '4.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'drupal/path' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/path_alias' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/pathauto' => 
    array (
      'pretty_version' => '1.8.0',
      'version' => '1.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.8',
    ),
    'drupal/pendo' => 
    array (
      'pretty_version' => '1.0.0-alpha4',
      'version' => '1.0.0.0-alpha4',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-alpha4',
    ),
    'drupal/profile_switcher' => 
    array (
      'pretty_version' => '1.0.0-alpha5',
      'version' => '1.0.0.0-alpha5',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-alpha5',
    ),
    'drupal/purge' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.0',
    ),
    'drupal/qa_accounts' => 
    array (
      'pretty_version' => 'dev-1.x',
      'version' => 'dev-1.x',
      'aliases' => 
      array (
        0 => '1.x-dev',
      ),
      'reference' => '1bd9a2a89ba486577af16008c2fd1ff0abe5eb6b',
    ),
    'drupal/quickedit' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/r4032login' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2.0.0',
    ),
    'drupal/rdf' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/recaptcha' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.0',
    ),
    'drupal/redirect' => 
    array (
      'pretty_version' => '1.6.0',
      'version' => '1.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.6',
    ),
    'drupal/responsive_image' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/responsive_menu' => 
    array (
      'pretty_version' => '4.4.1',
      'version' => '4.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4.4.1',
    ),
    'drupal/rest' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/schemata' => 
    array (
      'pretty_version' => '1.0.0-beta2',
      'version' => '1.0.0.0-beta2',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-beta2',
    ),
    'drupal/schemata_json_schema' => 
    array (
      'pretty_version' => '1.0.0-beta2',
      'version' => '1.0.0.0-beta2',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'drupal/search' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/search_api' => 
    array (
      'pretty_version' => '1.19.0',
      'version' => '1.19.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.19',
    ),
    'drupal/seckit' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2.0.0',
    ),
    'drupal/serialization' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/settings_tray' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/seven' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/shield' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.4',
    ),
    'drupal/shortcut' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/simple_gmap' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3.0.0',
    ),
    'drupal/simple_oauth' => 
    array (
      'pretty_version' => '4.5.0',
      'version' => '4.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-4.5',
    ),
    'drupal/simple_sitemap' => 
    array (
      'pretty_version' => '3.8.0',
      'version' => '3.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.8',
    ),
    'drupal/slick' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.2',
    ),
    'drupal/slick_entityreference' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.0',
    ),
    'drupal/smart_trim' => 
    array (
      'pretty_version' => '1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.3',
    ),
    'drupal/standard' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/stark' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/statistics' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/svg_image' => 
    array (
      'pretty_version' => '1.14.0',
      'version' => '1.14.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.14',
    ),
    'drupal/syslog' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/system' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/taxonomy' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/telephone' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/text' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/token' => 
    array (
      'pretty_version' => '1.9.0',
      'version' => '1.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.9',
    ),
    'drupal/toolbar' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/tour' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/tracker' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/twig_xdebug' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.2',
    ),
    'drupal/update' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/upgrade_status' => 
    array (
      'pretty_version' => '2.9.0',
      'version' => '2.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.9',
    ),
    'drupal/user' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/video_embed_field' => 
    array (
      'pretty_version' => '2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.4',
    ),
    'drupal/views' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/views_infinite_scroll' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.7',
    ),
    'drupal/views_ui' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/webform' => 
    array (
      'pretty_version' => '6.0.2',
      'version' => '6.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '6.0.2',
    ),
    'drupal/webform_views' => 
    array (
      'pretty_version' => '5.0.0-alpha8',
      'version' => '5.0.0.0-alpha8',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-5.0-alpha8',
    ),
    'drupal/workflows' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupal/workspaces' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.4',
      ),
    ),
    'drupol/phposinfo' => 
    array (
      'pretty_version' => '1.6.5',
      'version' => '1.6.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '36b0250d38279c8a131a1898a31e359606024507',
    ),
    'drush/drush' => 
    array (
      'pretty_version' => '10.3.6',
      'version' => '10.3.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fc985a95c6010e04891a2dbcf3f39984b8c9ef0a',
    ),
    'egulias/email-validator' => 
    array (
      'pretty_version' => '2.1.25',
      'version' => '2.1.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '0dbf5d78455d4d6a41d186da50adc1122ec066f4',
    ),
    'enlightn/security-checker' => 
    array (
      'pretty_version' => 'v1.5.0',
      'version' => '1.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '85ada478c641a304112ddd43e0c67dd18ce7c51e',
    ),
    'enshrined/svg-sanitize' => 
    array (
      'pretty_version' => '0.14.0',
      'version' => '0.14.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'beff89576a72540ee99476aeb9cfe98222e76fb8',
    ),
    'ezyang/htmlpurifier' => 
    array (
      'pretty_version' => 'v4.13.0',
      'version' => '4.13.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '08e27c97e4c6ed02f37c5b2b20488046c8d90d75',
    ),
    'fabpot/goutte' => 
    array (
      'pretty_version' => 'v3.3.1',
      'version' => '3.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '80a23b64f44d54dd571d114c473d9d7e9ed84ca5',
    ),
    'google/recaptcha' => 
    array (
      'pretty_version' => '1.2.4',
      'version' => '1.2.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '614f25a9038be4f3f2da7cbfd778dc5b357d2419',
    ),
    'grasmash/expander' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '95d6037344a4be1dd5f8e0b0b2571a28c397578f',
    ),
    'grasmash/yaml-cli' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '51d8ecffccbf55538a078a7ffda0aa8736f3bd09',
    ),
    'grasmash/yaml-expander' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3f0f6001ae707a24f4d9733958d77d92bf9693b1',
    ),
    'guzzlehttp/guzzle' => 
    array (
      'pretty_version' => '6.5.5',
      'version' => '6.5.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '9d4290de1cfd701f38099ef7e183b64b4b7b0c5e',
    ),
    'guzzlehttp/promises' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '60d379c243457e073cff02bc323a2a86cb355631',
    ),
    'guzzlehttp/psr7' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '53330f47520498c0ae1f61f7e2c90f55690c06a3',
    ),
    'instaclick/php-webdriver' => 
    array (
      'pretty_version' => '1.4.7',
      'version' => '1.4.7.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b5f330e900e9b3edfc18024a5ec8c07136075712',
    ),
    'j7mbo/twitter-api-php' => 
    array (
      'pretty_version' => '1.0.6',
      'version' => '1.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '443d22c53d621b3cc6b7e0c56daa60c5ada033f7',
    ),
    'jarnaiz/behat-junit-formatter' => 
    array (
      'pretty_version' => 'v1.3.2',
      'version' => '1.3.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '2f80b3881e04d3cf43e05ab821c0e80675a9846d',
    ),
    'jquery-ui/jquery-ui-touch-punch' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'justinrainbow/json-schema' => 
    array (
      'pretty_version' => '5.2.10',
      'version' => '5.2.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '2ba9c8c862ecd5510ed16c6340aa9f6eadb4f31b',
    ),
    'laminas/laminas-diactoros' => 
    array (
      'pretty_version' => '2.5.0',
      'version' => '2.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '4ff7400c1c12e404144992ef43c8b733fd9ad516',
    ),
    'laminas/laminas-escaper' => 
    array (
      'pretty_version' => '2.7.0',
      'version' => '2.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5e04bc5ae5990b17159d79d331055e2c645e5cc5',
    ),
    'laminas/laminas-feed' => 
    array (
      'pretty_version' => '2.13.1',
      'version' => '2.13.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '45d36702d09afd5d8ca01192ecd3b5afaf37126b',
    ),
    'laminas/laminas-servicemanager' => 
    array (
      'pretty_version' => '3.6.4',
      'version' => '3.6.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b1445e1a7077c21b0fad0974a1b7a11b9dbe0828',
    ),
    'laminas/laminas-stdlib' => 
    array (
      'pretty_version' => '3.3.1',
      'version' => '3.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd81c7ffe602ed0e6ecb18691019111c0f4bf1efe',
    ),
    'laminas/laminas-text' => 
    array (
      'pretty_version' => '2.8.0',
      'version' => '2.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '76fccc8f79a6fb61689e96ab300566c0065deaaa',
    ),
    'laminas/laminas-zendframework-bridge' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6cccbddfcfc742eb02158d6137ca5687d92cee32',
    ),
    'lcobucci/jwt' => 
    array (
      'pretty_version' => '3.4.3',
      'version' => '3.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cd83b5421df3dbbbc66bd07a5b970c9efb6371b9',
    ),
    'league/container' => 
    array (
      'pretty_version' => '2.4.1',
      'version' => '2.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '43f35abd03a12977a60ffd7095efd6a7808488c0',
    ),
    'league/event' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd2cc124cf9a3fab2bb4ff963307f60361ce4d119',
    ),
    'league/oauth2-server' => 
    array (
      'pretty_version' => '7.4.0',
      'version' => '7.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2eb1cf79e59d807d89c256e7ac5e2bf8bdbd4acf',
    ),
    'league/oauth2server' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'lncd/oauth2' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'masterminds/html5' => 
    array (
      'pretty_version' => '2.7.4',
      'version' => '2.7.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '9227822783c75406cfe400984b2f095cdf03d417',
    ),
    'mathieuviossat/arraytotexttable' => 
    array (
      'pretty_version' => 'v1.0.8',
      'version' => '1.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '6b1af924478cb9c3a903269e304fff006fe0dbf4',
    ),
    'mglaman/phpstan-drupal' => 
    array (
      'pretty_version' => '0.12.8',
      'version' => '0.12.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '7598084f8a0d6de21015faa9e2151cc4540f4344',
    ),
    'mkalkbrenner/php-htmldiff-advanced' => 
    array (
      'pretty_version' => '0.0.8',
      'version' => '0.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '3a714b48c9c3d3730baaf6d3949691e654cd37c9',
    ),
    'mmenu/mmenu' => 
    array (
      'pretty_version' => '8.5.17',
      'version' => '8.5.17.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'nette/finder' => 
    array (
      'pretty_version' => 'v2.5.2',
      'version' => '2.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '4ad2c298eb8c687dd0e74ae84206a4186eeaed50',
    ),
    'nette/utils' => 
    array (
      'pretty_version' => 'v3.2.1',
      'version' => '3.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '2bc2f58079c920c2ecbb6935645abf6f2f5f94ba',
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v4.10.4',
      'version' => '4.10.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6d052fc58cb876152f89f532b95a8d7907e7f0e',
    ),
    'npm-asset/dropzone' => 
    array (
      'pretty_version' => '5.7.4',
      'version' => '5.7.4.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'oomphinc/composer-installers-extender' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8d3fe38a1723e0e91076920c8bb946b1696e28ca',
    ),
    'orno/di' => 
    array (
      'replaced' => 
      array (
        0 => '~2.0',
      ),
    ),
    'paragonie/random_compat' => 
    array (
      'pretty_version' => 'v9.99.100',
      'version' => '9.99.100.0',
      'aliases' => 
      array (
      ),
      'reference' => '996434e5492cb4c3edcb9168db6fbb1359ef965a',
    ),
    'pear/archive_tar' => 
    array (
      'pretty_version' => '1.4.13',
      'version' => '1.4.13.0',
      'aliases' => 
      array (
      ),
      'reference' => '2b87b41178cc6d4ad3cba678a46a1cae49786011',
    ),
    'pear/console_getopt' => 
    array (
      'pretty_version' => 'v1.4.3',
      'version' => '1.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a41f8d3e668987609178c7c4a9fe48fecac53fa0',
    ),
    'pear/pear-core-minimal' => 
    array (
      'pretty_version' => 'v1.10.10',
      'version' => '1.10.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '625a3c429d9b2c1546438679074cac1b089116a7',
    ),
    'pear/pear_exception' => 
    array (
      'pretty_version' => 'v1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dbb42a5a0e45f3adcf99babfb2a1ba77b8ac36a7',
    ),
    'phpcompatibility/php-compatibility' => 
    array (
      'pretty_version' => '9.3.5',
      'version' => '9.3.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '9fb324479acf6f39452e0655d2429cc0d3914243',
    ),
    'phpdocumentor/reflection-common' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1d01c49d4ed62f25aa84a747ad35d5a16924662b',
    ),
    'phpdocumentor/reflection-docblock' => 
    array (
      'pretty_version' => '5.2.2',
      'version' => '5.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '069a785b2141f5bcf49f3e353548dc1cce6df556',
    ),
    'phpdocumentor/type-resolver' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6a467b8989322d92aa1c8bf2bebcc6e5c2ba55c0',
    ),
    'phpstan/phpdoc-parser' => 
    array (
      'pretty_version' => '0.3.5',
      'version' => '0.3.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '8c4ef2aefd9788238897b678a985e1d5c8df6db4',
    ),
    'phpstan/phpstan' => 
    array (
      'pretty_version' => '0.12.74',
      'version' => '0.12.74.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bc5f9483c8f461c86653dcbd040cf0d2778c91a2',
    ),
    'phpstan/phpstan-deprecation-rules' => 
    array (
      'pretty_version' => '0.12.6',
      'version' => '0.12.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '46dbd43c2db973d2876d6653e53f5c2cc3a01fbb',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
    ),
    'psr/container-implementation' => 
    array (
      'provided' => 
      array (
        0 => '^1.0',
        1 => '1.0',
      ),
    ),
    'psr/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-factory' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '12ac7fcd07e5b077433f5f2bee95b3a771bf61be',
    ),
    'psr/http-factory-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-message' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f6561bf28d520154e4b0ec72be95418abe6d9363',
    ),
    'psr/http-message-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f73288fd15629204f9d42b7055f72dacbe811fc',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psy/psysh' => 
    array (
      'pretty_version' => 'v0.10.6',
      'version' => '0.10.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '6f990c19f91729de8b31e639d6e204ea59f19cf3',
    ),
    'ralouphie/getallheaders' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '120b605dfeb996808c31b6477290a714d356e822',
    ),
    'react/promise' => 
    array (
      'pretty_version' => 'v2.8.0',
      'version' => '2.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f3cff96a19736714524ca0dd1d4130de73dbbbc4',
    ),
    'roundcube/plugin-installer' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'rsky/pear-core-min' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.10.10',
      ),
    ),
    'seld/jsonlint' => 
    array (
      'pretty_version' => '1.8.3',
      'version' => '1.8.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '9ad6ce79c342fbd44df10ea95511a1b24dee5b57',
    ),
    'seld/phar-utils' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8674b1d84ffb47cc59a101f5d5a3b61e87d23796',
    ),
    'shama/baton' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'sirbrillig/phpcs-variable-analysis' => 
    array (
      'pretty_version' => 'v2.10.2',
      'version' => '2.10.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '0775e0c683badad52c03b11c2cd86a9fdecb937a',
    ),
    'slevomat/coding-standard' => 
    array (
      'pretty_version' => '5.0.4',
      'version' => '5.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '287ac3347c47918c0bf5e10335e36197ea10894c',
    ),
    'squizlabs/php_codesniffer' => 
    array (
      'pretty_version' => '3.5.8',
      'version' => '3.5.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '9d583721a7157ee997f235f327de038e7ea6dac4',
    ),
    'stack/builder' => 
    array (
      'pretty_version' => 'v1.0.6',
      'version' => '1.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a4faaa6f532c6086bc66c29e1bc6c29593e1ca7c',
    ),
    'superfish/superfish' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'swagger-api/swagger-ui' => 
    array (
      'pretty_version' => 'v3.42.0',
      'version' => '3.42.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2a3afb84402e108f7c426fc7a6873b9e063e05c6',
    ),
    'symfony-cmf/routing' => 
    array (
      'pretty_version' => '2.3.3',
      'version' => '2.3.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '3c97e7b7709b313cecfb76d691ad4cc22acbf3f5',
    ),
    'symfony/browser-kit' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f6f060bdc473c3f3b1f00e2ebdeb3d02eda77f82',
    ),
    'symfony/config' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '2c4c7827a7e143f5cf375666641b0f448eab8802',
    ),
    'symfony/console' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '24026c44fc37099fa145707fecd43672831b837a',
    ),
    'symfony/css-selector' => 
    array (
      'pretty_version' => 'v5.2.3',
      'version' => '5.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f65f217b3314504a1ec99c2d6ef69016bb13490f',
    ),
    'symfony/debug' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => 'af4987aa4a5630e9615be9d9c3ed1b0f24ca449c',
    ),
    'symfony/dependency-injection' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '2468b95d869c872c6fb1b93b395a7fcd5331f2b9',
    ),
    'symfony/deprecation-contracts' => 
    array (
      'pretty_version' => 'v2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5fa56b4074d1ae755beb55617ddafe6f5d78f665',
    ),
    'symfony/dom-crawler' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '21032c566558255e551d23f4a516434c9e3a9a78',
    ),
    'symfony/error-handler' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd603654eaeb713503bba3e308b9e748e5a6d3f2e',
    ),
    'symfony/event-dispatcher' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c352647244bd376bf7d31efbd5401f13f50dad0c',
    ),
    'symfony/event-dispatcher-contracts' => 
    array (
      'pretty_version' => 'v1.1.9',
      'version' => '1.1.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '84e23fdcd2517bf37aecbd16967e83f0caee25a7',
    ),
    'symfony/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.1',
      ),
    ),
    'symfony/filesystem' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '83a6feed14846d2d9f3916adbaf838819e4e3380',
    ),
    'symfony/finder' => 
    array (
      'pretty_version' => 'v5.2.3',
      'version' => '5.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '4adc8d172d602008c204c2e16956f99257248e03',
    ),
    'symfony/http-client-contracts' => 
    array (
      'pretty_version' => 'v2.3.1',
      'version' => '2.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '41db680a15018f9c1d4b23516059633ce280ca33',
    ),
    'symfony/http-foundation' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '8888741b633f6c3d1e572b7735ad2cae3e03f9c5',
    ),
    'symfony/http-kernel' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '07ea794a327d7c8c5d76e3058fde9fec6a711cb4',
    ),
    'symfony/mime' => 
    array (
      'pretty_version' => 'v5.2.3',
      'version' => '5.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7dee6a43493f39b51ff6c5bb2bd576fe40a76c86',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6c942b1ac76c82448322025e084cadc56048b4e',
    ),
    'symfony/polyfill-iconv' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '06fb361659649bcfd6a208a0f1fcaf4e827ad342',
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '2d63434d922daf7da8dd863e7907e67ee3031483',
    ),
    'symfony/polyfill-intl-normalizer' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '43a0283138253ed1d48d352ab6d0bdb3f809f248',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5232de97ee3b75b0360528dae24e73db49566ab1',
    ),
    'symfony/polyfill-php72' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cc6e6f9b39fe8075b3dabfbaf5b5f645ae1340c9',
    ),
    'symfony/polyfill-php73' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a678b42e92f86eca04b7fa4c0f6f19d097fb69e2',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dc3063ba22c2a1fd2f45ed856374d79114998f91',
    ),
    'symfony/process' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '7e950b6366d4da90292c2e7fa820b3c1842b965a',
    ),
    'symfony/psr-http-message-bridge' => 
    array (
      'pretty_version' => 'v2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '81db2d4ae86e9f0049828d9343a72b9523884e5d',
    ),
    'symfony/routing' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '87529f6e305c7acb162840d1ea57922038072425',
    ),
    'symfony/serializer' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '6b383bc45777d14857b634e9f8fa2b8a2e69b66d',
    ),
    'symfony/service-contracts' => 
    array (
      'pretty_version' => 'v2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd15da7ba4957ffb8f1747218be9e1a121fd298a1',
    ),
    'symfony/service-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e1d0c67167a553556d9f974b5fa79c2448df317a',
    ),
    'symfony/translation-contracts' => 
    array (
      'pretty_version' => 'v2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e2eaa60b558f26a4b0354e1bbb25636efaaad105',
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'symfony/twig-bridge' => 
    array (
      'pretty_version' => 'v3.4.47',
      'version' => '3.4.47.0',
      'aliases' => 
      array (
      ),
      'reference' => '090d19d6f1ea5b9e1d79f372785aa5e5c9cd4042',
    ),
    'symfony/validator' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '039479123c8d824f23efba9bb413b85dc3f42e43',
    ),
    'symfony/var-dumper' => 
    array (
      'pretty_version' => 'v5.2.3',
      'version' => '5.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '72ca213014a92223a5d18651ce79ef441c12b694',
    ),
    'symfony/yaml' => 
    array (
      'pretty_version' => 'v4.4.19',
      'version' => '4.4.19.0',
      'aliases' => 
      array (
      ),
      'reference' => '17ed9f14c1aa05b1a5cf2e2c5ef2d0be28058ef9',
    ),
    'textalk/websocket' => 
    array (
      'pretty_version' => '1.5.1',
      'version' => '1.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'aada79791f013d821c8265e9e2ae565aa9bdca2f',
    ),
    'twig/twig' => 
    array (
      'pretty_version' => 'v2.14.3',
      'version' => '2.14.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '8bc568d460d88b25c00c046256ec14a787ea60d9',
    ),
    'typo3/phar-stream-wrapper' => 
    array (
      'pretty_version' => 'v3.1.6',
      'version' => '3.1.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '60131cb573a1e478cfecd34e4ea38e3b31505f75',
    ),
    'vardot/blazy' => 
    array (
      'pretty_version' => '1.8.2.1',
      'version' => '1.8.2.1',
      'aliases' => 
      array (
      ),
      'reference' => '934160a4d6420d26b78371b9d341bac7c6c8ade8',
    ),
    'webflo/drupal-finder' => 
    array (
      'pretty_version' => '1.2.2',
      'version' => '1.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c8e5dbe65caef285fec8057a4c718a0d4138d1ee',
    ),
    'webmozart/assert' => 
    array (
      'pretty_version' => '1.9.1',
      'version' => '1.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bafc69caeb4d49c39fd0779086c03a3738cbb389',
    ),
    'webmozart/path-util' => 
    array (
      'pretty_version' => '2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd939f7edc24c9a1bb9c0dee5cb05d8e859490725',
    ),
    'zendframework/zend-diactoros' => 
    array (
      'replaced' => 
      array (
        0 => '^2.2.1',
      ),
    ),
    'zendframework/zend-escaper' => 
    array (
      'replaced' => 
      array (
        0 => '^2.6.1',
      ),
    ),
    'zendframework/zend-feed' => 
    array (
      'replaced' => 
      array (
        0 => '^2.12.0',
      ),
    ),
    'zendframework/zend-servicemanager' => 
    array (
      'replaced' => 
      array (
        0 => '^3.4.0',
      ),
    ),
    'zendframework/zend-stdlib' => 
    array (
      'replaced' => 
      array (
        0 => '^3.2.1',
      ),
    ),
    'zendframework/zend-text' => 
    array (
      'replaced' => 
      array (
        0 => '^2.7.1',
      ),
    ),
    'zumba/amplitude-php' => 
    array (
      'pretty_version' => '1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '144da6e648b21a95e5bc67e711af6858f7dae38e',
    ),
  ),
);
    private static $canGetVendors;
    private static $installedByVendor = array();

    /**
     * Returns a list of all package names which are present, either by being installed, replaced or provided
     *
     * @return string[]
     * @psalm-return list<string>
     */
    public static function getInstalledPackages()
    {
        $packages = array();
        foreach (self::getInstalled() as $installed) {
            $packages[] = array_keys($installed['versions']);
        }


        if (1 === \count($packages)) {
            return $packages[0];
        }

        return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
    }

    /**
     * Checks whether the given package is installed
     *
     * This also returns true if the package name is provided or replaced by another package
     *
     * @param  string $packageName
     * @return bool
     */
    public static function isInstalled($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (isset($installed['versions'][$packageName])) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks whether the given package satisfies a version constraint
     *
     * e.g. If you want to know whether version 2.3+ of package foo/bar is installed, you would call:
     *
     *   Composer\InstalledVersions::satisfies(new VersionParser, 'foo/bar', '^2.3')
     *
     * @param VersionParser $parser      Install composer/semver to have access to this class and functionality
     * @param string        $packageName
     * @param string|null   $constraint  A version constraint to check for, if you pass one you have to make sure composer/semver is required by your package
     *
     * @return bool
     */
    public static function satisfies(VersionParser $parser, $packageName, $constraint)
    {
        $constraint = $parser->parseConstraints($constraint);
        $provided = $parser->parseConstraints(self::getVersionRanges($packageName));

        return $provided->matches($constraint);
    }

    /**
     * Returns a version constraint representing all the range(s) which are installed for a given package
     *
     * It is easier to use this via isInstalled() with the $constraint argument if you need to check
     * whether a given version of a package is installed, and not just whether it exists
     *
     * @param  string $packageName
     * @return string Version constraint usable with composer/semver
     */
    public static function getVersionRanges($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }

            $ranges = array();
            if (isset($installed['versions'][$packageName]['pretty_version'])) {
                $ranges[] = $installed['versions'][$packageName]['pretty_version'];
            }
            if (array_key_exists('aliases', $installed['versions'][$packageName])) {
                $ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
            }
            if (array_key_exists('replaced', $installed['versions'][$packageName])) {
                $ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
            }
            if (array_key_exists('provided', $installed['versions'][$packageName])) {
                $ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
            }

            return implode(' || ', $ranges);
        }

        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }

    /**
     * @param  string      $packageName
     * @return string|null If the package is being replaced or provided but is not really installed, null will be returned as version, use satisfies or getVersionRanges if you need to know if a given version is present
     */
    public static function getVersion($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }

            if (!isset($installed['versions'][$packageName]['version'])) {
                return null;
            }

            return $installed['versions'][$packageName]['version'];
        }

        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }

    /**
     * @param  string      $packageName
     * @return string|null If the package is being replaced or provided but is not really installed, null will be returned as version, use satisfies or getVersionRanges if you need to know if a given version is present
     */
    public static function getPrettyVersion($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }

            if (!isset($installed['versions'][$packageName]['pretty_version'])) {
                return null;
            }

            return $installed['versions'][$packageName]['pretty_version'];
        }

        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }

    /**
     * @param  string      $packageName
     * @return string|null If the package is being replaced or provided but is not really installed, null will be returned as reference
     */
    public static function getReference($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }

            if (!isset($installed['versions'][$packageName]['reference'])) {
                return null;
            }

            return $installed['versions'][$packageName]['reference'];
        }

        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }

    /**
     * @return array
     * @psalm-return array{name: string, version: string, reference: string, pretty_version: string, aliases: string[]}
     */
    public static function getRootPackage()
    {
        $installed = self::getInstalled();

        return $installed[0]['root'];
    }

    /**
     * Returns the raw installed.php data for custom implementations
     *
     * @return array[]
     * @psalm-return array{root: array{name: string, version: string, reference: string, pretty_version: string, aliases: string[]}, versions: list<string, array{pretty_version: ?string, version: ?string, aliases: ?string[], reference: ?string, replaced: ?string[], provided: ?string[]}>}
     */
    public static function getRawData()
    {
        return self::$installed;
    }

    /**
     * Lets you reload the static array from another file
     *
     * This is only useful for complex integrations in which a project needs to use
     * this class but then also needs to execute another project's autoloader in process,
     * and wants to ensure both projects have access to their version of installed.php.
     *
     * A typical case would be PHPUnit, where it would need to make sure it reads all
     * the data it needs from this class, then call reload() with
     * `require $CWD/vendor/composer/installed.php` (or similar) as input to make sure
     * the project in which it runs can then also use this class safely, without
     * interference between PHPUnit's dependencies and the project's dependencies.
     *
     * @param  array[] $data A vendor/composer/installed.php data set
     * @return void
     *
     * @psalm-param array{root: array{name: string, version: string, reference: string, pretty_version: string, aliases: string[]}, versions: list<string, array{pretty_version: ?string, version: ?string, aliases: ?string[], reference: ?string, replaced: ?string[], provided: ?string[]}>} $data
     */
    public static function reload($data)
    {
        self::$installed = $data;
        self::$installedByVendor = array();
    }

    /**
     * @return array[]
     */
    private static function getInstalled()
    {
        if (null === self::$canGetVendors) {
            self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
        }

        $installed = array();

        if (self::$canGetVendors) {
            // @phpstan-ignore-next-line
            foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
                if (isset(self::$installedByVendor[$vendorDir])) {
                    $installed[] = self::$installedByVendor[$vendorDir];
                } elseif (is_file($vendorDir.'/composer/installed.php')) {
                    $installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
                }
            }
        }

        $installed[] = self::$installed;

        return $installed;
    }
}
