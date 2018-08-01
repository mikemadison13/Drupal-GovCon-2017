<?php

namespace Drupal\openapi_swagger_ui\Controller;

/**
 * Swagger UI controller for JSON API documentation.
 */
class SwaggerUIJsonApiController extends SwaggerUIControllerBase {

  /**
   * {@inheritdoc}
   */
  protected $generator_plugin_id = 'jsonapi';
}
