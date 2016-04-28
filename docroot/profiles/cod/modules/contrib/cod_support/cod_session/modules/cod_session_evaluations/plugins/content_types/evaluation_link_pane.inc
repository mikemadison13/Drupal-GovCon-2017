<?php

/**
 * This plugin array is more or less self documenting
 */
$plugin = array(
  'title' => t('Session Evaluations Link'),
  'description' => t('Display schedule of particular day.'),
  'required context' => new ctools_context_required(t('Node'), 'node'),
  'single' => TRUE,
  'category' => array(t('Node'), -9),
  'render callback' => 'cod_session_evaluations_link_pane_render'
);

/**
* Run-time rendering of the body of the block (content type)
* See ctools_plugin_examples for more advanced info
*/
function cod_session_evaluations_link_pane_render($subtype, $conf, $panel_args, $context) {
  $block = new stdClass();

  if (!empty($context) && empty($context->data)) {
    return;
  }

  $node = isset($context->data) ? clone($context->data) : NULL;

  //sanity check -- we should only be posting on the session nodes. Return if its any other node or listing
  //todo -- probably want to be able add the link for a listing of nodes, but we can't at the moment
  //        since entities aren't loaded on anything but the full view
  if ($node->type != 'session' && $node->type != 'schedule_item') {
    return;
  }
  global $user;
  $account = $user;
  $bundle = $node->type;

  //lets check first that the session was accepted AND its the event has started
  if ($timeslot = $node->field_session_timeslot['und'][0]['entity']) {
    if (!empty($timeslot->field_timeslot_time[LANGUAGE_NONE][0]['target_id'])) {
      $time_slot = entity_load_single('cod_event_time', $timeslot->field_timeslot_time[LANGUAGE_NONE][0]['target_id']);
    }
  }
  //how could you evaluate a presentation if it wasn't ever scheduled?
  if(!isset($time_slot)) {
    return;
  }

  // How could you evaluate a presenatation if it never was accepted OR it hasn't occured yet?
  // Need to first set the time based on the site (default timezone) THEN reset
  // it to the timezone of the conference.
  if (isset($node->og_group_ref[LANGUAGE_NONE][0]['target_id']) && is_numeric($node->og_group_ref[LANGUAGE_NONE][0]['target_id'])) {
    $conference = node_load($node->og_group_ref[LANGUAGE_NONE][0]['target_id']);
    $current_conferece_time = new DateTime(date('Y-m-d H:i:s'));
    $current_conferece_time->setTimezone(new DateTimeZone($conference->field_dates[LANGUAGE_NONE][0]['timezone']));

    // Get the time for the session
    $session_start = new DateTime($time_slot->field_evttime_date[LANGUAGE_NONE][0]['value'], $current_conferece_time->getTimezone());
    if ($current_conferece_time < $session_start) {
      return;
    }
  }
  if(!($node->field_accepted[LANGUAGE_NONE][0]['value'])) {
    return;
  }
  // Hide the "Provide feedback on this session" links if the user has already
  // submitted a survey about this session.
  if (!cod_session_evaluations_user_reviewed_session($account->uid, $node->nid) && $node->type == $bundle) {
    if (user_is_logged_in()) {
      if (!cod_session_evaluations_user_is_speaker($account, $node)) {
        $link = l(variable_get('cod_session_evaluations_feedback_text', t('Provide feedback on this session')),
          'node/add/session-evaluation',
          array(
            'query' => array('field_eval_session' => $node->nid, 'destination' => $_GET['q']),
            'attributes' => array('class' => 'button-link'),
          ));
      }
    }
    else {
      $link = l('Log in to evaluate this session',
          'user/login',
          array('query' => array('destination' => $_GET['q']))
        );
    }

    if (isset($link)) {
      $block->content = $link;
    }
  }
  else {
    $block->content = t('Thanks for providing feedback on this session.');
  }
  return $block;
}

function cod_session_evaluations_evaluation_link_pane_content_type_edit_form($form, $form_state)  {
  $plugin = $form_state['plugin'];
  $subtype = $form_state['subtype'];
  $contexts = isset($form_state['contexts']) ? $form_state['contexts'] : NULL;
  $conf = $form_state['conf'];

  $add_submit = FALSE;
  if (!empty($subtype['required context']) && is_array($contexts)) {
    $form['context'] = ctools_context_selector($contexts, $subtype['required context'], isset($conf['context']) ? $conf['context'] : array());
    $add_submit = TRUE;
  }

  ctools_include('dependent');

  // Unless we're not allowed to override the title on this content type, add this
  // gadget to all panes.
  if (empty($plugin['no title override']) && empty($subtype['no title override'])) {
    $form['aligner_start'] = array(
      '#markup' => '<div class="option-text-aligner clearfix">',
    );
    $form['override_title'] = array(
      '#type' => 'checkbox',
      '#default_value' => isset($conf['override_title']) ? $conf['override_title'] : '',
      '#title' => t('Override title'),
      '#id' => 'override-title-checkbox',
    );
    $form['override_title_text'] = array(
      '#type' => 'textfield',
      '#default_value' => isset($conf['override_title_text']) ? $conf['override_title_text'] : '',
      '#size' => 35,
      '#id' => 'override-title-textfield',
      '#dependency' => array('override-title-checkbox' => array(1)),
      '#dependency_type' => 'hidden',
    );
    $form['override_title_heading'] = array(
      '#type' => 'select',
      '#default_value' => isset($conf['override_title_heading']) ? $conf['override_title_heading'] : 'h2',
      '#options' => array(
        'h1' => t('h1'),
        'h2' => t('h2'),
        'h3' => t('h3'),
        'h4' => t('h4'),
        'h5' => t('h5'),
        'h6' => t('h6'),
        'div' => t('div'),
        'span' => t('span'),
      ),
      '#id' => 'override-title-heading',
      '#dependency' => array('override-title-checkbox' => array(1)),
      '#dependency_type' => 'hidden',
    );

    $form['aligner_stop'] = array(
      '#markup' => '</div>',
    );
    if (is_array($contexts)) {
      $form['override_title_markup'] = array(
        '#prefix' => '<div class="description">',
        '#suffix' => '</div>',
        '#markup' => t('You may use %keywords from contexts, as well as %title to contain the original title.'),
      );
    }
    $add_submit = TRUE;
  }

  if ($add_submit) {
    // '#submit' is already set up due to the wizard.
    $form['#submit'][] = 'ctools_content_configure_form_defaults_submit';
  }
  return $form;
}
