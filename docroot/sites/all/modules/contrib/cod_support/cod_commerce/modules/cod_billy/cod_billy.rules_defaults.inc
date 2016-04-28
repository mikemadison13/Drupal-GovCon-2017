<?php
/**
 * @file
 * cod_billy.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function cod_billy_default_rules_configuration() {
  $items = array();
  $items['cod_billy_order_status_update'] = entity_import('rules_config', '{ "cod_billy_order_status_update" : {
      "LABEL" : "Update the order status on checkout completion",
      "PLUGIN" : "reaction rule",
      "WEIGHT" : "-9",
      "OWNER" : "rules",
      "TAGS" : [ "Commerce Checkout" ],
      "REQUIRES" : [ "commerce_order", "commerce_checkout" ],
      "ON" : { "commerce_checkout_complete" : [] },
      "DO" : [
        { "commerce_order_update_state" : { "commerce_order" : [ "commerce-order" ], "order_state" : "invoiced" } }
      ]
    }
  }');
  $items['cod_billy_order_email'] = entity_import('rules_config', '{ "cod_billy_order_email" : {
      "LABEL" : "Send an order notification e-mail",
      "PLUGIN" : "reaction rule",
      "WEIGHT" : "4",
      "OWNER" : "rules",
      "TAGS" : [ "Commerce Checkout" ],
      "REQUIRES" : [ "rules", "cod_email", "commerce_checkout" ],
      "ON" : { "commerce_checkout_complete" : [] },
      "IF" : [
        { "entity_has_field" : { "entity" : [ "commerce-order" ], "field" : "og_group_ref" } },
        { "entity_is_of_type" : { "entity" : [ "commerce-order:og-group-ref:0" ], "type" : "node" } }
      ],
      "DO" : [
        { "cod_email_send_mail" : {
            "to" : "[commerce-order:mail]",
            "conference" : [ "commerce-order:og-group-ref:0" ],
            "cod_email_type" : "billy"
          }
        }
      ]
    }
  }');
  $items['cod_billy_checkout_paid_in_full'] = entity_import('rules_config', '{ "cod_billy_checkout_paid_in_full" : {
        "LABEL" : "Checkout order is paid in full",
        "PLUGIN" : "reaction rule",
        "WEIGHT" : "-5",
        "OWNER" : "rules",
        "REQUIRES" : [ "commerce_payment", "rules", "commerce_order", "commerce_checkout" ],
        "ON" : { "commerce_checkout_complete" : [] },
        "IF" : [
          { "commerce_payment_order_balance_comparison" : {
              "commerce_order" : [ "commerce_order" ],
              "operator" : "=",
              "value" : "0"
            }
          },
          { "data_is" : { "data" : [ "commerce-order:status" ], "value" : "invoiced" } }
        ],
        "DO" : [
          { "commerce_order_update_status" : { "commerce_order" : [ "commerce_order" ], "order_status" : "completed" } }
        ]
      }
    }');
  return $items;
}
