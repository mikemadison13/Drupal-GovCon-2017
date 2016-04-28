<?php
/**
 * @file
 * cod_registration_email.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function cod_registration_email_default_rules_configuration() {
  $items = array();
  $items['rules_ticket_code_send_email'] = entity_import('rules_config', '{ "rules_ticket_code_send_email" : {
      "LABEL" : "ticket_code_send_email",
      "PLUGIN" : "reaction rule",
      "WEIGHT" : "3",
      "OWNER" : "rules",
      "REQUIRES" : [ "rules", "ticket_reservation", "cod_email", "ticket" ],
      "ON" : { "ticket_registration_update" : [] },
      "IF" : [
        { "entity_is_of_type" : { "entity" : [ "ticket-registration:host-entity" ], "type" : "node" } },
        { "AND" : [
            { "data_is" : { "data" : [ "ticket-registration:state" ], "value" : "completed" } },
            { "NOT data_is" : {
                "data" : [ "ticket-registration-unchanged:state" ],
                "value" : "completed"
              }
            }
          ]
        },
        { "OR" : [
            { "ticket_reservation_check_mail" : { "ticket_registration" : [ "ticket_registration" ] } },
            { "NOT data_is" : { "data" : [ "ticket-registration:user-uid" ], "value" : "0" } }
          ]
        }
      ],
      "DO" : [
        { "cod_email_send_mail" : {
            "to" : "[ticket-registration:reservation_mail]",
            "conference" : [ "ticket-registration:host-entity" ],
            "cod_email_type" : "ticket_code"
          }
        }
      ]
    }
  }');
  $items['rules_ticket_reservation_is_redeemed'] = entity_import('rules_config', '{ "rules_ticket_reservation_is_redeemed" : {
      "LABEL" : "Ticket Reservation is Redeemed",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "REQUIRES" : [ "rules", "cod_email", "ticket_reservation" ],
      "ON" : { "ticket_reservation_redeem_ticket" : [] },
      "IF" : [
        { "NOT data_is" : { "data" : [ "user-uid:uid" ], "value" : "0" } },
        { "entity_is_of_type" : { "entity" : [ "ticket:host-entity" ], "type" : "node" } }
      ],
      "DO" : [
        { "cod_email_send_mail" : {
            "to" : [ "user-uid:mail" ],
            "conference" : [ "ticket:host-entity" ],
            "cod_email_type" : "ticket_redeemed"
          }
        },
      ]
    }
  }');
  $items['rules_ticket_send_author_code'] = entity_import('rules_config', '{ "rules_ticket_send_author_code" : {
      "LABEL" : "Ticket send author code",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "REQUIRES" : [ "entity" ],
      "ON" : { "commerce_order_update" : [] },
      "DO" : []
    }
  }');
  $items['rules_user_ticket_codes'] = entity_import('rules_config', '{ "rules_user_ticket_codes" : {
      "LABEL" : "User Ticket Codes",
      "PLUGIN" : "and",
      "OWNER" : "rules",
      "REQUIRES" : [ "ticket_reservation", "rules" ],
      "USES VARIABLES" : { "ticket_registration" : { "label" : "registration", "type" : "ticket_registration" } },
      "AND" : [
        { "NOT ticket_reservation_check_mail" : { "ticket_registration" : [ "ticket_registration" ] } },
        { "ticket_reservation_check_codes" : { "ticket_registration" : [ "ticket_registration" ] } },
        { "data_is" : {
            "data" : [ "ticket-registration:user-uid" ],
            "value" : [ "ticket-registration:author-uid" ]
          }
        }
      ]
    }
  }');
  return $items;
}
