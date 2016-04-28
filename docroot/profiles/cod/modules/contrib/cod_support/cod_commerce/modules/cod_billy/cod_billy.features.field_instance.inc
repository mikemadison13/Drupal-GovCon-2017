<?php
/**
 * @file
 * cod_billy.features.field_instance.inc
 */

/**
 * Implements hook_field_default_field_instances().
 */
function cod_billy_field_default_field_instances() {
  $field_instances = array();

  // Exported field_instance:
  // 'cod_commerce_billy-cod_commerce_billy-field_billy_css'.
  $field_instances['cod_commerce_billy-cod_commerce_billy-field_billy_css'] = array(
    'bundle' => 'cod_commerce_billy',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => 'One CSS file per line.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 5,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_commerce_billy',
    'field_name' => 'field_billy_css',
    'label' => 'Inline CSS files',
    'required' => 0,
    'settings' => array(
      'text_processing' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'text',
      'settings' => array(
        'rows' => 5,
      ),
      'type' => 'text_textarea',
      'weight' => 7,
    ),
  );

  // Exported field_instance:
  // 'cod_commerce_billy-cod_commerce_billy-field_billy_date_format'.
  $field_instances['cod_commerce_billy-cod_commerce_billy-field_billy_date_format'] = array(
    'bundle' => 'cod_commerce_billy',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'text',
        'settings' => array(),
        'type' => 'text_default',
        'weight' => 7,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_commerce_billy',
    'field_name' => 'field_billy_date_format',
    'label' => 'Date Format',
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

  // Exported field_instance:
  // 'cod_commerce_billy-cod_commerce_billy-field_billy_invoice_footer'.
  $field_instances['cod_commerce_billy-cod_commerce_billy-field_billy_invoice_footer'] = array(
    'bundle' => 'cod_commerce_billy',
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
    'entity_type' => 'cod_commerce_billy',
    'field_name' => 'field_billy_invoice_footer',
    'label' => 'Invoice Footer',
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

  // Exported field_instance:
  // 'cod_commerce_billy-cod_commerce_billy-field_billy_invoice_header'.
  $field_instances['cod_commerce_billy-cod_commerce_billy-field_billy_invoice_header'] = array(
    'bundle' => 'cod_commerce_billy',
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
    'entity_type' => 'cod_commerce_billy',
    'field_name' => 'field_billy_invoice_header',
    'label' => 'Invoice Header',
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
      'weight' => 1,
    ),
  );

  // Exported field_instance:
  // 'cod_commerce_billy-cod_commerce_billy-field_billy_invoice_location'.
  $field_instances['cod_commerce_billy-cod_commerce_billy-field_billy_invoice_location'] = array(
    'bundle' => 'cod_commerce_billy',
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
    'entity_type' => 'cod_commerce_billy',
    'field_name' => 'field_billy_invoice_location',
    'label' => 'Location',
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

  // Exported field_instance:
  // 'cod_commerce_billy-cod_commerce_billy-field_billy_invoice_text'.
  $field_instances['cod_commerce_billy-cod_commerce_billy-field_billy_invoice_text'] = array(
    'bundle' => 'cod_commerce_billy',
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
    'entity_type' => 'cod_commerce_billy',
    'field_name' => 'field_billy_invoice_text',
    'label' => 'Invoice Text',
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
      'weight' => 4,
    ),
  );

  // Exported field_instance:
  // 'cod_commerce_billy-cod_commerce_billy-field_billy_logo'.
  $field_instances['cod_commerce_billy-cod_commerce_billy-field_billy_logo'] = array(
    'bundle' => 'cod_commerce_billy',
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'file',
        'settings' => array(),
        'type' => 'file_default',
        'weight' => 4,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_commerce_billy',
    'field_name' => 'field_billy_logo',
    'label' => 'Logo',
    'required' => 0,
    'settings' => array(
      'description_field' => 0,
      'file_directory' => 'invoices',
      'file_extensions' => 'jpg jpeg png gif svg',
      'max_filesize' => '',
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'file',
      'settings' => array(
        'progress_indicator' => 'throbber',
      ),
      'type' => 'file_generic',
      'weight' => 6,
    ),
  );

  // Exported field_instance:
  // 'cod_commerce_billy-cod_commerce_billy-og_group_ref'.
  $field_instances['cod_commerce_billy-cod_commerce_billy-og_group_ref'] = array(
    'bundle' => 'cod_commerce_billy',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'og_ui',
        'settings' => array(),
        'type' => 'og_list_default',
        'weight' => 6,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'cod_commerce_billy',
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
      'weight' => 8,
    ),
  );

  // Exported field_instance: 'cod_email-billy-field_billy_attach_pdf'.
  $field_instances['cod_email-billy-field_billy_attach_pdf'] = array(
    'bundle' => 'billy',
    'default_value' => array(
      0 => array(
        'value' => 0,
      ),
    ),
    'deleted' => 0,
    'description' => 'Send the Billy PDF invoice attached.<br>
<strong>Important:</strong> You need to enable commerce_billy_pdf and check your status page to see if you meet the requirements for an attachment handling email library like
<a href="https://www.drupal.org/project/mimemail">Mimemail</a>.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'list',
        'settings' => array(),
        'type' => 'list_default',
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
    'field_name' => 'field_billy_attach_pdf',
    'label' => 'Attach PDF invoice ',
    'required' => 0,
    'settings' => array(
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'options',
      'settings' => array(
        'display_label' => 1,
      ),
      'type' => 'options_onoff',
      'weight' => 6,
    ),
  );

  // Exported field_instance: 'cod_email-billy-field_email_bcc'.
  $field_instances['cod_email-billy-field_email_bcc'] = array(
    'bundle' => 'billy',
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
      'weight' => 3,
    ),
  );

  // Exported field_instance: 'cod_email-billy-field_email_body'.
  $field_instances['cod_email-billy-field_email_body'] = array(
    'bundle' => 'billy',
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
      'weight' => 5,
    ),
  );

  // Exported field_instance: 'cod_email-billy-field_email_cc'.
  $field_instances['cod_email-billy-field_email_cc'] = array(
    'bundle' => 'billy',
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
      'weight' => 2,
    ),
  );

  // Exported field_instance: 'cod_email-billy-field_email_from'.
  $field_instances['cod_email-billy-field_email_from'] = array(
    'bundle' => 'billy',
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
      'weight' => 1,
    ),
  );

  // Exported field_instance: 'cod_email-billy-field_email_subject'.
  $field_instances['cod_email-billy-field_email_subject'] = array(
    'bundle' => 'billy',
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
      'weight' => 4,
    ),
  );

  // Exported field_instance: 'cod_email-billy-og_group_ref'.
  $field_instances['cod_email-billy-og_group_ref'] = array(
    'bundle' => 'billy',
    'default_value' => NULL,
    'deleted' => 0,
    'description' => '',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'module' => 'og_ui',
        'settings' => array(),
        'type' => 'og_list_default',
        'weight' => 6,
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
      'weight' => 7,
    ),
  );
  // Exported field_instance: 'cod_email-invoice_reminder-field_email_bcc'.
  $field_instances['cod_email-invoice_reminder-field_email_bcc'] = array(
    'bundle' => 'invoice_reminder',
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

  // Exported field_instance: 'cod_email-invoice_reminder-field_email_body'.
  $field_instances['cod_email-invoice_reminder-field_email_body'] = array(
    'bundle' => 'invoice_reminder',
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

  // Exported field_instance: 'cod_email-invoice_reminder-field_email_cc'.
  $field_instances['cod_email-invoice_reminder-field_email_cc'] = array(
    'bundle' => 'invoice_reminder',
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

  // Exported field_instance: 'cod_email-invoice_reminder-field_email_from'.
  $field_instances['cod_email-invoice_reminder-field_email_from'] = array(
    'bundle' => 'invoice_reminder',
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

  // Exported field_instance: 'cod_email-invoice_reminder-field_email_subject'.
  $field_instances['cod_email-invoice_reminder-field_email_subject'] = array(
    'bundle' => 'invoice_reminder',
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

  // Exported field_instance: 'cod_email-invoice_reminder-og_group_ref'.
  $field_instances['cod_email-invoice_reminder-og_group_ref'] = array(
    'bundle' => 'invoice_reminder',
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
  t('Attach PDF invoice ');
  t('Blind Carbon Copy (BCC) recipient for the invoice mails. Multiple addresses can be separated by comma (,) without whitespace. Leave empty if not used.');
  t('Body');
  t('Body for the invoice mails. You may use tokens.');
  t('Carbon Copy (CC) recipient for the invoice mails. Multiple addresses can be separated by comma (,) without whitespace. Leave empty if not used.');
  t('Date Format');
  t('E-mail Sender Address (FROM)');
  t('E-mail recipient BCC address');
  t('E-mail recipient CC address');
  t('Groups audience');
  t('Inline CSS files');
  t('Invoice Footer');
  t('Invoice Header');
  t('Invoice Text');
  t('Location');
  t('Logo');
  t('One CSS file per line.');
  t('Send the Billy PDF invoice attached.<br>
<strong>Important:</strong> You need to enable commerce_billy_pdf and check your status page to see if you meet the requirements for an attachment handling email library like
<a href="https://www.drupal.org/project/mimemail">Mimemail</a>.');
  t('Subject');
  t('Subject for the invoice mails. You may use tokens.');
  t('The E-mail sender (from) address. Defaults to the site mail address.');

  return $field_instances;
}
