<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;








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
      'pretty_version' => '13.0.0',
      'version' => '13.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '65b4b65c71eb372f926f1b2b36d753df861303b5',
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
      'pretty_version' => 'v0.6.0',
      'version' => '0.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '7841dfaad2a4940e07646f34d6b506294d6f7b32',
    ),
    'acquia/drupal-environment-detector' => 
    array (
      'pretty_version' => 'v1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '63b1bd0fd393c5e96e45042e2d7922682aaed6e4',
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
      'pretty_version' => '3.6.0',
      'version' => '3.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e786e3d9707ffd9b0dd330ca135b66344dcef85a',
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
      'pretty_version' => 'v0.1.12',
      'version' => '0.1.12.0',
      'aliases' => 
      array (
      ),
      'reference' => '7fb8aa0ad77864f1d3604ae4a31af9cbabb91485',
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
    'composer/installers' => 
    array (
      'pretty_version' => 'v1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ae03311f45dfe194412081526be2e003960df74b',
    ),
    'composer/semver' => 
    array (
      'pretty_version' => '3.2.5',
      'version' => '3.2.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '31f3ea725711245195f62e54ffa402d8ef2fdba9',
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
      'pretty_version' => '3.1.0',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9ed3c590be9fcf9fea69c73456c2fd4b27f5204c',
    ),
    'consolidation/site-process' => 
    array (
      'pretty_version' => '4.1.0',
      'version' => '4.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ef57711d7049f7606ce936ded16ad93f1ad7f02c',
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
      'pretty_version' => '1.7.1',
      'version' => '1.7.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '9888dcc74993c030b75f3dd548bb5e20cdbd740c',
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
      'pretty_version' => 'v2.3.1',
      'version' => '2.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '77880488b9954b7884c25555c2a0ea9e7053f9d2',
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
      'pretty_version' => '2.8.0',
      'version' => '2.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f85c8f86ca2e9000119c310577a6942683f7e280',
    ),
    'doctrine/annotations' => 
    array (
      'pretty_version' => '1.13.1',
      'version' => '1.13.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e6e7b7d5b45a2f2abc5460cc6396480b2b1d321f',
    ),
    'doctrine/cache' => 
    array (
      'pretty_version' => '1.11.3',
      'version' => '1.11.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '3bb5588cec00a0268829cc4a518490df6741af9d',
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
      'pretty_version' => '1.4.4',
      'version' => '1.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '4bd5c1cdfcd00e9e2d8c484f79150f67e5d355d9',
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
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '3.0.3',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/admin_toolbar' => 
    array (
      'pretty_version' => '3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '3.0.1',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/automated_cron' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/bartik' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/basic_auth' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/blazy' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.2',
    ),
    'drupal/block' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/block_content' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/breakpoint' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/captcha' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.2',
    ),
    'drupal/ckeditor' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/claro' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/classy' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
      'pretty_version' => '8.3.13',
      'version' => '8.3.13.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd3286d571b19633cc296d438c36b9aed195de43c',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/comment' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/components' => 
    array (
      'pretty_version' => '2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.4',
    ),
    'drupal/config' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
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
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/content_translation' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/contextual' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core' => 
    array (
      'pretty_version' => '9.1.10',
      'version' => '9.1.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '7fa70eb78addcef8ad704edad9fa73337b8cdab5',
    ),
    'drupal/core-annotation' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-assertion' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-bridge' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-class-finder' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-composer-scaffold' => 
    array (
      'pretty_version' => '9.1.10',
      'version' => '9.1.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '7b125516d6568b888945ee03ac2636dcced76e8d',
    ),
    'drupal/core-datetime' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-dependency-injection' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-diff' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-discovery' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-event-dispatcher' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-file-cache' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-file-security' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-filesystem' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-front-matter' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-gettext' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-graph' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-http-foundation' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-php-storage' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-plugin' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-proxy-builder' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-render' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-serialization' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-transliteration' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-utility' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-uuid' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/core-version' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
      'pretty_version' => '3.6.0',
      'version' => '3.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.6',
    ),
    'drupal/ctools_block' => 
    array (
      'pretty_version' => '3.6.0',
      'version' => '3.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'drupal/datetime' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/datetime_range' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/dblog' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
      'pretty_version' => '2.5.0',
      'version' => '2.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.5',
    ),
    'drupal/drupal-driver' => 
    array (
      'pretty_version' => 'v2.1.1',
      'version' => '2.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a33cb7618476997e1b7330ae9225c91cbab32e1c',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/editor' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/environment_indicator' => 
    array (
      'pretty_version' => '4.0.3',
      'version' => '4.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '4.0.3',
    ),
    'drupal/extlink' => 
    array (
      'pretty_version' => '1.6.0',
      'version' => '1.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.6',
    ),
    'drupal/field' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/file' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/filter' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/help' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/help_topics' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/history' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
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
      'pretty_version' => '1.0.0-rc9',
      'version' => '1.0.0.0-RC9',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-rc9',
    ),
    'drupal/inline_form_errors' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/language' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/layout_builder' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
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
      'pretty_version' => '5.6.0',
      'version' => '5.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-5.6',
    ),
    'drupal/lightning_layout' => 
    array (
      'pretty_version' => '2.10.0',
      'version' => '2.10.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.10',
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
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/media' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/media_entity_instagram' => 
    array (
      'pretty_version' => '3.0.5',
      'version' => '3.0.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '3.0.5',
    ),
    'drupal/media_entity_twitter' => 
    array (
      'pretty_version' => '2.7.0',
      'version' => '2.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.7',
    ),
    'drupal/media_library' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/memcache' => 
    array (
      'pretty_version' => '2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.3',
    ),
    'drupal/menu_link_content' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/menu_ui' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/metatag' => 
    array (
      'pretty_version' => '1.16.0',
      'version' => '1.16.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.16',
    ),
    'drupal/migrate' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/migrate_drupal' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/migrate_drupal_multilingual' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/migrate_drupal_ui' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/minimal' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/olivero' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/page_cache' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/path_alias' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
    'drupal/purge_queuer_url' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/r4032login' => 
    array (
      'pretty_version' => '2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2.1.0',
    ),
    'drupal/rdf' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
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
        0 => '9.1.10',
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
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/settings_tray' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/seven' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/simple_gmap' => 
    array (
      'pretty_version' => '3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '3.0.1',
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
      'pretty_version' => '3.10.0',
      'version' => '3.10.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.10',
    ),
    'drupal/slick' => 
    array (
      'pretty_version' => '2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.3',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/stark' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/statistics' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/system' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/taxonomy' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/telephone' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/text' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/tour' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/tracker' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
        0 => '9.1.10',
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
        0 => '9.1.10',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/views_infinite_scroll' => 
    array (
      'pretty_version' => '1.8.0',
      'version' => '1.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.8',
    ),
    'drupal/views_ui' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
      ),
    ),
    'drupal/webform' => 
    array (
      'pretty_version' => '6.0.3',
      'version' => '6.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '6.0.3',
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
        0 => '9.1.10',
      ),
    ),
    'drupal/workspaces' => 
    array (
      'replaced' => 
      array (
        0 => '9.1.10',
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
      'pretty_version' => '10.5.0',
      'version' => '10.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3fd9f7e62ffb7f221e4be8151a738529345d22d5',
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
      'pretty_version' => 'v1.9.0',
      'version' => '1.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dc5bce653fa4d9c792e9dcffa728c0642847c1e1',
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
      'pretty_version' => '1.4.1',
      'version' => '1.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8e7d04f1f6450fef59366c399cfad4b9383aa30d',
    ),
    'guzzlehttp/psr7' => 
    array (
      'pretty_version' => '1.8.2',
      'version' => '1.8.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dc960a912984efb74d0a90222870c72c87f10c91',
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
    'laminas/laminas-diactoros' => 
    array (
      'pretty_version' => '2.6.0',
      'version' => '2.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '7d2034110ae18afe05050b796a3ee4b3fe177876',
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
      'pretty_version' => '2.14.1',
      'version' => '2.14.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '463fdae515fba30633906098c258d3b2c733c15c',
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
      'pretty_version' => '2.8.1',
      'version' => '2.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd696fa1fb3880b9b8f02c08be58685013b421608',
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
      'pretty_version' => '3.4.5',
      'version' => '3.4.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '511629a54465e89a31d3d7e4cf0935feab8b14c1',
    ),
    'league/container' => 
    array (
      'pretty_version' => '2.5.0',
      'version' => '2.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8438dc47a0674e3378bcce893a0a04d79a2c22b3',
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
    'loophp/phposinfo' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '36eace3287d94e3ccf6b938112819766877b9ccd',
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
      'pretty_version' => '0.12.10',
      'version' => '0.12.10.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b8b6642861662cefb86bf19d9faab01715f38b68',
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
      'pretty_version' => 'v3.2.2',
      'version' => '3.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '967cfc4f9a1acd5f1058d76715a424c53343c20c',
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v4.10.5',
      'version' => '4.10.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '4432ba399e47c66624bc73c8c0f811e5c109576f',
    ),
    'npm-asset/dropzone' => 
    array (
      'pretty_version' => '5.9.2',
      'version' => '5.9.2.0',
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
      'pretty_version' => 'v1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b14fbe2ddb0b9f94f5b24cf08783d599f776fff0',
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
      'pretty_version' => '0.12.88',
      'version' => '0.12.88.0',
      'aliases' => 
      array (
      ),
      'reference' => '464d1a81af49409c41074aa6640ed0c4cbd9bb68',
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
    'psr/cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd11b50ad223250cf17b86e38383413f5a6764bf8',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8622567409010282b7aeebe4bb841fe98b58dcaf',
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
      'pretty_version' => '1.1.4',
      'version' => '1.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
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
      'pretty_version' => 'v0.10.8',
      'version' => '0.10.8.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e4573f47750dd6c92dca5aee543fa77513cbd8d3',
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
    'shama/baton' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'sirbrillig/phpcs-variable-analysis' => 
    array (
      'pretty_version' => 'v2.11.0',
      'version' => '2.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e76e816236f401458dd8e16beecab905861b5867',
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
      'pretty_version' => '3.6.0',
      'version' => '3.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ffced0d2c8fa8e6cdc4d695a743271fab6c38625',
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
      'pretty_version' => 'v3.50.0',
      'version' => '3.50.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '91858cc811d3cddb45ef604365e2c88cd96e4ca0',
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
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '729b1f0eca3ef18ea4e1a29b166145aff75d8fa1',
    ),
    'symfony/config' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '2803882bb10353d277d4539635dd688a053d571c',
    ),
    'symfony/console' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a62acecdf5b50e314a4f305cd01b5282126f3095',
    ),
    'symfony/css-selector' => 
    array (
      'pretty_version' => 'v5.3.0',
      'version' => '5.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fcd0b29a7a0b1bb5bfbedc6231583d77fea04814',
    ),
    'symfony/debug' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a8d2d5c94438548bff9f998ca874e202bb29d07f',
    ),
    'symfony/dependency-injection' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '2ed2a0a6c960bf4e2e862ec77b2f2c558b83c64d',
    ),
    'symfony/deprecation-contracts' => 
    array (
      'pretty_version' => 'v2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5f38c8804a9e97d23e0c8d63341088cd8a22d627',
    ),
    'symfony/dom-crawler' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '41d15bb6d6b95d2be763c514bb2494215d9c5eef',
    ),
    'symfony/error-handler' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '310a756cec00d29d89a08518405aded046a54a8b',
    ),
    'symfony/event-dispatcher' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '047773e7016e4fd45102cedf4bd2558ae0d0c32f',
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
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '2d926ebd76f52352deb3c9577d8c1d4b96eae429',
    ),
    'symfony/finder' => 
    array (
      'pretty_version' => 'v5.3.0',
      'version' => '5.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '0ae3f047bed4edff6fd35b26a9a6bfdc92c953c6',
    ),
    'symfony/http-client-contracts' => 
    array (
      'pretty_version' => 'v2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '7e82f6084d7cae521a75ef2cb5c9457bbda785f4',
    ),
    'symfony/http-foundation' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '0c79d5a65ace4fe66e49702658c024a419d2438b',
    ),
    'symfony/http-kernel' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '3795165596fe81a52296b78c9aae938d434069cc',
    ),
    'symfony/mime' => 
    array (
      'pretty_version' => 'v5.3.0',
      'version' => '5.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ed710d297b181f6a7194d8172c9c2423d58e4852',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.23.0',
      'version' => '1.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '46cd95797e9df938fdd2b03693b5fca5e64b01ce',
    ),
    'symfony/polyfill-iconv' => 
    array (
      'pretty_version' => 'v1.23.0',
      'version' => '1.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '63b5bb7db83e5673936d6e3b8b3e022ff6474933',
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'pretty_version' => 'v1.23.0',
      'version' => '1.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '65bd267525e82759e7d8c4e8ceea44f398838e65',
    ),
    'symfony/polyfill-intl-normalizer' => 
    array (
      'pretty_version' => 'v1.23.0',
      'version' => '1.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8590a5f561694770bdcd3f9b5c69dde6945028e8',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.23.0',
      'version' => '1.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2df51500adbaebdc4c38dea4c89a2e131c45c8a1',
    ),
    'symfony/polyfill-php72' => 
    array (
      'pretty_version' => 'v1.23.0',
      'version' => '1.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9a142215a36a3888e30d0a9eeea9766764e96976',
    ),
    'symfony/polyfill-php73' => 
    array (
      'pretty_version' => 'v1.23.0',
      'version' => '1.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fba8933c384d6476ab14fb7b8526e5287ca7e010',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.23.0',
      'version' => '1.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'eca0bf41ed421bed1b57c4958bab16aa86b757d0',
    ),
    'symfony/polyfill-php81' => 
    array (
      'pretty_version' => 'v1.23.0',
      'version' => '1.23.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e66119f3de95efc359483f810c4c3e6436279436',
    ),
    'symfony/process' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cd61e6dd273975c6625316de9d141ebd197f93c9',
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
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '3a3c2f197ad0846ac6413225fc78868ba1c61434',
    ),
    'symfony/serializer' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '6db3eb4f1bb437cd3730f52353ba4b568acaddf5',
    ),
    'symfony/service-contracts' => 
    array (
      'pretty_version' => 'v2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f040a30e04b57fbcc9c6cbcf4dbaa96bd318b9bb',
    ),
    'symfony/service-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0|2.0',
      ),
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dfe132c5c6d89f90ce7f961742cc532e9ca16dd4',
    ),
    'symfony/translation-contracts' => 
    array (
      'pretty_version' => 'v2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '95c812666f3e91db75385749fe219c5e494c7f95',
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0|2.0',
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
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '29c14955e8b2e7351aaa11553cb36d4a689b7b11',
    ),
    'symfony/var-dumper' => 
    array (
      'pretty_version' => 'v5.3.0',
      'version' => '5.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1d3953e627fe4b5f6df503f356b6545ada6351f3',
    ),
    'symfony/yaml' => 
    array (
      'pretty_version' => 'v4.4.25',
      'version' => '4.4.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '81cdac5536925c1c4b7b50aabc9ff6330b9eb5fc',
    ),
    'textalk/websocket' => 
    array (
      'pretty_version' => '1.5.3',
      'version' => '1.5.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '25f6e322bfaf978a665391efdddc135d4edd60eb',
    ),
    'twig/twig' => 
    array (
      'pretty_version' => 'v2.14.6',
      'version' => '2.14.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '27e5cf2b05e3744accf39d4c68a3235d9966d260',
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
      'pretty_version' => '1.10.0',
      'version' => '1.10.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6964c76c7804814a842473e0c8fd15bab0f18e25',
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









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










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





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}





private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
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
