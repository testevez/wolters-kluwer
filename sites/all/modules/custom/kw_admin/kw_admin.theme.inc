<?php

/**
 * Custom theme function
 */
function theme_kw_admin_slider($vars) {
  $slides = $vars['slides'];
  drupal_add_css(drupal_get_path('module', 'kw_admin') .'/kw_admin.slider.css');
  drupal_add_js(drupal_get_path('module', 'kw_admin') .'/kw_admin.slider.js');
  $output = '';
  if (count($slides)) {
    $output .= '<ul class="rslides" id="slider">';
    foreach ($slides as $slide) {
      $output .= '<li><a href="'. $slide['link'] .'"><img src="'. $slide['img_src'] .'" alt=""></a></li>';
    }
    $output .= '</ul>';
  }
  return $output;
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