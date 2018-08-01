<?php

namespace Drupal\openapi_swagger_ui\Controller;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Url;
use Drupal\openapi\RestInspectionTrait;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Controller for REST documentation.
 */
class SwaggerUIRestController extends SwaggerUIControllerBase {

  use RestInspectionTrait;

  /**
   * {@inheritdoc}
   */
  protected $generator_plugin_id = 'rest';

  /**
   * Constructs a new SwaggerController object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request
   *   The request.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, RequestStack $request) {
    parent::__construct($entity_type_manager, $request);
    $this->entityTypeManager = $entity_type_manager;
    $this->request = $request;
  }

  /**
   * List all REST Doc pages.
   */
  public function listResources() {
    $return['pages_heading'] = [
      '#type' => 'markup',
      '#markup' => '<h2>' . $this->t('Documentation Pages') . '</h2>',
    ];

    // @todo Implement non entity doc page.
    foreach ($this->getRestEnabledEntityTypes() as $entity_type_id => $entity_type) {
      if ($bundle_type = $entity_type->getBundleEntityType()) {
        $bundle_storage = $this->entityTypeManager->getStorage($bundle_type);
        /** @var \Drupal\Core\Config\Entity\ConfigEntityBundleBase[] $bundles */
        $bundles = $bundle_storage->loadMultiple();
        $bundle_links = [];
        foreach ($bundles as $bundle_name => $bundle) {
          $bundle_links[$bundle_name] = [
            'title' => $bundle->label(),
            'url' => Url::fromRoute('openapi.swagger_ui.rest',
              [],
              [
                'query' => [
                  'options' =>
                    [
                      'entity_type_id' => $entity_type_id,
                      'bundle_name' => $bundle_name,
                    ],
                ],
              ]
            ),
          ];
        }
        $return[$entity_type_id] = [
          '#theme' => 'links',
          '#links' => $bundle_links,
          '#heading' => [
            'text' => $this->t('@entity_type bundles', ['@entity_type' => $entity_type->getLabel()]),
            'level' => 'h3',
          ],
        ];
      }
    }
    return $return;
  }

}
