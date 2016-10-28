<?php

namespace Drupal\purge_queuer_url\StackMiddleware;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Core\Cache\CacheableResponseInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\purge_queuer_url\TrafficRegistryInterface;

/**
 * Collects URLs for all passing traffic.
 */
class UrlRegistrar implements HttpKernelInterface {

  /**
   * The wrapped HTTP kernel.
   *
   * @var \Symfony\Component\HttpKernel\HttpKernelInterface
   */
  protected $httpKernel;

  /**
   * The traffic registry with the stored URLs and tags.
   *
   * @var \Drupal\purge_queuer_url\TrafficRegistryInterface
   */
  protected $registry;

  /**
   * Whether to override the hostname (string value) or keep as is (false).
   *
   * @var false|string
   */
  protected $host = FALSE;

  /**
   * Whether to override the scheme (string value) or keep as is (false).
   *
   * @var false|string
   */
  protected $scheme = FALSE;

  /**
   * Whether to queue paths (true) instead of URLs or not (false).
   *
   * @var true|false
   */
  protected $queue_paths = NULL;

  /**
   * Constructs a UrlRegistrar object.
   *
   * @param \Symfony\Component\HttpKernel\HttpKernelInterface $http_kernel
   *   The decorated kernel.
   * @param \Drupal\purge_queuer_url\TrafficRegistryInterface $registry
   *   The traffic registry with the stored URLs and tags.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The factory for configuration objects.
   */
  public function __construct(HttpKernelInterface $http_kernel, TrafficRegistryInterface $registry, ConfigFactoryInterface $config_factory) {
    $this->httpKernel = $http_kernel;
    $this->registry = $registry;

    // Take the configured settings from our configuration object.
    $settings = $config_factory->get('purge_queuer_url.settings');
    $this->queue_paths = $settings->get('queue_paths');
    if ($settings->get('host_override')) {
      $this->host = $settings->get('host');
    }
    if ($settings->get('scheme_override')) {
      $this->scheme = $settings->get('scheme');
    }
  }

  /**
   * Decide whether to register this response.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   A Request object.
   * @param \Symfony\Component\HttpFoundation\Response $response
   *   A Response object.
   *
   * @return bool
   *   Whether to register this response or not.
   */
  protected function decide(Request $request, Response $response) {
    if (!($response instanceof CacheableResponseInterface)) {
      return FALSE;
    }

    // When page_cache is enabled, skip HITs to prevent running code twice.
    if ($cached = $response->headers->get('X-Drupal-Cache')) {
      if ($cached === 'HIT') {
        return FALSE;
      }
    }

    // Don't gather responses that aren't going to be useful.
    if (!count($response->getCacheableMetadata()->getCacheTags())) {
      return FALSE;
    }

    // Don't gather responses with dynamic elements in them.
    if (!$response->getMaxAge()) {
      return FALSE;
    }

    // Only allow ordinary responses, so prevent collecting 403's and redirects.
    if ($response->getStatusCode() !== 200) {
      return FALSE;
    }

    return TRUE;
  }

  /**
   * Generates the URL or path to register.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   A request object.
   *
   * @return string
   *   The URL or path to register.
   */
  protected function generateUrlOrPathToRegister(Request $request) {
    if (NULL !== $qs = $request->getQueryString()) {
      $qs = '?' . $qs;
    }
    $scheme = ($this->scheme == FALSE) ? $request->getScheme() : $this->scheme;
    $host = ($this->host == FALSE) ? $request->getHttpHost() : $this->host;
    $path = $request->getBaseUrl() . $request->getPathInfo() . $qs;

    if ($this->queue_paths) {
      return ltrim($path, '/');
    }
    else {
      return $scheme . '://' . $host . $path;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = TRUE) {
    $response = $this->httpKernel->handle($request, $type, $catch);
    if ($this->decide($request, $response)) {
      $this->registry->add(
        $this->generateUrlOrPathToRegister($request),
        $response->getCacheableMetadata()->getCacheTags()
      );
    }
    return $response;
  }

}
