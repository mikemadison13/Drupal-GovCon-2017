## 2.7.0
* Fixed a persistent warning about openapi_redoc not being present in the
  file system after updating to beta2. (Issue #2996108)

## 2.6.0
* Updated OpenAPI module to 1.0-beta2, which split out openapi_redoc and
  openapi_swagger into separate modules (which are now brought in by
  Composer). (#33)

## 2.5.0
* Allow Lightning Core 3.x and Drupal core 8.6.x.

## 2.4.0
* Updated and unpinned JSON API to ^1.22.0.
* Updated Simple OAuth to 3.8.0.
* Updated and unpinned Open API to ^1.0.0-beta1.

## 2.3.0
* Updated Simple OAuth to 3.6.

## 2.2.0
* Security updated JSON API to 1.16 (SA-CONTRIB-2018-021)

## 2.1.0
* Security updated JSON API to 1.14 (Issue #2955026 and SA-CONTRIB-2018-016)

## 2.0.0
* Updated JSON API to 1.12.
* Updated core to 8.5.x and patched Simple OAuth to make it compatible.

## 1.0.0-rc3
* Lightning API will only set up developer-specific settings when our internal
  developer tools are installed.
* Our internal Entity CRUD test no longer tries to write to config entities via
  the JSON API because it is insecure and unsupported, at least for now.

## 1.0.0-rc2
* Security updated JSON API to version 1.10.0. (SA-CONTRIB-2018-15)  
  **Note:** This update has caused parts of our Config Entity CRUD test to fail
  so you might have trouble interacting with config entities via tha API.  

## 1.0.0-rc1
* Update JSON API to 1.7.0 (Issue #2933279)

## 1.0.0-alpha1
* Initial release
