## Drupal Preprocessing
This document is a reference for techniques to create new customize variable in Drupal's preprocessing functions.

###Table of Contents
- <a href="#customvars">Creating and passing custom variables to twig</a>
- <a href="#userrole">Creating body classes based on user role</a>
- <a href="#regionvar">Counting and creating classes elements per region</a>
- <a href="#homepage">Creating a body class for the homepage</a>
- <a href="#themespec">Creating a theme-specific variable to pass to twig</a>
- <a href="#pathalias">Creating body classes based on path alias</a>
- <a href="#nodetype">Creating body classes based on node type</a>
- <a href="#commonvars">Common variables available in primary twig files</a>


<!-- -------------------------- -->
 


<!-- -------------------------- -->

### Creating and passing custom variables to twig
Preprocess functions are generally intended to introduce custom variables for certain portions of the theme layer. In the following example, we will introduce a new variable and then print within the template. 

#### Filenames
`mytheme.theme` `node.html.twig`

#### File contents
```
/* mytheme.theme */
function mytheme_preprocess_node(&$variables) {
  $variables['my_node_id'] = 'custom-var-' . $variables['node']->nid->value;
}
```
```
/* node.html.twig */
{{ my_node_id }}
```

<!-- -------------------------- -->

<a name="userrole"></a>
### Creating body classes based on user role 
In this example we add body classes based on the assigned roles based on the logged-in user. 

#### Filename
`mytheme.theme`

#### File contents
```
use Drupal\Component\Utility\Html;

function mytheme_preprocess_html(&$variables) {
  if ($variables['logged_in']) {
    $user_roles = user_role_names(TRUE);
    foreach ($user_roles as $role => $title) {
      $variables['attributes']['class'][] = Html::cleanCssIdentifier('role--' . $role);
    }
  }
}
```


<!-- -------------------------- -->
<a name="regionvar"></a>
### Counting and creating classes elements per region
In this example we will add DOM classes wrappers to each element in each region. This would typically be used to assign grid declarations for Susy columns. 

#### Filename
`mytheme.theme`

#### File contents
```
use Drupal\Component\Utility\Html;

function mytheme_preprocess_region(&$variables) {
  $elements = $variables['elements'];
  $variables['content'] = array();
  $region_children = Element::children($elements);
  $variables['region'] = $elements['#region'];
  // Utility regional classes for $content.
  foreach ($region_children as $key => $val) {
    if (empty($variables['elements'][$val]['#markup'])) {
      unset($region_children[$key]);
    }
  }
  $region_children = array_values(array_filter($region_children));
  foreach ($region_children as $k => $v) {
    $region_classes = Html::cleanCssIdentifier('regioncol--' . ($k + 1) . '-of-' . count($region_children));
    $variables['content'][] = '<div class="' . $region_classes . '">' . $variables['elements'][$v]['#markup'] . '</div>';
  }
  $variables['content'] = Markup::create(implode($variables['content']));
}
```

<!-- -------------------------- -->


<a name="homepage"></a>
### Creating a body class for the homepage
In this example we add a body class based on frontpage path.

#### Filename
`mytheme.theme`

#### File contents
```
use Drupal\Component\Utility\Html;

function mytheme_preprocess_html(&$variables) {
  // If is homepage.
  $variables['attributes']['class'][] = \Drupal::service('path.matcher')->isFrontPage() ? 'frontpage' : '';
}
```

<!-- -------------------------- -->

<a name="themespec"></a>
### Creating a theme-specific variable to pass to twig 
In this example we create a new theme variables to reference in multiple places with the preprocess functions that can be utilized in the twig file. 

#### Filename
`mytheme.theme`

#### File contents
```
function mytheme_preprocess_html(&$variables) {
  $variables['theme_path'] = drupal_get_path('theme’, 'mytheme');
}
```

<!-- -------------------------- -->

<a name="pathalias"></a>
### Creating body classes based on path alias 
In this example we create a new body classes that will render based on Drupal URL path.

