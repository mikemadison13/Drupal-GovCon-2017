<?php
/**
 * @file
 * cod_paid_events.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function cod_paid_events_default_rules_configuration() {
  $items = array();
  $items['cpe_set_ticket_to_pending_on_non_zero_checkout_complete'] = entity_import('rules_config', '{ "cpe_set_ticket_to_pending_on_non_zero_checkout_complete" : {
      "LABEL" : "Set ticket to pending on non-zero checkout complete",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "REQUIRES" : [ "commerce_payment", "cod_paid_events", "commerce_checkout" ],
      "ON" : { "commerce_checkout_complete" : [] },
      "IF" : [
        { "commerce_payment_order_balance_comparison" : {
            "commerce_order" : [ "commerce_order" ],
            "operator" : "\u003E",
            "value" : "0"
          }
        }
      ],
      "DO" : [
        { "cod_paid_events_modify_ticket_state_by_order" : { "order_id" : [ "commerce-order" ], "ticket_state" : "pending" } }
      ]
    }
  }');
  $items['cpe_set_ticket_to_completed_on_paid_checkout_complete'] = entity_import('rules_config', '{ "cpe_set_ticket_to_completed_on_paid_checkout_complete" : {
      "LABEL" : "Set ticket to completed on paid checkout complete",
      "PLUGIN" : "reaction rule",
      "WEIGHT" : "-3",
      "OWNER" : "rules",
      "REQUIRES" : [ "commerce_payment", "cod_paid_events", "commerce_checkout" ],
      "ON" : { "commerce_checkout_complete" : [] },
      "IF" : [
        { "commerce_payment_order_balance_comparison" : {
            "commerce_order" : [ "commerce_order" ],
            "operator" : "=",
            "value" : "0"
          }
        }
      ],
      "DO" : [
        { "cod_paid_events_modify_ticket_state_by_order" : { "order_id" : [ "commerce-order" ], "ticket_state" : "completed" } }
      ]
    }
  }');
  $items['cpe_set_ticket_to_checkout_on_new_cart'] = entity_import('rules_config', '{ "cpe_set_ticket_to_checkout_on_new_cart" : {
      "LABEL" : "Set ticket to checkout on new cart",
      "PLUGIN" : "reaction rule",
      "WEIGHT" : "-10",
      "OWNER" : "rules",
      "REQUIRES" : [ "rules", "cod_paid_events" ],
      "ON" : { "cod_paid_events_add_ticket_to_order" : [] },
      "DO" : [ { "data_set" : { "data" : [ "ticket:state" ], "value" : "checkout" } } ]
    }
  }');

  return $items;
}
