# Drupal 8 Theming Guide

This theming guide is a reference of various techniques and snippets which are typically needed for front-end development scenarios on a project. Some documentation will reference high-level techniques that are inline with best practices, while others are specific code from certain tasks.  

<!-- -------------------------- -->
<!-- -------------------------- -->


### Sass in Drupal
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/sass.md#sassorg">Sass Style Organization</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/sass.md#componenmqs">Component Rules with Media Queries</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/sass.md#csspreprocess">CSS Preprocessing</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/sass.md#effectivestyles">Writing Effective Style Rules</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/sass.md#mqtechniques">Media Queries Coding Techniques</a>

<!-- -------------------------- -->
<!-- -------------------------- -->

### Using Web Fonts in Drupal
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/fonts.md#cdnfonts">Adding External Web Fonts in Drupal</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/fonts.md#localfonts">Adding External Web Fonts in Drupal</a>


<!-- -------------------------- -->
<!-- -------------------------- -->

### Twig for Drupal 8
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/twig.md#twigbasics">Twig Basics</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/twig.md#twigcompare">Twig Comparison and Control Operators</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/twig.md#twigfunc">Twig Functions and Filters</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/twig.md#twigenabledebug">Enable Twig Debugging</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/twig.md#twigdebug">Debugging Options in Twig</a>


<!-- -------------------------- -->
<!-- -------------------------- -->

### Images in Drupal
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/images.md#origrenderarray">Create Render Array for Original Image</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/images.md#stylerenderarray">Create Render Array with Image Style</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/images.md#imguri">Create Image Object from URI</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/images.md#imgfiduri">Return Image Information from File ID</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/images.md#gulpcompr">Compressing Images with Gulp</a>


<!-- -------------------------- -->
<!-- -------------------------- -->

### Drupal 8 Libraries
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/libraries.md#locallibs">Defining Local Libraries in Drupal 8</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/libraries.md#remotelibs">Defining External Libraries in Drupal 8</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/libraries.md#dependencylibs">Adding Library Dependencies</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/libraries.md#attachtwig">Attaching Libraries within Twig files</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/libraries.md#preprocesslibraries">Attaching Libraries within Preprocess Functions</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/libraries.md#replaceremovelibs">Replacing or Removing Libraries</a>

<!-- -------------------------- -->
<!-- -------------------------- -->

### Preprocessing in Drupal
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/preprocessing.md#customvars">Creating and Passing Custom Variables to Twig</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/preprocessing.md#userrole">Creating Body Classes based on User Role</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/preprocessing.md#regionvar">Counting and Creating Classes per Region</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/preprocessing.md#homepage">Creating a Body Class for the Homepage</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/preprocessing.md#themespec">Creating a Theme-Specific Variable for Twig</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/preprocessing.md#pathalias">Creating Body Classes based on Path Alias</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/preprocessing.md#nodetype">Creating Body Classes based on Node Type</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/preprocessing.md#commonvars">Common Variables in Twig files</a>


<!-- -------------------------- -->
<!-- -------------------------- -->

### JavaScript in Drupal 
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/javascript.md#jsfile">Adding a Javascript file in Drupal</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/javascript.md#wrappingfile">Wrapping your JavaScript code in closure</a>
- <a href="https://github.com/acquia-pso/cog/blob/8.x-1.x/STARTERKIT/_theming-guide/javascript.md#behaviors">Adding JS code within Drupal.behaviors</a>







