<?php

namespace Drupal\acsf_sso\EventSubscriber;

use Drupal\acsf\AcsfSite;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Event subscriber that overrides samlauth config on a request event.
 */
class SamlauthRequestSubscriber implements EventSubscriberInterface {

  /**
   * Overrides the samlauth config values to use the correct ones.
   */
  public function injectSamlConfig() {
    // Do this only when on an acsf environment.
    if (!isset($GLOBALS['gardens_site_settings'])) {
      return;
    }

    $sitegroup = $GLOBALS['gardens_site_settings']['site'];
    $env = $GLOBALS['gardens_site_settings']['env'];
    $site_id = $GLOBALS['gardens_site_settings']['conf']['acsf_site_id'];

    $config_overrides = [];

    // If the environment is already live, we do not need to override
    // all samlauth config because it's already been correctly set in
    // the modules install method and the only thing that could change
    // is the sp_entity_id which we override afterwards.
    if (preg_match('/^\d*live$/', $env) === 0) {
      $site = AcsfSite::load();

      if (empty($site->saml_keys)) {
        $site->initSamlKeyProperties();
      }

      $config_overrides = [
        'idp_entity_id' => $site->factory_url . '/sso/saml2/idp/metadata.php',
        'idp_single_sign_on_service' => $site->factory_url . '/sso/saml2/idp/SSOService.php',
        'idp_single_log_out_service' => $site->factory_url . '/sso/saml2/idp/SingleLogoutService.php',
        'sp_private_key' => $site->saml_keys['sp_private_key'],
        'sp_x509_certificate' => $site->saml_keys['sp_x509_certificate'],
        'idp_x509_certificate' => $site->saml_keys['idp_x509_certificate'],
      ];
    }

    $config_overrides['sp_entity_id'] = "urn:acquia:acsf:saml:sp:$sitegroup:$env:$site_id";
    $GLOBALS['config']['samlauth.authentication'] = $config_overrides;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['injectSamlConfig'];
    return $events;
  }

}
