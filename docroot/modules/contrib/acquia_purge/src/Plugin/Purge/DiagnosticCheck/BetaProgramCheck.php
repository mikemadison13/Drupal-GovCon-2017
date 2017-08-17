<?php

namespace Drupal\acquia_purge\Plugin\Purge\DiagnosticCheck;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Site\Settings;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\purge\Plugin\Purge\DiagnosticCheck\DiagnosticCheckInterface;
use Drupal\purge\Plugin\Purge\DiagnosticCheck\DiagnosticCheckBase;
use Drupal\purge\Plugin\Purge\Processor\ProcessorsServiceInterface;
use Drupal\purge\Plugin\Purge\Queue\QueueServiceInterface;
use Drupal\purge\Plugin\Purge\Queuer\QueuersServiceInterface;

/**
 * Special check for the AP8 Beta Program (removed later).
 *
 * @PurgeDiagnosticCheck(
 *   id = "ap8_beta_program",
 *   title = @Translation("AP8 Beta Program"),
 *   description = @Translation(""),
 *   dependent_queue_plugins = {},
 *   dependent_purger_plugins = {"acquia_purge"}
 * )
 */
class BetaProgramCheck extends DiagnosticCheckBase implements DiagnosticCheckInterface {

  /**
   * A config object for the system performance configuration.
   *
   * @var \Drupal\Core\Config\Config
   */
  protected $config;

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The purge processors service.
   *
   * @var \Drupal\purge\Plugin\Purge\Processor\ProcessorsServiceInterface
   */
  protected $purgeProcessors;

  /**
   * The purge queue service.
   *
   * @var \Drupal\purge\Plugin\Purge\Queue\QueueServiceInterface
   */
  protected $purgeQueue;

  /**
   * The purge queuers service.
   *
   * @var \Drupal\purge\Plugin\Purge\Queuer\QueuersServiceInterface
   */
  protected $purgeQueuers;

  /**
   * @var \Drupal\Core\Site\Settings
   */
  protected $settings;

  /**
   * Constructs a BetaProgramCheck object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The factory for configuration objects.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   * @param \Drupal\purge\Plugin\Purge\Processor\ProcessorsServiceInterface $purge_processors
   *   The purge processors service.
   * @param \Drupal\purge\Plugin\Purge\Queue\QueueServiceInterface $purge_queue
   *   The purge queue service.
   * @param \Drupal\purge\Plugin\Purge\Queuer\QueuersServiceInterface $purge_queuers
   *   The purge queuers service.
   * @param \Drupal\Core\Site\Settings $settings
   *   Drupal site settings object.
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(ConfigFactoryInterface $config_factory, ModuleHandlerInterface $module_handler, ProcessorsServiceInterface $purge_processors, QueueServiceInterface $purge_queue, QueuersServiceInterface $purge_queuers, Settings $settings, array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->config = $config_factory->get('system.performance');
    $this->moduleHandler = $module_handler;
    $this->purgeProcessors = $purge_processors;
    $this->purgeQueue = $purge_queue;
    $this->purgeQueuers = $purge_queuers;
    $this->settings = $settings;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $container->get('config.factory'),
      $container->get('module_handler'),
      $container->get('purge.processors'),
      $container->get('purge.queue'),
      $container->get('purge.queuers'),
      $container->get('settings'),
      $configuration,
      $plugin_id,
      $plugin_definition
    );
  }

  /**
   * {@inheritdoc}
   */
  public function run() {

    // Check if the alpha and/or beta access token has been passed.
    $program_token_passed = FALSE;
    if (!is_null($secret = $this->settings->get('acquia_purge_alpha'))) {
      if (hash('sha256', $secret) == '6f7820107cf8e586a6164802153c9f22d41ebb3aa54c32f17c94be0482c6a0a8') {
        $program_token_passed = TRUE;
      }
    }
    if (!is_null($secret = $this->settings->get('acquia_purge_beta'))) {
      if (hash('sha256', $secret) == '3c49ba8ed87d547ed04b7e1a7abedbf35efb5258ab356f722650c1c68166f944') {
        $program_token_passed = TRUE;
      }
    }

    // If not passed, users will have to wait or participate our program.
    if (!$program_token_passed) {
      $this->recommendation = $this->t("Acquia Purge isn't ready for prime time yet. If you like bleeding-edge, you can consider joining our testing program by contacting Acquia Support!");
    return SELF::SEVERITY_ERROR;
    }

    // We're enforcing a very strict TTL for statistic gathering. Future
    // stable releases of AP won't have this, but during the beta program
    // it is vital to be able to see the effects in Varnish statistics.
    if ($this->config->get('cache.page.max_age') < 2764800) {
      $this->recommendation = $this->t("Program participants must configure Drupal's page cache maximum age to be one month at mininum!");
      return SELF::SEVERITY_ERROR;
    }

    // Test for various modules that we need present (for science baby!).
    if (!$this->moduleHandler->moduleExists('page_cache')) {
      $this->recommendation = $this->t("Program participants must enable the page_cache module in order for Acquia to be able to measure the full effects on its systems.");
      return SELF::SEVERITY_ERROR;
    }
    if ($this->moduleHandler->moduleExists('purge_queuer_url')) {
      $this->recommendation = $this->t("Program participants must not enable the URLs queuer (and module).");
      return SELF::SEVERITY_ERROR;
    }

    // Test for the existence of the tags queuer, to ensure we're queuing tags!
    if (!$this->purgeQueuers->get('coretags')) {
      $this->recommendation = $this->t("Program participants must enable the tags queuer.");
      return SELF::SEVERITY_ERROR;
    }

    // Test for the existence of the cron processor, so that its guaranteed that
    // there's a periodic check-in of the queue and no real queues stalling.
    if (!$this->purgeProcessors->get('cron')) {
      $this->recommendation = $this->t("Program participants must enable the cron processor.");
      return SELF::SEVERITY_ERROR;
    }

    // Test for the existence of the lateruntime processor, which runs on every
    // request. This provides a prime and hyperfast clearing experience, so that
    // no clients will notice any "content stuck in time" as there's no waiting
    // time. Added bonus is, that the lateruntime processor CAN be resource
    // intensive and therefore disruptive, so if this works without issues for
    // most client participates, we'll likely require it by default and by doing
    // so, create a really smooth experience.
    if (!$this->purgeProcessors->get('lateruntime')) {
      $this->recommendation = $this->t("Program participants must enable the late runtime processor.");
      return SELF::SEVERITY_ERROR;
    }

    // Enforce the database queue during the beta program.
    if (!in_array('database', $this->purgeQueue->getPluginsEnabled())) {
      $this->recommendation = $this->t("Program participants must use the database queue.");
      return SELF::SEVERITY_ERROR;
    }

    // All okay!
    $this->value = $this->t("Participating in the AP beta program!");
    return SELF::SEVERITY_OK;
  }

}
