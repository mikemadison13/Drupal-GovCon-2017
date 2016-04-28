<?php

/**
 * @file
 * Contains the 'taxonomy term' overridden argument validator plugin.
 */

/**
 * Validate whether an argument is an acceptable node.
 */
class views_plugin_argument_validate_cod_session extends views_plugin_argument_validate_taxonomy_term_machine_name {

  function option_definition() {
    $options = parent::option_definition();
    $options['og_vocab_only'] = array('default' => TRUE, 'bool' => TRUE);
    return $options;
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);

    // Unset vocabularies for machine name and tell end users that we use og_vocab
    $form['og_vocab_only'] = array(
      '#type' => 'checkbox',
      '#title' => t('Ignore vocabularies below and use only the associated conference vocabulary'),
      '#default_value' => $this->options['og_vocab_only'],
      '#weight' => -99,
    );
  }

  function validate_argument($argument) {
    $vocabularies = array_filter($this->options['vocabularies']);
    $type         = $this->options['type'];
    $transform    = $this->options['transform'];

    switch ($type) {
      case 'machine_name':
        $query = db_select('taxonomy_term_data', 'td');
        $query->leftJoin('taxonomy_vocabulary', 'tv', 'td.vid = tv.vid');
        $query->fields('td');
        $query->fields('tv', array('machine_name'));

        // If OG Vocab is enabled and checked as exclusive, only check OG vocab.
        if (module_exists('og_vocab') && isset($this->options['og_vocab_only']) && isset($this->view->argument['gid']) && $this->view->argument['gid']->table == 'og_membership') {
          $group_type = $this->view->base_table;
          $ogvr = og_vocab_relation_get_by_group($group_type, $this->view->argument['gid']->argument, TRUE);
          if (!empty($ogvr)) {
            $query->condition('tv.vid', $ogvr);
          }
        }
        else if (!empty($vocabularies)) {
          $query->condition('tv.machine_name', $vocabularies);
        }


        if ($transform) {
          $query->condition('td.machine_name', array(':name' => str_replace('-', '_', $argument)));
        }
        else {
          $query->condition('td.machine_name', $argument);
        }

        $term = $query->execute()->fetchObject();

        if ($term && (empty($vocabularies) || !empty($vocabularies[$term->machine_name]))) {
          $term = taxonomy_term_load($term->tid);

          $this->argument->real_field      = 'tid';
          $this->argument->argument        = $term->tid;
          $this->argument->validated_title = check_plain(entity_label('taxonomy_term', $term));

          return TRUE;
        }

        return FALSE;

      default:
        return parent::validate_argument($argument);
    }
  }
}
