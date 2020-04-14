<?php

namespace Drupal\core_context;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Entity\EntityDisplayRepositoryInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\Context\ContextProviderInterface;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Provides contexts stored in an entity when viewing it at its canonical route.
 */
final class EntityRouteProvider implements ContextProviderInterface {

  use CacheableContextTrait;

  /**
   * The route match service.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  private $routeMatch;

  /**
   * The entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  private $entityTypeManager;

  /**
   * The entity display repository service.
   *
   * @var \Drupal\Core\Entity\EntityDisplayRepositoryInterface
   */
  private $entityDisplayRepository;

  /**
   * EntityRouteProvider constructor.
   *
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The route match service.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager service.
   * @param \Drupal\Core\Entity\EntityDisplayRepositoryInterface $entity_display_repository
   *   The entity display repository service.
   */
  public function __construct(RouteMatchInterface $route_match, EntityTypeManagerInterface $entity_type_manager, EntityDisplayRepositoryInterface $entity_display_repository) {
    $this->routeMatch = $route_match;
    $this->entityTypeManager = $entity_type_manager;
    $this->entityDisplayRepository = $entity_display_repository;
  }

  /**
   * Extracts contexts from an entity.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The entity from which to extract contexts.
   *
   * @return \Drupal\Component\Plugin\Context\ContextInterface[]
   *   The contexts extracted from the entity.
   */
  private function getContextsFromEntity(EntityInterface $entity) {
    $entity_type = $entity->getEntityType();

    if ($entity_type->hasHandlerClass('context')) {
      return $this->entityTypeManager->getHandler($entity_type->id(), 'context')
        ->getContexts($entity);
    }
    return [];
  }

  /**
   * Determines the entity type and view mode for the current route.
   *
   * This context provider expects to be on a canonical entity route. That means
   * we expect it to have an _entity_view default which carries the entity type
   * being viewed, and the view mode being used, separated by a period. Certain
   * routes (like entity.node.canonical) don't have this, so our route
   * subscriber adds a _core_context_entity default which contains the required
   * information.
   *
   * We also handle the special case of Layout Builder's entity-specific editing
   * UI, which we can identify using the _entity_form default (it will carry a
   * value of ENTITY_TYPE_ID.layout_builder).
   *
   * @see \Drupal\core_context\Routing\RouteSubscriber::alterRoutes()
   * @see \Drupal\layout_builder\Routing\LayoutBuilderRoutesTrait
   *
   * @return string|null
   *   The entity type ID and view mode of the current route, separated by a
   *   period, or NULL if we are not on an entity route.
   */
  private function getEntityTypeAndViewModeFromRoute() {
    // If we don't even know what route we're on, there's nothing we can do.
    $route = $this->routeMatch->getRouteObject();
    if (empty($route)) {
      return NULL;
    }

    $default = $route->getDefault('_core_context_entity') ?: $route->getDefault('_entity_view');
    if (strpos((string) $default, '.') > 0) {
      return $default;
    }

    $matched = [];
    $default = (string) $route->getDefault('_entity_form');
    if (preg_match('/([a-zA-Z0-9_]+)\.layout_builder$/', $default, $matched)) {
      // For now, we can (more or less) assume that 'full' is the canonical view
      // mode.
      // @see \Drupal\layout_builder\Form\LayoutBuilderEntityViewDisplayForm::isCanonicalMode()
      return $matched[1] . '.full';
    }

    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getRuntimeContexts(array $unqualified_context_ids) {
    $contexts = [];

    $default = $this->getEntityTypeAndViewModeFromRoute();
    if ($default) {
      list ($entity_type_id, $view_mode) = explode('.', $default);

      $entity = $this->routeMatch->getParameter($entity_type_id);
      $contexts = array_merge($contexts, $this->getContextsFromEntity($entity));

      $display = $this->entityDisplayRepository->getViewDisplay($entity_type_id, $entity->bundle(), $view_mode);
      $contexts = array_merge($contexts, $this->getContextsFromEntity($display));
    }

    // Don't return contexts that aren't being specifically requested.
    if ($unqualified_context_ids) {
      $contexts = array_intersect_key($contexts, array_flip($unqualified_context_ids));
    }

    // Since the current route determines whether or not we have an entity
    // from which to extract contexts, we need to add the route cache context.
    $cache_metadata = new CacheableMetadata();
    $cache_metadata->addCacheContexts(['route']);

    return $this->applyCaching($contexts, $cache_metadata);
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailableContexts() {
    return $this->getRuntimeContexts([]);
  }

}
