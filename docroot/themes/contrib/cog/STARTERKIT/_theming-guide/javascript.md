## Theming Guide: JavaScript


###Table of Contents
- <a href="#jsfile">Adding a Javascript file to you theme</a>
- <a href="#wrappingfile">Wrapping your JavaScript code in closure</a>
- <a href="#behaviors">Adding JS code within Drupal.behaviors</a>

<hr>

<a name="jsfile"></a>
### Adding a Javascript file to you theme 
JavaScript file are now added thru your library definitions in Drupal 8. These files are now named as `*.libraries.yml` and can be updated incrementally after being defined. In this example we are the drupal and jQuery libraries as a dependency. 

#### Filename
`example.libraries.yml`

#### File contents
```
lib:
  version: VERSION
  js:
    js/theme.js: {}
  dependencies:
    - core/jquery
    - core/drupal
```

<!-- -------------------------- -->

<a name="wrappingfile"></a>
### Wrapping your JavaScript code in closure 
Drupal best practices dictate that you wrap JavaScript code with the proper function closure to proper limit the JavaScript scope. We also typically add in common parameters (jQuery, Drupal, etc) within this function to address mapping and conflicts. We also suggest using strict mode within this closure with `'use strict';`.

#### Filename
`example.js`

#### File contents
```
(function ($, Drupal, window, document) {
  'use strict';

  // Example of Drupal behavior.
  Drupal.behaviors.exampleA = {....};
  
  // Example of Drupal behavior.
  Drupal.behaviors.exampleB = {....};

})(jQuery, Drupal, this);
```

<!-- -------------------------- -->

<a name="behaviors"></a>
### Adding JS code within Drupal.behaviors
As with previous versions of Drupal, we always wrap our code with drupal.behaviors instead of `$(document).ready` for multiple reasons. In the example below, we are wanting our code to fire only on document load, but you can use the same logic for all load events and target specific DOM declarations.

#### Filename
`example.js`

#### File contents
```
(function ($, Drupal, window, document) {
  'use strict';

  // Example of Drupal behavior loaded.
  Drupal.behaviors.exampleJS = {
    attach: function (context, settings) {
      if (typeof context['location'] !== 'undefined') { // Only fire on document load.

        console.log('This is loaded');

      }
    }
  };

})(jQuery, Drupal, this);
```

<!-- -------------------------- -->





<br><hr>

### Additional References

- <a href="https://www.drupal.org/docs/7/theming/working-with-javascript-and-jquery">Drupal.org Working with JavaScript and jQuery</a>
- <a href="https://www.drupal.org/docs/8/theming-drupal-8/adding-stylesheets-css-and-javascript-js-to-a-drupal-8-theme">Adding stylesheets (CSS) and JavaScript (JS) to a Drupal 8 theme</a>
- <a href="https://www.drupal.org/docs/8/theming">Theming Drupal 8</a>
- <a href="https://www.drupal.org/docs/8/api/javascript-api/javascript-api-overview">Drupal.org JavaScript API overview</a>
- <a href="https://www.drupal.org/node/172169">Drupal.org JavaScript coding standards</a>





