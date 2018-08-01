# OpenApi Module

This module provides a [OpenAPI](https://github.com/OAI/OpenAPI-Specification)
(A.K.A. Swagger) compliant resource describing the enabled REST resources on
about Drupal Site.

This module supports and integrates with Drupal Core's REST endpoints and
the [JsonApi](https://drupal.org/project/jsonapi) module.

## Setup

This module can be installed as [any other Drupal 8 module]
https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules).

### Module Dependencies

The OpenAPI module leverages the [schemata] module to derive the entity schema
for the project. The SwaggerUI sub modules requires the [swagger-api/swagger-ui]
(https://github.com/swagger-api/swagger-ui) library to be installed into the
sites `/libraries` directory. Installation instructions can be found in the
sub module's README.md.

## Documentation

The Open API specification document in JSON format that describes all of the
entity REST resources can be downloaded from, `openapi/entities?_format=json`.

[Learn more about Open API](https://github.com/OAI/OpenAPI-Specification).
