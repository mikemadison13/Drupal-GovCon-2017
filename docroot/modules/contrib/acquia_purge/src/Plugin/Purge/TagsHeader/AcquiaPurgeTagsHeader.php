<?php

namespace Drupal\acquia_purge\Plugin\Purge\TagsHeader;

use Drupal\purge\Plugin\Purge\TagsHeader\TagsHeaderInterface;
use Drupal\purge\Plugin\Purge\TagsHeader\TagsHeaderBase;

/**
 * Exports the X-Acquia-Purge-Tags header.
 *
 * @PurgeTagsHeader(
 *   id = "acquiapurgetagsheader",
 *   header_name = "X-Acquia-Purge-Tags",
 * )
 */
class AcquiaPurgeTagsHeader extends TagsHeaderBase implements TagsHeaderInterface {

  /**
   * {@inheritdoc}
   */
  public function getValue(array $tags) {
    $hashes = [];
    foreach ($tags as $cache_tag) {
      $hashes[] = substr(md5($cache_tag), 0, 4);
    }
    return implode(' ', $hashes);
  }

}
