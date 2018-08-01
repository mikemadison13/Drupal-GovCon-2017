<?php

namespace Drupal\openapi\ParamConverter;

use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\openapi\Plugin\openapi\OpenApiGeneratorManagerInterface;

use Drupal\Core\ParamConverter\ParamConverterInterface;
use Symfony\Component\Routing\Route;

/**
 * Defines a ParamConverter for Openapi Plugins.
 */
class OpenApiParamConverter implements ParamConverterInterface {

  /**
   * Current openapi generator plugin manager.
   *
   * @var \Drupal\Component\Plugin\PluginManagerInterface
   */
  public $openApiGeneratorManager;

  /**
   * Creates a new OpenApiParamConverter.
   *
   * @param \Drupal\Component\Plugin\PluginManagerInterface $open_api_generator_manager
   *   The current openapi generator plugin manager instance.
   */
  public function __construct(PluginManagerInterface $open_api_generator_manager) {
    $this->openApiGeneratorManager = $open_api_generator_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function convert($value, $definition, $name, array $defaults) {
    $generator = $this->openApiGeneratorManager->createInstance($value);
    return $generator;
  }

  /**
   * {@inheritdoc}
   */
  public function applies($definition, $name, Route $route) {
    return (!empty($definition['type']) && $definition['type'] == 'openapi_generator');
  }

}
