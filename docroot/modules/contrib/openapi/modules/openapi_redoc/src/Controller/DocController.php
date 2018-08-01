<?php

namespace Drupal\openapi_redoc\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Provides callback for generating docs page.
 */
class DocController extends ControllerBase {

  /**
   * The configuration object factory.
   *
   * @var \Symfony\Component\HttpFoundation\Request
   */
  protected $request;

  /**
   * Create a new DocController.
   *
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   Current request.
   */
  public function __construct(RequestStack $request_stack) {
    $this->request = $request_stack->getCurrentRequest();
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('request_stack'));
  }

  /**
   * Generates the doc page.
   *
   * @param string $api_module
   *   The API module.
   *
   * @return array
   *   A render array.
   */
  public function generateDocs($api_module) {
    $options = $this->request->get('options', []);
    $build = [
      '#theme' => 'redoc',
      '#openapi_url' => Url::fromRoute("openapi.download", ['openapi_generator' => $api_module], ['query' => ['_format' => 'json', 'options' => $options]])->setAbsolute()->toString(),
    ];
    return $build;
  }

  /**
   * Gets the page title.
   *
   * @param string $api_module
   *   The API module.
   *
   * @return string
   *   The title.
   */
  public function getTitle($api_module) {
    $title = '';
    // @todo Support $options in title.
    if ($api_module === 'jsonapi') {
      $title = 'JSON API documentation';
    }
    elseif ($api_module === 'rest') {
      $title = 'REST API documentation';
    }
    return $title;
  }

}
