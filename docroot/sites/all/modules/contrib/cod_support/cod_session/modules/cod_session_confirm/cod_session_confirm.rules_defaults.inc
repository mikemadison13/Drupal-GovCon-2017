<?php
/**
 * @file
 * cod_session_confirm.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function cod_session_confirm_default_rules_configuration() {
  $items = array();
  $items['rules_accepted_presentation'] = entity_import('rules_config', '{ "rules_accepted_presentation" : {
      "LABEL" : "Accepted Presentation",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "REQUIRES" : [ "rules", "cod_email", "flag" ],
      "ON" : { "flag_flagged_session_accept" : [] },
      "IF" : [
        { "entity_has_field" : { "entity" : [ "flagged-node" ], "field" : "og_group_ref" } },
        { "entity_is_of_type" : { "entity" : [ "flagged-node:og-group-ref:0" ], "type" : "node" } }
      ],
      "DO" : [
        { "cod_email_send_mail" : {
            "to" : "[flagged-node:session-speakers-email]",
            "conference" : [ "flagged-node:og-group-ref:0" ],
            "cod_email_type" : "accepted_session"
          }
        }
      ]
    }
  }');
  return $items;
}
