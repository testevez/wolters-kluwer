<?php

/**
 * Custom theme function
 */
function theme_kw_admin_slider($vars) {
  $slides = $vars['slides'];
  drupal_add_css(drupal_get_path('module', 'kw_admin') .'/kw_admin.slider.css');
  drupal_add_js(drupal_get_path('module', 'kw_admin') .'/kw_admin.slider.js');
  return '
  

<ul class="rslides" id="slider">
  <li><a href="/health/product/coding-suite"><img src="sites/all/themes/mediregs/images/1_WKWebBanner_Coding_02.jpg" alt=""></a>
  </li>
  <li><a href="/health/product/compliance-suite"><img src="sites/all/themes/mediregs/images/2_WKWebBanner_Compliance_02.jpg" alt=""></a>
  </li>
  <li><a href="/health/product/complytrack"><img src="sites/all/themes/mediregs/images/3_WKWebBanner_ComplyTrack_02.jpg" alt=""></a>
</li>
  <li><a href="/health/product/life-sciences-suites"><img src="sites/all/themes/mediregs/images/4_WKWebBanner_LifeSciences_02.jpg" alt=""></a>
</li>
 <li><a href="/health/product/publications-data"><img src="sites/all/themes/mediregs/images/5_WKWebBanner_PubsData_02.jpg" alt=""></a> 
</li> 
      
</ul>
  
  ';
}

/**
 * Implements hook_theme().
 */
function kw_admin_theme($existing, $type, $theme, $path) {
  return array(
    'kw_admin_slider' => array(
      'variables' => array('slides' => array()),
    ),
  );
}