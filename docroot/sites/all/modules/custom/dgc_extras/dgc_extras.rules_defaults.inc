<?php
/**
 * @file
 * dgc_extras.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function dgc_extras_default_rules_configuration() {
  $items = array();
  $items['rules_dgc_ticket_registration_thankyou'] = entity_import('rules_config', '{ "rules_dgc_ticket_registration_thankyou" : {
      "LABEL" : "Drupal GovCon ticket registration thankyou",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "TAGS" : [ "DGC" ],
      "REQUIRES" : [ "rules", "ticket" ],
      "ON" : { "ticket_registration_insert" : [] },
      "IF" : [
        { "data_is" : { "data" : [ "ticket-registration:bundle" ], "value" : "1" } }
      ],
      "DO" : [ { "redirect" : { "url" : "thankyou" } } ]
    }
  }');
  $items['rules_dgc_ticket_waitlist_thankyou'] = entity_import('rules_config', '{ "rules_dgc_ticket_waitlist_thankyou" : {
      "LABEL" : "Drupal GovCon ticket waitlist thank you",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "TAGS" : [ "DGC" ],
      "REQUIRES" : [ "rules", "ticket" ],
      "ON" : { "ticket_registration_insert" : [] },
      "IF" : [
        { "data_is" : { "data" : [ "ticket-registration:bundle" ], "value" : "11" } }
      ],
      "DO" : [ { "redirect" : { "url" : "drupal-govcon-2015\\/waitlist-thank-you" } } ]
    }
  }');
  $items['rules_email_waitlist_ticket_holder_ticket_approved'] = entity_import('rules_config', '{ "rules_email_waitlist_ticket_holder_ticket_approved" : {
      "LABEL" : "Email waitlist ticket holder -- Ticket approved!",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "TAGS" : [ "DGC" ],
      "REQUIRES" : [ "rules", "ticket" ],
      "ON" : { "ticket_registration_update" : [] },
      "IF" : [
        { "data_is" : { "data" : [ "ticket-registration:bundle" ], "value" : "11" } },
        { "NOT data_is" : {
            "data" : [ "ticket-registration:state" ],
            "value" : [ "ticket-registration-unchanged:state" ]
          }
        },
        { "data_is" : { "data" : [ "ticket-registration:state" ], "value" : "completed" } }
      ],
      "DO" : [
        { "component_rules_email_waitlist_user_ticket_approved" : { "ticket_user" : [ "ticket-registration:user" ] } }
      ]
    }
  }');
  $items['rules_email_waitlist_user_ticket_approved'] = entity_import('rules_config', '{ "rules_email_waitlist_user_ticket_approved" : {
      "LABEL" : "Email ticket user -- Ticket approved!",
      "PLUGIN" : "rule",
      "OWNER" : "rules",
      "TAGS" : [ "DGC" ],
      "REQUIRES" : [ "rules" ],
      "USES VARIABLES" : { "ticket_user" : { "label" : "User", "type" : "user" } },
      "DO" : [
        { "mail" : {
            "to" : "[ticket-user:mail]",
            "subject" : "Your waitlist ticket for [site:name] is APPROVED!",
            "message" : "Hi [ticket-user:name],\\r\\nYou are no longer on the waitlist! Your ticket is completed and your name will be on the list at the registration table for the event!\\r\\n\\r\\nIf you can no longer attend the event please release your ticket! https:\\/\\/www.drupalgovcon.org\\/drupal-govcon-2015\\/releasing-your-ticket\\r\\n\\r\\nSubscribe to our newsletter:\\r\\nhttp:\\/\\/eepurl.com\\/bbJASn\\r\\n\\r\\nFollow us on social media:\\r\\nhttps:\\/\\/twitter.com\\/drupalgovcon\\r\\nhttps:\\/\\/plus.google.com\\/+Drupal4Gov\\r\\nhttps:\\/\\/www.facebook.com\\/DrupalGovCon\\r\\n\\r\\n--  [site:name] team",
            "language" : [ "" ]
          }
        }
      ]
    }
  }');
  $items['rules_new_account_registration'] = entity_import('rules_config', '{ "rules_new_account_registration" : {
      "LABEL" : "New account registration",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "TAGS" : [ "Notification" ],
      "REQUIRES" : [ "rules" ],
      "ON" : { "user_insert" : [] },
      "DO" : [
        { "mail" : {
            "to" : "tim@buchbinder.org,drupal4gov@gmail.com",
            "subject" : "New user account [account:name] ([account:mail]) created",
            "message" : "Created: [account:created]\\r\\nStatus: [account:status]\\r\\n\\r\\n[account:url]",
            "language" : [ "" ]
          }
        }
      ]
    }
  }');
  return $items;
}
