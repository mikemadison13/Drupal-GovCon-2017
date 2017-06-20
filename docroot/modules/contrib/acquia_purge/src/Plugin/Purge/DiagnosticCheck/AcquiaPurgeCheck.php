<?php

namespace Drupal\acquia_purge\Plugin\Purge\DiagnosticCheck;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\purge\Plugin\Purge\DiagnosticCheck\DiagnosticCheckInterface;
use Drupal\purge\Plugin\Purge\DiagnosticCheck\DiagnosticCheckBase;
use Drupal\purge\Plugin\Purge\Purger\PurgersServiceInterface;

/**
 * Acquia Purge.
 *
 * @PurgeDiagnosticCheck(
 *   id = "acquia_purge",
 *   title = @Translation("Acquia Purge"),
 *   description = @Translation("Reports on the Acquia Purge module."),
 *   dependent_queue_plugins = {},
 *   dependent_purger_plugins = {}
 * )
 */
class AcquiaPurgeCheck extends DiagnosticCheckBase implements DiagnosticCheckInterface {

  /**
   * @var \Drupal\purge\Plugin\Purge\Purger\PurgersServiceInterface
   */
  protected $purgePurgers;

  /**
   * Constructs a AcquiaCloudCheck object.
   *
   * @param \Drupal\purge\Plugin\Purge\Purger\PurgersServiceInterface $purge_purgers
   *   The purge purgers service.
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(PurgersServiceInterface $purge_purgers, array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->purgePurgers = $purge_purgers;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $container->get('purge.purgers'),
      $configuration,
      $plugin_id,
      $plugin_definition
    );
  }

  /**
   * {@inheritdoc}
   */
  public function run() {

    // Report when the Acquia Purge purger isn't added.
    if (in_array('acquia_purge', $this->purgePurgers->getPluginsAvailable())) {
      $this->recommendation = $this->t("Please add the 'Acquia Cloud' purger!");
      return SELF::SEVERITY_WARNING;
    }

    // Report the module version.
    $v = system_get_info('module', 'acquia_purge')['version'];
    $this->recommendation = is_null($v) ? $this->t("Development version.") : $v;
    return SELF::SEVERITY_OK;
  }

}
