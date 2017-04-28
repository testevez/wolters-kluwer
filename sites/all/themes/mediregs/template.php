<?php
// Pixture Reloaded by Adaptivethemes.com

/**
 * Custom helper function to display page headers
 */
function _mediregs_page_headers() {
  $pageuri = $_SERVER['REQUEST_URI'];
  $vars = array(
    //'height' => 144,
    //'width' => 897,
  );

  $life_sciences_urls = array(
    '/health/product/life-sciences-suites',
    '/health/product/device-regulation-suite',
    '/health/product/device-regulation-suite',
    '/health/product/european-device-regulations',
    '/health/product/pharmaceutical-regulation-suite',
    '/health/product/european-pharmaceutical-regulations',
    '/health/product/food-regulation-suite',
    '/health/product/research-and-grant-management-suite',
  );

  if ('/health/product/mediregs' == $pageuri) {
    $block = module_invoke('kw_admin', 'block_view', 'kw_mediregs_carousel');

    print '<div id="block-kw-admin-kw-medi-slider" class="block block-kw-admin contextual-links-region no-title odd first last block-count-5 block-region-help block-kw-medi-slider"><div class="block-inner clearfix">  ';
    print '<div class="block-content content">';
    print render($block['content']);
    print '</div></div></div>';
  }
  else if (strpos($pageuri, "/product/complytrack") || strpos($pageuri, "/product/isam")) {
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/3_WKWebBanner_ComplyTrack_02.jpg';
    $vars['alt'] = 'Comply Track';
    $img = theme('image', $vars);
    print $img;
  }
  else if (strpos($pageuri, "/product/publications-data")) {
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/5_WKWebBanner_PubsData_02.jpg';
    $vars['alt'] = 'Publications & Data';
    $img = theme('image', $vars);
    print $img;
  }
  else if (strpos($pageuri, "/product/coding-suite") || strpos($pageuri, "sanction-screening-services") || strpos($pageuri, "policy-resource-center")) {
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/1_WKWebBanner_Coding_02.jpg';
    $vars['alt'] = 'Coding Suite';
    $img = theme('image', $vars);
    print $img;
  }
  else if (strpos($pageuri, "/product/compliance-suite")) {
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/2_WKWebBanner_Compliance_02.jpg';
    $vars['alt'] = 'Coding Suite';
    $img = theme('image', $vars);
    print $img;
  }
  else if (in_array($pageuri, $life_sciences_urls)) {
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/4_WKWebBanner_LifeSciences_02.jpg';
    $vars['alt'] = 'Life Science Suites';
    $img = theme('image', $vars);
    print $img;
  }
  else if (preg_match("/company/i", $pageuri)) {
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/CompanyHeader.png';
    $vars['alt'] = 'Company Header';
    $img = theme('image', $vars);
    print $img;
  }
  else if (preg_match("/issue/i", $pageuri)) {
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/WKWebBanner_SolutionsbyIssue_01.png';
    $vars['alt'] = 'Solutions by Issue';
    $img = theme('image', $vars);
    print $img;
  }
  else if (preg_match("/role/i", $pageuri)) {
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/WKWebBanner_SolutionsbyRole_01.png';
    $vars['alt'] = 'Solutions by Issue';
    $img = theme('image', $vars);
    print $img;
  }
  else if (preg_match("/resource/i", $pageuri) || preg_match("/blog/i", $pageuri) || strpos($pageuri, '/white-papers')) {
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/WKWebBanner_ResourceCenter_01.png';
    $vars['alt'] = 'Healthcare Resource Header';
    $img = theme('image', $vars);
    print $img;
  }
  else if (preg_match("/knowledge/i", $pageuri) || preg_match("/blog/i", $pageuri)) {
    $vars = array(
      //'height' => 154,
      //'width' => 940,
    );
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/Health-Reform-KnowlEDGE-Center-940-x-154-banner.jpg';
    $vars['alt'] = 'Health Reform Knowledge Center';
    $img = theme('image', $vars);
    print $img;
  }
  else {
    $vars['path'] = drupal_get_path('theme', 'mediregs') .'/images/CompanyHeader.png';
    $vars['alt'] = 'Solutions Header';
    $img = theme('image', $vars);
    print $img;
  }

}

/**
 * Override or insert variables into the html template.
 */
function mediregs_preprocess_html(&$vars) {
  global $theme_key;

  $theme_name = 'mediregs';
  $path_to_theme = drupal_get_path('theme', $theme_name);

  // Add a class for the active color scheme
  if (module_exists('color')) {
    $class = check_plain(get_color_scheme_name($theme_key));
    $vars['classes_array'][] = 'color-scheme-' . drupal_html_class($class);
  }

  // Add class for the active theme
  $vars['classes_array'][] = drupal_html_class($theme_key);

  // Add theme settings classes
  $settings_array = array(
    'box_shadows',
    'body_background',
    'menu_bullets',
    'menu_bar_position',
    'corner_radius',
  );
  foreach ($settings_array as $setting) {
    $vars['classes_array'][] = theme_get_setting($setting);
  }

  // Special case for PIE htc rounded corners, not all themes include this
  if (theme_get_setting('ie_corners') == 1) {
    drupal_add_css($path_to_theme . '/css/ie-htc.css', array(
      'group' => CSS_THEME,
      'browsers' => array(
        'IE' => 'lte IE 8',
        '!IE' => FALSE,
        ),
      'preprocess' => FALSE,
      )
    );
  }
  
  // Setup Google Webmasters Verification Meta Tag
  $google_webmasters_verification = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'google-site-verification',
      // REPLACE THIS CODE WITH THE ONE GOOGLE SUPPLIED YOU WITH
      'content' => 'LQDG23cIALk2ahxtw7_tSK3S9LKC2RnxJt1JCGQmAm8',
    )
  );
  // Add Google Webmasters Verification Meta Tag to head
  drupal_add_html_head($google_webmasters_verification, 'google_webmasters_verification');
}

/**
 * Override or insert variables into the html template.
 */
function mediregs_process_html(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_html_alter($vars);
  }

}

/**
 * Override or insert variables into the page template.
 */
function mediregs_process_page(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Override or insert variables into the block template.
 */
function mediregs_preprocess_block(&$vars) {
  if($vars['block']->module == 'superfish' || $vars['block']->module == 'nice_menu') {
    $vars['content_attributes_array']['class'][] = 'clearfix';
  }
}

function mediregs_preprocess_search_results(&$variables) {
  $variables['search_results'] = '';
  if (!empty($variables['module'])) {
    $variables['module'] = check_plain($variables['module']);
  }
  if (empty($variables['count'])) {
    $variables['count'] = 0;
  }
  // $variables['count'] = 0;
  foreach ($variables['results'] as $result) {
    $variables['search_results'] .= theme('search_result', array('result' => $result, 'module' => $variables['module']));
    $variables['count'] = $variables['count'] + 1;
  }
  $variables['pager'] = theme('pager', array('tags' => NULL));
  $variables['theme_hook_suggestions'][] = 'search_results__' . $variables['module'];
}

function mediregs_aggregator_block_item($variables) {
	$item = $variables['item'];
	$output = '<span class=title-post><a target="_blank" href="' . check_url($variables['item']->link) . '">' . check_plain($variables['item']->title) . '</a></span> <span class=date-post>- ' .date('F j, Y', $item->timestamp). "</span>\n";
  return $output;
}