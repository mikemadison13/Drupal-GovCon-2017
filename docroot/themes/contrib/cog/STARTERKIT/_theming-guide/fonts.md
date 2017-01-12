## Theming Guide: Web Fonts

###Table of Contents
- <a href="#cdnfonts">Adding external Web fonts to your theme</a>
- <a href="#localfonts">Adding local Web fonts to your theme</a>


<!-- -------------------------- -->

<a name="cdnfonts"></a>
### Adding external Web fonts to your theme 
Most popular web font stacks can be included with minimal effort, especially when loading from an external source. In this example we will load a Google font into our theme thru the libraries file. 

#### Filename
`example.libraries.yml`

#### File contents
```
lib:
  version: VERSION
    fonts:
      '//fonts.googleapis.com/css?family=Open+Sans:400,700,300': { type: external}
```

<!-- -------------------------- -->


<a name="localfonts"></a>
### Adding local Web fonts to your theme 

When implementing local fonts, we typically recommend using the `@font-face` rule to accomplish this. The below example shows broader coverage for each browser, but this can be trimmed based on the available font library. 

#### Filename
`_font.scss`

#### File contents
```
@font-face {
  font-family: 'Klavika Light Condensed';
  src: url('../fonts/Klavika-LightCondensed.eot');
  src: url('../fonts/Klavika-LightCondensed.eot?#iefix') format('embedded-opentype'),
  url('../fonts/Klavika-LightCondensed.woff') format('woff'),
  url('../fonts/Klavika-LightCondensed.ttf') format('truetype');
  font-weight: 300;
  font-style: normal;
}
```

<!-- -------------------------- -->



<br><hr>

### Additional References
- <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face">MDN @font-face</a>
- <a href="https://www.drupal.org/docs/8/theming-drupal-8/adding-stylesheets-css-and-javascript-js-to-a-drupal-8-theme">Adding stylesheets (CSS) and JavaScript (JS) to a Drupal 8 theme</a>
- <a href="https://www.drupal.org/docs/8/theming">Using @font-face CSS Tricks</a>
