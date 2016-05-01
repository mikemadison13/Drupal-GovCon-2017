<?php
/**
 * @file
 * cod_commerce.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function cod_commerce_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'cod_commerce_discounts';
  $view->description = 'Display a list of discounts for store admin.';
  $view->tag = 'default';
  $view->base_table = 'commerce_discount';
  $view->human_name = 'Conference Discounts';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'label' => 'label',
    'type_1' => 'type_1',
    'type' => 'type',
    'status' => 'status',
    'commerce_discount_date' => 'commerce_discount_date',
    'commerce_discount_date_1' => 'commerce_discount_date_1',
    'operations_dropbutton' => 'operations_dropbutton',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'label' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'type_1' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'type' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'commerce_discount_usage' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'status' => array(
      'sortable' => 1,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'commerce_discount_date' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'commerce_discount_date_1' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'operations_dropbutton' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['empty_table'] = TRUE;
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['area']['id'] = 'area';
  $handler->display->display_options['empty']['area']['table'] = 'views';
  $handler->display->display_options['empty']['area']['field'] = 'area';
  $handler->display->display_options['empty']['area']['content'] = 'No discounts found.';
  /* Relationship: Entity Reference: Referenced Entity */
  $handler->display->display_options['relationships']['commerce_discount_offer_target_id']['id'] = 'commerce_discount_offer_target_id';
  $handler->display->display_options['relationships']['commerce_discount_offer_target_id']['table'] = 'field_data_commerce_discount_offer';
  $handler->display->display_options['relationships']['commerce_discount_offer_target_id']['field'] = 'commerce_discount_offer_target_id';
  $handler->display->display_options['relationships']['commerce_discount_offer_target_id']['required'] = TRUE;
  /* Field: Commerce Discount: Admin title */
  $handler->display->display_options['fields']['label']['id'] = 'label';
  $handler->display->display_options['fields']['label']['table'] = 'commerce_discount';
  $handler->display->display_options['fields']['label']['field'] = 'label';
  $handler->display->display_options['fields']['label']['label'] = 'Name';
  /* Field: Commerce Discount Offer: Type */
  $handler->display->display_options['fields']['type_1']['id'] = 'type_1';
  $handler->display->display_options['fields']['type_1']['table'] = 'commerce_discount_offer';
  $handler->display->display_options['fields']['type_1']['field'] = 'type';
  $handler->display->display_options['fields']['type_1']['relationship'] = 'commerce_discount_offer_target_id';
  $handler->display->display_options['fields']['type_1']['label'] = 'Offer';
  /* Field: Commerce Discount: Type */
  $handler->display->display_options['fields']['type']['id'] = 'type';
  $handler->display->display_options['fields']['type']['table'] = 'commerce_discount';
  $handler->display->display_options['fields']['type']['field'] = 'type';
  $handler->display->display_options['fields']['type']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['type']['alter']['text'] = '<span>[type]</span>';
  /* Field: Commerce Discount: Analytics */
  $handler->display->display_options['fields']['commerce_discount_usage']['id'] = 'commerce_discount_usage';
  $handler->display->display_options['fields']['commerce_discount_usage']['table'] = 'commerce_discount';
  $handler->display->display_options['fields']['commerce_discount_usage']['field'] = 'commerce_discount_usage';
  /* Field: Commerce Discount: Status */
  $handler->display->display_options['fields']['status']['id'] = 'status';
  $handler->display->display_options['fields']['status']['table'] = 'commerce_discount';
  $handler->display->display_options['fields']['status']['field'] = 'status';
  $handler->display->display_options['fields']['status']['type'] = 'active-disabled';
  $handler->display->display_options['fields']['status']['not'] = 0;
  /* Field: Commerce Discount: Operations */
  $handler->display->display_options['fields']['operations_dropbutton']['id'] = 'operations_dropbutton';
  $handler->display->display_options['fields']['operations_dropbutton']['table'] = 'commerce_discount';
  $handler->display->display_options['fields']['operations_dropbutton']['field'] = 'operations_dropbutton';
  /* Field: Commerce Discount: Machine name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'commerce_discount';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  /* Contextual filter: Commerce Discount: Conference (commerce_discount_conference) */
  $handler->display->display_options['arguments']['commerce_discount_conference_target_id']['id'] = 'commerce_discount_conference_target_id';
  $handler->display->display_options['arguments']['commerce_discount_conference_target_id']['table'] = 'field_data_commerce_discount_conference';
  $handler->display->display_options['arguments']['commerce_discount_conference_target_id']['field'] = 'commerce_discount_conference_target_id';
  $handler->display->display_options['arguments']['commerce_discount_conference_target_id']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['commerce_discount_conference_target_id']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['commerce_discount_conference_target_id']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['commerce_discount_conference_target_id']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: Commerce Discount: Admin title */
  $handler->display->display_options['filters']['label']['id'] = 'label';
  $handler->display->display_options['filters']['label']['table'] = 'commerce_discount';
  $handler->display->display_options['filters']['label']['field'] = 'label';
  $handler->display->display_options['filters']['label']['operator'] = 'contains';
  $handler->display->display_options['filters']['label']['group'] = 1;
  $handler->display->display_options['filters']['label']['exposed'] = TRUE;
  $handler->display->display_options['filters']['label']['expose']['operator_id'] = 'label_op';
  $handler->display->display_options['filters']['label']['expose']['label'] = 'Name';
  $handler->display->display_options['filters']['label']['expose']['operator'] = 'label_op';
  $handler->display->display_options['filters']['label']['expose']['identifier'] = 'label';
  /* Filter criterion: Commerce Discount Offer: Type */
  $handler->display->display_options['filters']['type_1']['id'] = 'type_1';
  $handler->display->display_options['filters']['type_1']['table'] = 'commerce_discount_offer';
  $handler->display->display_options['filters']['type_1']['field'] = 'type';
  $handler->display->display_options['filters']['type_1']['relationship'] = 'commerce_discount_offer_target_id';
  $handler->display->display_options['filters']['type_1']['group'] = 1;
  $handler->display->display_options['filters']['type_1']['exposed'] = TRUE;
  $handler->display->display_options['filters']['type_1']['expose']['operator_id'] = 'type_1_op';
  $handler->display->display_options['filters']['type_1']['expose']['label'] = 'Offer';
  $handler->display->display_options['filters']['type_1']['expose']['operator'] = 'type_1_op';
  $handler->display->display_options['filters']['type_1']['expose']['identifier'] = 'type_1';
  /* Filter criterion: Commerce Discount: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'commerce_discount';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['group'] = 1;
  $handler->display->display_options['filters']['type']['exposed'] = TRUE;
  $handler->display->display_options['filters']['type']['expose']['operator_id'] = 'type_op';
  $handler->display->display_options['filters']['type']['expose']['label'] = 'Type';
  $handler->display->display_options['filters']['type']['expose']['operator'] = 'type_op';
  $handler->display->display_options['filters']['type']['expose']['identifier'] = 'type';
  /* Filter criterion: Commerce Discount: Status */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'commerce_discount';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 'All';
  $handler->display->display_options['filters']['status']['exposed'] = TRUE;
  $handler->display->display_options['filters']['status']['expose']['operator_id'] = '';
  $handler->display->display_options['filters']['status']['expose']['label'] = 'Active';
  $handler->display->display_options['filters']['status']['expose']['operator'] = 'status_op';
  $handler->display->display_options['filters']['status']['expose']['identifier'] = 'status';

  /* Display: Content pane */
  $handler = $view->new_display('panel_pane', 'Content pane', 'panel_pane_1');
  $handler->display->display_options['argument_input'] = array(
    'commerce_discount_conference_target_id' => array(
      'type' => 'context',
      'context' => 'entity:node.nid',
      'context_optional' => 1,
      'panel' => '0',
      'fixed' => '',
      'label' => 'Commerce Discount: Conference (commerce_discount_conference)',
    ),
  );
  $export['cod_commerce_discounts'] = $view;

  $view = new view();
  $view->name = 'cod_commerce_orders';
  $view->description = 'Display a list of orders for the store admin.';
  $view->tag = 'commerce';
  $view->base_table = 'commerce_order';
  $view->human_name = 'Conference Orders';
  $view->core = 0;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Defaults */
  $handler = $view->new_display('default', 'Defaults', 'default');
  $handler->display->display_options['title'] = 'Orders';
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'view any commerce_order entity';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['distinct'] = TRUE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '150';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'order_number' => 'order_number',
    'changed' => 'changed',
    'commerce_customer_address' => 'commerce_customer_address',
    'name' => 'name',
    'commerce_order_total' => 'commerce_order_total',
    'status' => 'status',
    'operations' => 'operations',
  );
  $handler->display->display_options['style_options']['default'] = 'changed';
  $handler->display->display_options['style_options']['info'] = array(
    'order_number' => array(
      'sortable' => 0,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'changed' => array(
      'sortable' => 1,
      'default_sort_order' => 'desc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'commerce_customer_address' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'name' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'commerce_order_total' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'status' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'operations' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['empty_table'] = TRUE;
  /* Header: Global: View order form */
  $handler->display->display_options['header']['view_order_form']['id'] = 'view_order_form';
  $handler->display->display_options['header']['view_order_form']['table'] = 'views';
  $handler->display->display_options['header']['view_order_form']['field'] = 'view_order_form';
  /* No results behavior: Commerce Order: Empty text */
  $handler->display->display_options['empty']['empty_text']['id'] = 'empty_text';
  $handler->display->display_options['empty']['empty_text']['table'] = 'commerce_order';
  $handler->display->display_options['empty']['empty_text']['field'] = 'empty_text';
  $handler->display->display_options['empty']['empty_text']['add_path'] = 'admin/commerce/orders/add';
  /* Relationship: Commerce Order: Owner */
  $handler->display->display_options['relationships']['uid']['id'] = 'uid';
  $handler->display->display_options['relationships']['uid']['table'] = 'commerce_order';
  $handler->display->display_options['relationships']['uid']['field'] = 'uid';
  /* Relationship: Commerce Order: Referenced customer profile */
  $handler->display->display_options['relationships']['commerce_customer_billing_profile_id']['id'] = 'commerce_customer_billing_profile_id';
  $handler->display->display_options['relationships']['commerce_customer_billing_profile_id']['table'] = 'field_data_commerce_customer_billing';
  $handler->display->display_options['relationships']['commerce_customer_billing_profile_id']['field'] = 'commerce_customer_billing_profile_id';
  /* Relationship: Commerce Order: Payment Transaction */
  $handler->display->display_options['relationships']['payment_transaction']['id'] = 'payment_transaction';
  $handler->display->display_options['relationships']['payment_transaction']['table'] = 'commerce_order';
  $handler->display->display_options['relationships']['payment_transaction']['field'] = 'payment_transaction';
  /* Relationship: OG membership: OG membership from Commerce Order */
  $handler->display->display_options['relationships']['og_membership_rel']['id'] = 'og_membership_rel';
  $handler->display->display_options['relationships']['og_membership_rel']['table'] = 'commerce_order';
  $handler->display->display_options['relationships']['og_membership_rel']['field'] = 'og_membership_rel';
  $handler->display->display_options['relationships']['og_membership_rel']['required'] = TRUE;
  /* Field: Commerce Order: Order number */
  $handler->display->display_options['fields']['order_number']['id'] = 'order_number';
  $handler->display->display_options['fields']['order_number']['table'] = 'commerce_order';
  $handler->display->display_options['fields']['order_number']['field'] = 'order_number';
  $handler->display->display_options['fields']['order_number']['link_to_order'] = 'admin';
  /* Field: Commerce Order: Created date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'commerce_order';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['date_format'] = 'date_no_time';
  $handler->display->display_options['fields']['created']['second_date_format'] = 'date_no_time';
  $handler->display->display_options['fields']['created']['format_date_sql'] = 0;
  /* Field: Commerce Order: Updated date */
  $handler->display->display_options['fields']['changed']['id'] = 'changed';
  $handler->display->display_options['fields']['changed']['table'] = 'commerce_order';
  $handler->display->display_options['fields']['changed']['field'] = 'changed';
  $handler->display->display_options['fields']['changed']['label'] = 'Updated';
  $handler->display->display_options['fields']['changed']['date_format'] = 'medium';
  /* Field: Commerce Customer profile: Address */
  $handler->display->display_options['fields']['commerce_customer_address']['id'] = 'commerce_customer_address';
  $handler->display->display_options['fields']['commerce_customer_address']['table'] = 'field_data_commerce_customer_address';
  $handler->display->display_options['fields']['commerce_customer_address']['field'] = 'commerce_customer_address';
  $handler->display->display_options['fields']['commerce_customer_address']['relationship'] = 'commerce_customer_billing_profile_id';
  $handler->display->display_options['fields']['commerce_customer_address']['label'] = 'Name';
  $handler->display->display_options['fields']['commerce_customer_address']['empty'] = '-';
  $handler->display->display_options['fields']['commerce_customer_address']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['commerce_customer_address']['click_sort_column'] = 'country';
  $handler->display->display_options['fields']['commerce_customer_address']['settings'] = array(
    'use_widget_handlers' => 0,
    'format_handlers' => array(
      'name-oneline' => 'name-oneline',
    ),
  );
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['relationship'] = 'uid';
  $handler->display->display_options['fields']['name']['label'] = 'User';
  /* Field: Commerce Order: Order total */
  $handler->display->display_options['fields']['commerce_order_total']['id'] = 'commerce_order_total';
  $handler->display->display_options['fields']['commerce_order_total']['table'] = 'field_data_commerce_order_total';
  $handler->display->display_options['fields']['commerce_order_total']['field'] = 'commerce_order_total';
  $handler->display->display_options['fields']['commerce_order_total']['label'] = 'Total';
  $handler->display->display_options['fields']['commerce_order_total']['click_sort_column'] = 'amount';
  $handler->display->display_options['fields']['commerce_order_total']['settings'] = array(
    'calculation' => FALSE,
  );
  /* Field: Commerce Order: Order status */
  $handler->display->display_options['fields']['status']['id'] = 'status';
  $handler->display->display_options['fields']['status']['table'] = 'commerce_order';
  $handler->display->display_options['fields']['status']['field'] = 'status';
  /* Field: Commerce Order: Operations links */
  $handler->display->display_options['fields']['operations']['id'] = 'operations';
  $handler->display->display_options['fields']['operations']['table'] = 'commerce_order';
  $handler->display->display_options['fields']['operations']['field'] = 'operations';
  $handler->display->display_options['fields']['operations']['label'] = 'Operations';
  $handler->display->display_options['fields']['operations']['exclude'] = TRUE;
  $handler->display->display_options['fields']['operations']['add_destination'] = 0;
  /* Field: Commerce Order: Invoice PDF */
  $handler->display->display_options['fields']['commerce_billy_pdf_invoice_link']['id'] = 'commerce_billy_pdf_invoice_link';
  $handler->display->display_options['fields']['commerce_billy_pdf_invoice_link']['table'] = 'views_entity_commerce_order';
  $handler->display->display_options['fields']['commerce_billy_pdf_invoice_link']['field'] = 'commerce_billy_pdf_invoice_link';
  $handler->display->display_options['fields']['commerce_billy_pdf_invoice_link']['label'] = 'Invoice';
  /* Field: Commerce Customer profile: Address - Company */
  $handler->display->display_options['fields']['commerce_customer_address_organisation_name']['id'] = 'commerce_customer_address_organisation_name';
  $handler->display->display_options['fields']['commerce_customer_address_organisation_name']['table'] = 'field_data_commerce_customer_address';
  $handler->display->display_options['fields']['commerce_customer_address_organisation_name']['field'] = 'commerce_customer_address_organisation_name';
  $handler->display->display_options['fields']['commerce_customer_address_organisation_name']['relationship'] = 'commerce_customer_billing_profile_id';
  $handler->display->display_options['fields']['commerce_customer_address_organisation_name']['label'] = 'Company';
  /* Field: Commerce Order: Discount reference */
  $handler->display->display_options['fields']['commerce_discounts']['id'] = 'commerce_discounts';
  $handler->display->display_options['fields']['commerce_discounts']['table'] = 'field_data_commerce_discounts';
  $handler->display->display_options['fields']['commerce_discounts']['field'] = 'commerce_discounts';
  $handler->display->display_options['fields']['commerce_discounts']['label'] = 'Discount';
  $handler->display->display_options['fields']['commerce_discounts']['settings'] = array(
    'link' => 0,
  );
  $handler->display->display_options['fields']['commerce_discounts']['delta_offset'] = '0';
  /* Field: Commerce Order: Order ID */
  $handler->display->display_options['fields']['order_id']['id'] = 'order_id';
  $handler->display->display_options['fields']['order_id']['table'] = 'commerce_order';
  $handler->display->display_options['fields']['order_id']['field'] = 'order_id';
  $handler->display->display_options['fields']['order_id']['label'] = 'Internal Order ID';
  /* Field: Bulk operations: Commerce Order */
  $handler->display->display_options['fields']['views_bulk_operations']['id'] = 'views_bulk_operations';
  $handler->display->display_options['fields']['views_bulk_operations']['table'] = 'commerce_order';
  $handler->display->display_options['fields']['views_bulk_operations']['field'] = 'views_bulk_operations';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['display_type'] = '0';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['enable_select_all_pages'] = 1;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['force_single'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['entity_load_capacity'] = '10';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_operations'] = array(
    'action::views_bulk_operations_delete_item' => array(
      'selected' => 1,
      'postpone_processing' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::system_send_email_action' => array(
      'selected' => 1,
      'postpone_processing' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'rules_component::rules_commerce_billy_set_to_canceled' => array(
      'selected' => 1,
      'postpone_processing' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
  );
  /* Contextual filter: Field: Conference (og_group_ref) */
  $handler->display->display_options['arguments']['og_group_ref_target_id']['id'] = 'og_group_ref_target_id';
  $handler->display->display_options['arguments']['og_group_ref_target_id']['table'] = 'og_membership';
  $handler->display->display_options['arguments']['og_group_ref_target_id']['field'] = 'og_group_ref_target_id';
  $handler->display->display_options['arguments']['og_group_ref_target_id']['relationship'] = 'og_membership_rel';
  $handler->display->display_options['arguments']['og_group_ref_target_id']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['og_group_ref_target_id']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['og_group_ref_target_id']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['og_group_ref_target_id']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['og_group_ref_target_id']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: Commerce Order: Order ID */
  $handler->display->display_options['filters']['order_id']['id'] = 'order_id';
  $handler->display->display_options['filters']['order_id']['table'] = 'commerce_order';
  $handler->display->display_options['filters']['order_id']['field'] = 'order_id';
  $handler->display->display_options['filters']['order_id']['group'] = 1;
  $handler->display->display_options['filters']['order_id']['exposed'] = TRUE;
  $handler->display->display_options['filters']['order_id']['expose']['operator_id'] = 'order_id_op';
  $handler->display->display_options['filters']['order_id']['expose']['label'] = 'Internal Order ID';
  $handler->display->display_options['filters']['order_id']['expose']['operator'] = 'order_id_op';
  $handler->display->display_options['filters']['order_id']['expose']['identifier'] = 'order_id';
  $handler->display->display_options['filters']['order_id']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Order: Name */
  $handler->display->display_options['filters']['uid']['id'] = 'uid';
  $handler->display->display_options['filters']['uid']['table'] = 'commerce_order';
  $handler->display->display_options['filters']['uid']['field'] = 'uid';
  $handler->display->display_options['filters']['uid']['value'] = '';
  $handler->display->display_options['filters']['uid']['group'] = 1;
  $handler->display->display_options['filters']['uid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['uid']['expose']['operator_id'] = 'uid_op';
  $handler->display->display_options['filters']['uid']['expose']['label'] = 'Username';
  $handler->display->display_options['filters']['uid']['expose']['operator'] = 'uid_op';
  $handler->display->display_options['filters']['uid']['expose']['identifier'] = 'uid';
  $handler->display->display_options['filters']['uid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Customer profile: Address - First name */
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['id'] = 'commerce_customer_address_first_name';
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['table'] = 'field_data_commerce_customer_address';
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['field'] = 'commerce_customer_address_first_name';
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['relationship'] = 'commerce_customer_billing_profile_id';
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['group'] = 1;
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['exposed'] = TRUE;
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['expose']['operator_id'] = 'commerce_customer_address_first_name_op';
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['expose']['label'] = 'First name';
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['expose']['operator'] = 'commerce_customer_address_first_name_op';
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['expose']['identifier'] = 'commerce_customer_address_first_name';
  $handler->display->display_options['filters']['commerce_customer_address_first_name']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Customer profile: Address - Last name */
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['id'] = 'commerce_customer_address_last_name';
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['table'] = 'field_data_commerce_customer_address';
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['field'] = 'commerce_customer_address_last_name';
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['relationship'] = 'commerce_customer_billing_profile_id';
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['group'] = 1;
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['exposed'] = TRUE;
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['expose']['operator_id'] = 'commerce_customer_address_last_name_op';
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['expose']['label'] = 'Last name';
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['expose']['operator'] = 'commerce_customer_address_last_name_op';
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['expose']['identifier'] = 'commerce_customer_address_last_name';
  $handler->display->display_options['filters']['commerce_customer_address_last_name']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Customer profile: Address - Company */
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['id'] = 'commerce_customer_address_organisation_name';
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['table'] = 'field_data_commerce_customer_address';
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['field'] = 'commerce_customer_address_organisation_name';
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['relationship'] = 'commerce_customer_billing_profile_id';
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['operator'] = 'contains';
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['group'] = 1;
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['exposed'] = TRUE;
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['expose']['operator_id'] = 'commerce_customer_address_organisation_name_op';
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['expose']['label'] = 'Company';
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['expose']['operator'] = 'commerce_customer_address_organisation_name_op';
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['expose']['identifier'] = 'commerce_customer_address_organisation_name';
  $handler->display->display_options['filters']['commerce_customer_address_organisation_name']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Order: Order state */
  $handler->display->display_options['filters']['state']['id'] = 'state';
  $handler->display->display_options['filters']['state']['table'] = 'commerce_order';
  $handler->display->display_options['filters']['state']['field'] = 'state';
  $handler->display->display_options['filters']['state']['operator'] = 'not in';
  $handler->display->display_options['filters']['state']['value'] = array(
    'cart' => 'cart',
    'checkout' => 'checkout',
  );
  $handler->display->display_options['filters']['state']['group'] = 1;
  $handler->display->display_options['filters']['state']['expose']['label'] = 'Order state';
  $handler->display->display_options['filters']['state']['expose']['use_operator'] = TRUE;
  $handler->display->display_options['filters']['state']['expose']['operator'] = 'state_op';
  $handler->display->display_options['filters']['state']['expose']['identifier'] = 'state';
  /* Filter criterion: Commerce Order: Discount reference (commerce_discounts) */
  $handler->display->display_options['filters']['commerce_discounts_target_id']['id'] = 'commerce_discounts_target_id';
  $handler->display->display_options['filters']['commerce_discounts_target_id']['table'] = 'field_data_commerce_discounts';
  $handler->display->display_options['filters']['commerce_discounts_target_id']['field'] = 'commerce_discounts_target_id';
  $handler->display->display_options['filters']['commerce_discounts_target_id']['group'] = 1;
  $handler->display->display_options['filters']['commerce_discounts_target_id']['exposed'] = TRUE;
  $handler->display->display_options['filters']['commerce_discounts_target_id']['expose']['operator_id'] = 'commerce_discounts_target_id_op';
  $handler->display->display_options['filters']['commerce_discounts_target_id']['expose']['label'] = 'Discount';
  $handler->display->display_options['filters']['commerce_discounts_target_id']['expose']['operator'] = 'commerce_discounts_target_id_op';
  $handler->display->display_options['filters']['commerce_discounts_target_id']['expose']['identifier'] = 'commerce_discounts_target_id';
  $handler->display->display_options['filters']['commerce_discounts_target_id']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Order: Created date */
  $handler->display->display_options['filters']['created']['id'] = 'created';
  $handler->display->display_options['filters']['created']['table'] = 'commerce_order';
  $handler->display->display_options['filters']['created']['field'] = 'created';
  $handler->display->display_options['filters']['created']['operator'] = 'between';
  $handler->display->display_options['filters']['created']['group'] = 1;
  $handler->display->display_options['filters']['created']['exposed'] = TRUE;
  $handler->display->display_options['filters']['created']['expose']['operator_id'] = 'created_op';
  $handler->display->display_options['filters']['created']['expose']['label'] = 'Created date';
  $handler->display->display_options['filters']['created']['expose']['use_operator'] = TRUE;
  $handler->display->display_options['filters']['created']['expose']['operator'] = 'created_op';
  $handler->display->display_options['filters']['created']['expose']['identifier'] = 'created';
  $handler->display->display_options['filters']['created']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Order: Updated date */
  $handler->display->display_options['filters']['changed']['id'] = 'changed';
  $handler->display->display_options['filters']['changed']['table'] = 'commerce_order';
  $handler->display->display_options['filters']['changed']['field'] = 'changed';
  $handler->display->display_options['filters']['changed']['operator'] = 'between';
  $handler->display->display_options['filters']['changed']['group'] = 1;
  $handler->display->display_options['filters']['changed']['exposed'] = TRUE;
  $handler->display->display_options['filters']['changed']['expose']['operator_id'] = 'changed_op';
  $handler->display->display_options['filters']['changed']['expose']['label'] = 'Updated date';
  $handler->display->display_options['filters']['changed']['expose']['operator'] = 'changed_op';
  $handler->display->display_options['filters']['changed']['expose']['identifier'] = 'changed';
  $handler->display->display_options['filters']['changed']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Order: Order status */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'commerce_order';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['exposed'] = TRUE;
  $handler->display->display_options['filters']['status']['expose']['operator_id'] = 'status_op';
  $handler->display->display_options['filters']['status']['expose']['label'] = 'Order status';
  $handler->display->display_options['filters']['status']['expose']['operator'] = 'status_op';
  $handler->display->display_options['filters']['status']['expose']['identifier'] = 'status';
  $handler->display->display_options['filters']['status']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Order: Order total (commerce_order_total:amount) */
  $handler->display->display_options['filters']['commerce_order_total_amount']['id'] = 'commerce_order_total_amount';
  $handler->display->display_options['filters']['commerce_order_total_amount']['table'] = 'field_data_commerce_order_total';
  $handler->display->display_options['filters']['commerce_order_total_amount']['field'] = 'commerce_order_total_amount';
  $handler->display->display_options['filters']['commerce_order_total_amount']['group'] = 1;
  $handler->display->display_options['filters']['commerce_order_total_amount']['exposed'] = TRUE;
  $handler->display->display_options['filters']['commerce_order_total_amount']['expose']['operator_id'] = 'commerce_order_total_amount_op';
  $handler->display->display_options['filters']['commerce_order_total_amount']['expose']['label'] = 'Order total';
  $handler->display->display_options['filters']['commerce_order_total_amount']['expose']['use_operator'] = TRUE;
  $handler->display->display_options['filters']['commerce_order_total_amount']['expose']['operator'] = 'commerce_order_total_amount_op';
  $handler->display->display_options['filters']['commerce_order_total_amount']['expose']['identifier'] = 'commerce_order_total_amount';
  $handler->display->display_options['filters']['commerce_order_total_amount']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Payment Transaction: Remote ID */
  $handler->display->display_options['filters']['remote_id']['id'] = 'remote_id';
  $handler->display->display_options['filters']['remote_id']['table'] = 'commerce_payment_transaction';
  $handler->display->display_options['filters']['remote_id']['field'] = 'remote_id';
  $handler->display->display_options['filters']['remote_id']['relationship'] = 'payment_transaction';
  $handler->display->display_options['filters']['remote_id']['group'] = 1;
  $handler->display->display_options['filters']['remote_id']['exposed'] = TRUE;
  $handler->display->display_options['filters']['remote_id']['expose']['operator_id'] = 'remote_id_op';
  $handler->display->display_options['filters']['remote_id']['expose']['label'] = 'Remote ID';
  $handler->display->display_options['filters']['remote_id']['expose']['operator'] = 'remote_id_op';
  $handler->display->display_options['filters']['remote_id']['expose']['identifier'] = 'remote_id';
  $handler->display->display_options['filters']['remote_id']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );
  /* Filter criterion: Commerce Payment Transaction: Payment method */
  $handler->display->display_options['filters']['payment_method']['id'] = 'payment_method';
  $handler->display->display_options['filters']['payment_method']['table'] = 'commerce_payment_transaction';
  $handler->display->display_options['filters']['payment_method']['field'] = 'payment_method';
  $handler->display->display_options['filters']['payment_method']['relationship'] = 'payment_transaction';
  $handler->display->display_options['filters']['payment_method']['group'] = 1;
  $handler->display->display_options['filters']['payment_method']['exposed'] = TRUE;
  $handler->display->display_options['filters']['payment_method']['expose']['operator_id'] = 'payment_method_op';
  $handler->display->display_options['filters']['payment_method']['expose']['label'] = 'Payment method';
  $handler->display->display_options['filters']['payment_method']['expose']['operator'] = 'payment_method_op';
  $handler->display->display_options['filters']['payment_method']['expose']['identifier'] = 'payment_method';
  $handler->display->display_options['filters']['payment_method']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    9 => 0,
    6 => 0,
    7 => 0,
    10 => 0,
    3 => 0,
    5 => 0,
    4 => 0,
  );

  /* Display: Content pane */
  $handler = $view->new_display('panel_pane', 'Content pane', 'panel_pane');
  $handler->display->display_options['argument_input'] = array(
    'og_group_ref_target_id' => array(
      'type' => 'context',
      'context' => 'entity:node.nid',
      'context_optional' => 0,
      'panel' => '0',
      'fixed' => '',
      'label' => 'Field: Conference (og_group_ref)',
    ),
  );

  /* Display: Data export */
  $handler = $view->new_display('views_data_export', 'Data export', 'views_data_export_1');
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'views_data_export_xls';
  $handler->display->display_options['style_options']['provide_file'] = 1;
  $handler->display->display_options['style_options']['parent_sort'] = 0;
  $handler->display->display_options['path'] = 'admin/commerce/orders/export-xls';
  $handler->display->display_options['displays'] = array(
    'admin_page' => 'admin_page',
    'default' => 0,
    'shopping_carts' => 0,
  );
  $handler->display->display_options['use_batch'] = 'batch';
  $handler->display->display_options['segment_size'] = '100';

  /* Display: Shopping carts */
  $handler = $view->new_display('page', 'Shopping carts', 'shopping_carts');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Shopping carts';
  $handler->display->display_options['defaults']['empty'] = FALSE;
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['text']['id'] = 'text';
  $handler->display->display_options['empty']['text']['table'] = 'views';
  $handler->display->display_options['empty']['text']['field'] = 'area';
  $handler->display->display_options['empty']['text']['content'] = 'There are currently no shopping cart orders.';
  $handler->display->display_options['empty']['text']['format'] = 'plain_text';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Commerce Order: Order state */
  $handler->display->display_options['filters']['state']['id'] = 'state';
  $handler->display->display_options['filters']['state']['table'] = 'commerce_order';
  $handler->display->display_options['filters']['state']['field'] = 'state';
  $handler->display->display_options['filters']['state']['value'] = array(
    'cart' => 'cart',
    'checkout' => 'checkout',
  );
  $handler->display->display_options['filters']['state']['expose']['label'] = 'Order state';
  $handler->display->display_options['filters']['state']['expose']['use_operator'] = TRUE;
  $handler->display->display_options['filters']['state']['expose']['operator'] = 'state_op';
  $handler->display->display_options['filters']['state']['expose']['identifier'] = 'state';
  $handler->display->display_options['path'] = 'admin/commerce/orders/carts';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = 'Shopping carts';
  $handler->display->display_options['menu']['weight'] = '0';
  $export['cod_commerce_orders'] = $view;

  return $export;
}
