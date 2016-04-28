<?php
/**
 * @file
 * cod_registration_email.features.field_instance.inc
 */

/**
 * Implements hook_field_default_field_instances().
 */
function cod_registration_email_field_default_field_instances() {
  $field_instances = array();

  // Exported field_instance: 'cod_email-ticket_cancelled-field_email_bcc'.
  $field_instances['cod_email-ticket_cancelled-field_email_bcc'] = array(
    'bundle' => 'ticket_cancelled',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_bcc',
    'label' => 'E-mail recipient BCC address',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 2,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_cancelled-field_email_body'.
  $field_instances['cod_email-ticket_cancelled-field_email_body'] = array(
    'bundle' => 'ticket_cancelled',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 4,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_body',
    'label' => 'Body',
    'required' => 0,
    'settings' => array(
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 5,
      ),
      'type' => 'text_textarea',
      'weight' => 5,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_cancelled-field_email_cc'.
  $field_instances['cod_email-ticket_cancelled-field_email_cc'] = array(
    'bundle' => 'ticket_cancelled',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_cc',
    'label' => 'E-mail recipient CC address',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 3,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_cancelled-field_email_from'.
  $field_instances['cod_email-ticket_cancelled-field_email_from'] = array(
    'bundle' => 'ticket_cancelled',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_from',
    'label' => 'E-mail Sender Address (FROM)',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 1,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_cancelled-field_email_subject'.
  $field_instances['cod_email-ticket_cancelled-field_email_subject'] = array(
    'bundle' => 'ticket_cancelled',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 3,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_subject',
    'label' => 'Subject',
    'required' => 1,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 4,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_cancelled-og_group_ref'.
  $field_instances['cod_email-ticket_cancelled-og_group_ref'] = array(
    'bundle' => 'ticket_cancelled',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'og_ui',
        'settings' => array(),
        'type' => 'og_list_default',
        'weight' => 5,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'og_group_ref',
    'label' => 'Groups audience',
    'required' => FALSE,
    'settings' => array(
      'behaviors' => array(
        'og_widget' => array(
          'admin' => array(
            'widget_type' => 'entityreference_autocomplete',
          ),
          'default' => array(
            'widget_type' => 'options_select',
          ),
          'status' => TRUE,
        ),
      ),
      'user_register_form' => FALSE,
    ),
    'view modes' => array(
      'full' => array(
        'custom settings' => FALSE,
        'label' => 'Full',
        'type' => 'og_list_default',
      ),
      'teaser' => array(
        'custom settings' => FALSE,
        'label' => 'Teaser',
        'type' => 'og_list_default',
      ),
    ),
    'widget' => array(
      'module' => 'field_extrawidgets',
      'settings' => array(
        'display_empty' => 0,
        'formatter' => '',
        'formatter_settings' => array(),
      ),
      'type' => 'field_extrawidgets_read_only',
      'weight' => 6,
    ),
  );

  // Exported field_instance:
  // 'cod_email-ticket_cancelled_attendee-field_email_bcc'.
  $field_instances['cod_email-ticket_cancelled_attendee-field_email_bcc'] = array(
    'bundle' => 'ticket_cancelled_attendee',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_bcc',
    'label' => 'E-mail recipient BCC address',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 36,
    ),
  );

  // Exported field_instance:
  // 'cod_email-ticket_cancelled_attendee-field_email_body'.
  $field_instances['cod_email-ticket_cancelled_attendee-field_email_body'] = array(
    'bundle' => 'ticket_cancelled_attendee',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 4,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_body',
    'label' => 'Body',
    'required' => 1,
    'settings' => array(
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 5,
      ),
      'type' => 'text_textarea',
      'weight' => 40,
    ),
  );

  // Exported field_instance:
  // 'cod_email-ticket_cancelled_attendee-field_email_cc'.
  $field_instances['cod_email-ticket_cancelled_attendee-field_email_cc'] = array(
    'bundle' => 'ticket_cancelled_attendee',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_cc',
    'label' => 'E-mail recipient CC address',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 34,
    ),
  );

  // Exported field_instance:
  // 'cod_email-ticket_cancelled_attendee-field_email_from'.
  $field_instances['cod_email-ticket_cancelled_attendee-field_email_from'] = array(
    'bundle' => 'ticket_cancelled_attendee',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_from',
    'label' => 'E-mail Sender Address (FROM)',
    'required' => 1,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 32,
    ),
  );

  // Exported field_instance:
  // 'cod_email-ticket_cancelled_attendee-field_email_subject'.
  $field_instances['cod_email-ticket_cancelled_attendee-field_email_subject'] = array(
    'bundle' => 'ticket_cancelled_attendee',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 3,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_subject',
    'label' => 'Subject',
    'required' => 1,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 38,
    ),
  );

  // Exported field_instance:
  // 'cod_email-ticket_cancelled_attendee-og_group_ref'.
  $field_instances['cod_email-ticket_cancelled_attendee-og_group_ref'] = array(
    'bundle' => 'ticket_cancelled_attendee',
    'default_value' => NULL,
    'default_value_function' => '',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'entityreference',
        'settings' => array(
          'link' => FALSE,
        ),
        'type' => 'entityreference_label',
        'weight' => 5,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'og_group_ref',
    'label' => 'Groups audience',
    'required' => 0,
    'settings' => array(
      'behaviors' => array(
        'prepopulate' => array(
          'status' => 0,
        ),
      ),
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'field_extrawidgets',
      'settings' => array(
        'display_empty' => 0,
        'formatter' => 'entityreference_label',
        'formatter_settings' => array(
          'link' => 0,
        ),
      ),
      'type' => 'field_extrawidgets_read_only',
      'weight' => 42,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_code-field_email_bcc'.
  $field_instances['cod_email-ticket_code-field_email_bcc'] = array(
    'bundle' => 'ticket_code',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Blind Carbon Copy (BCC) recipient for the invoice mails. Multiple addresses can be separated by comma (,) without whitespace. Leave empty if not used.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_bcc',
    'label' => 'E-mail recipient BCC address',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 32,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_code-field_email_body'.
  $field_instances['cod_email-ticket_code-field_email_body'] = array(
    'bundle' => 'ticket_code',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Body for the invoice mails. You may use tokens.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 3,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_body',
    'label' => 'Body',
    'required' => 1,
    'settings' => array(
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 10,
      ),
      'type' => 'text_textarea',
      'weight' => 34,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_code-field_email_cc'.
  $field_instances['cod_email-ticket_code-field_email_cc'] = array(
    'bundle' => 'ticket_code',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Carbon Copy (CC) recipient for the invoice mails. Multiple addresses can be separated by comma (,) without whitespace. Leave empty if not used.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_cc',
    'label' => 'E-mail recipient CC address',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 32,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_code-field_email_from'.
  $field_instances['cod_email-ticket_code-field_email_from'] = array(
    'bundle' => 'ticket_code',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'The E-mail sender (from) address. Defaults to the site mail address.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_from',
    'label' => 'E-mail Sender Address (FROM)',
    'required' => 1,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 31,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_code-field_email_subject'.
  $field_instances['cod_email-ticket_code-field_email_subject'] = array(
    'bundle' => 'ticket_code',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Subject for the invoice mails. You may use tokens.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_subject',
    'label' => 'Subject',
    'required' => 1,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 100,
      ),
      'type' => 'text_textfield',
      'weight' => 33,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_code-og_group_ref'.
  $field_instances['cod_email-ticket_code-og_group_ref'] = array(
    'bundle' => 'ticket_code',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'og_ui',
        'settings' => array(),
        'type' => 'og_list_default',
        'weight' => 5,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'og_group_ref',
    'label' => 'Groups audience',
    'required' => FALSE,
    'settings' => array(
      'behaviors' => array(
        'og_widget' => array(
          'admin' => array(
            'widget_type' => 'entityreference_autocomplete',
          ),
          'default' => array(
            'widget_type' => 'options_select',
          ),
          'status' => TRUE,
        ),
      ),
      'user_register_form' => FALSE,
    ),
    'view modes' => array(
      'full' => array(
        'custom settings' => FALSE,
        'label' => 'Full',
        'type' => 'og_list_default',
      ),
      'teaser' => array(
        'custom settings' => FALSE,
        'label' => 'Teaser',
        'type' => 'og_list_default',
      ),
    ),
    'widget' => array(
      'module' => 'field_extrawidgets',
      'settings' => array(
        'display_empty' => 0,
        'formatter' => '',
        'formatter_settings' => array(),
      ),
      'type' => 'field_extrawidgets_read_only',
      'weight' => 36,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_redeemed-field_email_bcc'.
  $field_instances['cod_email-ticket_redeemed-field_email_bcc'] = array(
    'bundle' => 'ticket_redeemed',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Blind Carbon Copy (BCC) recipient for the invoice mails. Multiple addresses can be separated by comma (,) without whitespace. Leave empty if not used.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_bcc',
    'label' => 'E-mail recipient BCC address',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 32,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_redeemed-field_email_body'.
  $field_instances['cod_email-ticket_redeemed-field_email_body'] = array(
    'bundle' => 'ticket_redeemed',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Body for the invoice mails. You may use tokens.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 3,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_body',
    'label' => 'Body',
    'required' => 1,
    'settings' => array(
      'text_processing' => 1,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 10,
      ),
      'type' => 'text_textarea',
      'weight' => 34,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_redeemed-field_email_cc'.
  $field_instances['cod_email-ticket_redeemed-field_email_cc'] = array(
    'bundle' => 'ticket_redeemed',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Carbon Copy (CC) recipient for the invoice mails. Multiple addresses can be separated by comma (,) without whitespace. Leave empty if not used.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 1,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_cc',
    'label' => 'E-mail recipient CC address',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 32,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_redeemed-field_email_from'.
  $field_instances['cod_email-ticket_redeemed-field_email_from'] = array(
    'bundle' => 'ticket_redeemed',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'The E-mail sender (from) address. Defaults to the site mail address.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_from',
    'label' => 'E-mail Sender Address (FROM)',
    'required' => 1,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 60,
      ),
      'type' => 'text_textfield',
      'weight' => 31,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_redeemed-field_email_subject'.
  $field_instances['cod_email-ticket_redeemed-field_email_subject'] = array(
    'bundle' => 'ticket_redeemed',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'Subject for the invoice mails. You may use tokens.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 2,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'field_email_subject',
    'label' => 'Subject',
    'required' => 1,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'size' => 100,
      ),
      'type' => 'text_textfield',
      'weight' => 33,
    ),
  );

  // Exported field_instance: 'cod_email-ticket_redeemed-og_group_ref'.
  $field_instances['cod_email-ticket_redeemed-og_group_ref'] = array(
    'bundle' => 'ticket_redeemed',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'og_ui',
        'settings' => array(),
        'type' => 'og_list_default',
        'weight' => 5,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_email',
    'field_name' => 'og_group_ref',
    'label' => 'Groups audience',
    'required' => FALSE,
    'settings' => array(
      'behaviors' => array(
        'og_widget' => array(
          'admin' => array(
            'widget_type' => 'entityreference_autocomplete',
          ),
          'default' => array(
            'widget_type' => 'options_select',
          ),
          'status' => TRUE,
        ),
      ),
      'user_register_form' => FALSE,
    ),
    'view modes' => array(
      'full' => array(
        'custom settings' => FALSE,
        'label' => 'Full',
        'type' => 'og_list_default',
      ),
      'teaser' => array(
        'custom settings' => FALSE,
        'label' => 'Teaser',
        'type' => 'og_list_default',
      ),
    ),
    'widget' => array(
      'module' => 'field_extrawidgets',
      'settings' => array(
        'display_empty' => 0,
        'formatter' => '',
        'formatter_settings' => array(),
      ),
      'type' => 'field_extrawidgets_read_only',
      'weight' => 36,
    ),
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('Blind Carbon Copy (BCC) recipient for the invoice mails. Multiple addresses can be separated by comma (,) without whitespace. Leave empty if not used.');
  t('Body');
  t('Body for the invoice mails. You may use tokens.');
  t('Carbon Copy (CC) recipient for the invoice mails. Multiple addresses can be separated by comma (,) without whitespace. Leave empty if not used.');
  t('E-mail Sender Address (FROM)');
  t('E-mail recipient BCC address');
  t('E-mail recipient CC address');
  t('Groups audience');
  t('Subject');
  t('Subject for the invoice mails. You may use tokens.');
  t('The E-mail sender (from) address. Defaults to the site mail address.');

  return $field_instances;
}