#### Filename
`mytheme.theme`

#### File contents
```
use Drupal\Component\Utility\Html;

function mytheme_preprocess_html(&$variables) {
  $path = \Drupal::service('path.current')->getPath();
  $alias = trim(\Drupal::service('path.alias_manager')
    ->getAliasByPath($path), '/');
  // Alias path class.
  $alias_class = preg_replace("/\//", '-', $alias);
  if (!empty($alias_class) && strpos($alias_class, 'node') !== 0) {
    $variables['attributes']['class'][] = Html::cleanCssIdentifier('alias--' . $alias_class);
  }
}
```

<!-- -------------------------- -->

<a name="nodetype"></a>
### Creating body classes based on node type
In this example we create a new body classes that will render on content type.

#### Filename
`mytheme.theme`

#### File contents
```

function mytheme_preprocess_html(&$variables) {
  // Node type class.
  $variables['attributes']['class'][] = isset($variables['node_type']) ? 'nodetype--' .
  $variables['node_type'] : '';
}
```

<!-- -------------------------- -->


<a name="commonvars"></a>
### Common variables available in primary twig files  
Many used and unused variables exist out of the box for most of the core Twig files.

#### Filename
`html.html.twig`

#### File contents
```
{{ attributes }}  Attributes rendered on body tag 
{{ logged_in }}  If user is logged in
{{ is_admin }}  If user is admin
{{ directory }}  Theme directory path  
{{ root_path }}  The root path of the current page
{{ node_type }}  The content type for the current node
{{ css }}  A list of CSS files for the current page
{{ head }}  Markup for the HEAD element
{{ head_title }}  Page title for the TITLE tag
{{ styles }}  Style tags HEAD section.
{{ scripts }}  Script tags for javascript files in HEAD
{{ scripts_bottom }}  Script tags for javascript files in BODY 
{{ html_attributes }}  Attributes on the HTML tag 
{{ db_offline }}  If the database is offline
{{ db_is_active }}  DB is active
{{ dump(user) }}  User object reference 
```

#### Filename
`page.html.twig`

#### File contents
```
{{ base_path }}  The base path of site 
{{ directory }}  Theme directory path 
{{ attributes }}  Attributes rendered on outside <div>
{{ title }}  Node title if applicable 
{{ front_page }}  Is front page 
{{ language }}  Language variable 
{{ logo }}  Theme logo 
{{ site_name }}  Site name
{{ site_slogan }}  Site slogan 
{{ logged_in }}  If user is logged in
{{ is_admin }}  If user is admin
{{ db_is_active }}  DB is active
{{ dump(page) }}  Page object to be rendered in properties i.e. page.header
{{ dump(user) }}  User object reference 
{{ dump(tabs) }}  Tab object reference 
{{ dump(node) }}  Node object reference 
```


#### Filename
`node.html.twig`

#### File contents
```
{{ view_mode }}  View mode on nodes 
{{ teaser }}  Teaser content 
{{ node }}  Node object 
{{ date }}  Date information 
{{ author_name }}  Author name  
{{ url }}  Rendered URL information 
{{ content }}  Rendered content information 
{{ attributes }}  Attributes rendered on article tag
{{ directory }}  Theme directory path 
{{ logged_in }}  If user is logged in
{{ is_admin }}  If user is admin
{{ db_is_active }}  DB is active
```



<!-- -------------------------- -->



<br><hr>

### Additional References

- <a href="https://www.drupal.org/docs/8/theming/twig/twig-best-practices-preprocess-functions-and-templates">Drupal.org Twig best practices - preprocess functions and templates</a>
- <a href="https://www.drupal.org/docs/8/theming">Theming Drupal 8</a>
- <a href="https://api.drupal.org/api/drupal/core!lib!Drupal!Core!Render!theme.api.php/function/hook_preprocess_HOOK/8.2.x">Drupal.org docs for hook\_preprocess\_HOOK</a>
