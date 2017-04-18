<?php

/**
 * Implements hook_block_info().
 */
function kw_admin_block_info() {
  $blocks['kw_complytrack'] = array( // WKmediregs-ct-isam
    'info' => t('Custom: ComplyTrack & ISAM Eloqua Form / WKmediregs-ct-isam (Elequoa integration)'),
    'cache' => DRUPAL_CACHE_GLOBAL // Everyone sees the same block!
  );
  $blocks['kw_codecomp'] = array( // WKMediregsCodeComp
    'info' => t('Custom: Mediregs / WKMediregsCodeComp Form (Elequoa integration)'),
    'cache' => DRUPAL_CACHE_GLOBAL // Everyone sees the same block!
  );
  $blocks['kw_wkic'] = array( // WKMediregsCodeComp
    'info' => t('Custom: IntelliConnect / wkic Form (Elequoa integration)'),
    'cache' => DRUPAL_CACHE_GLOBAL // Everyone sees the same block!
  );
  $blocks['kw_mediregs_carousel'] = array( // Carousel based on the homepage Carousel
    'info' => t('Custom: Image Carousel for the product/mediregs page'),
    'cache' => DRUPAL_CACHE_GLOBAL // Everyone sees the same block!
  );
  $blocks['kw_medi_slider'] = array( // Homepage Carousel
    'info' => t('Custom: Medi Slider'),
    'cache' => DRUPAL_CACHE_GLOBAL // Everyone sees the same block!
  );
  return $blocks;
}


/**
 * Implements hook_block_configure().
 */
function kw_admin_block_configure($delta = '') {
  $form = array();
  // WKmediregs-ct-isam
  if ($delta == 'kw_complytrack') {
    $default_val = variable_get('kw_complytrack_markup', FALSE);
    if (!$default_val) {
      $default_val = array(
        'value' => kw_complytrack_markup_default(),
        'format' => 'un_modified_html',
      );
    }
    $form['kw_complytrack_markup'] = array(
      '#type' => 'text_format',
      '#title' => t('Markup for the ComplyTrack form'),
      '#default_value' => $default_val['value'],
      '#format' => $default_val['format'],
    );
  }
  // WKMediregsCodeComp
  if ($delta == 'kw_codecomp') {
    $default_val = variable_get('kw_codecomp_markup', FALSE);
    if (!$default_val) {
      $default_val = array(
        'value' => kw_codecomp_markup_default(),
        'format' => 'un_modified_html',
      );
    }
    $form['kw_codecomp_markup'] = array(
      '#type' => 'text_format',
      '#title' => t('Markup for the WKMediregsCodeComp form'),
      '#default_value' => $default_val['value'],
      '#format' => $default_val['format'],
    );
  }
  // wkic
  if ($delta == 'kw_wkic') {
    $default_val = variable_get('kw_wkic_markup', FALSE);
    if (!$default_val) {
      $default_val = array(
        'value' => kw_wkic_markup_default(),
        'format' => 'un_modified_html',
      );
    }
    $form['kw_wkic_markup'] = array(
      '#type' => 'text_format',
      '#title' => t('Markup for the WKMediregsCodeComp form'),
      '#default_value' => $default_val['value'],
      '#format' => $default_val['format'],
    );
  }
  return $form;
}

/**
 * Implements hook_block_save().
 */
function kw_admin_block_save($delta = '', $edit = array()) {
  if ($delta == 'kw_complytrack') {
    variable_set('kw_complytrack_markup', $edit['kw_complytrack_markup']);
  }
  if ($delta == 'kw_codecomp') {
    variable_set('kw_codecomp_markup', $edit['kw_codecomp_markup']);
  }
  if ($delta == 'kw_wkic') {
    variable_set('kw_wkic_markup', $edit['kw_wkic_markup']);
  }
}

/**
 * Implements hook_block_view().
 */
function kw_admin_block_view($delta = '') {
  // Add CSS to support our blocks
  drupal_add_css(drupal_get_path('module', 'kw_admin') .'/css/kw_admin.css');

  // Return the correct markup based on the delta
  $block = array();
  switch ($delta) {
    case 'kw_complytrack':
      $block['subject'] = t('REQUEST INFO');
      $array = variable_get('kw_complytrack_markup', FALSE);
      if (!$array) {
        $array = array(
          'value' => kw_complytrack_markup_default(),
          'format' => 'un_modified_html',
        );
      }
      $block['content'] = array(
        '#markup' => check_markup($array['value'], $array['format'])
      );
      break;
    case 'kw_codecomp':
      $block['subject'] = t('REQUEST INFO');
      $array = variable_get('kw_codecomp_markup', FALSE);
      if (!$array) {
        $array = array(
          'value' => kw_codecomp_markup_default(),
          'format' => 'un_modified_html',
        );
      }
      $block['content'] = array(
        '#markup' => check_markup($array['value'], $array['format'])
      );
      break;
    case 'kw_wkic':
      $block['subject'] = t('REQUEST INFO');
      $array = variable_get('kw_wkic_markup', FALSE);
      if (!$array) {
        $array = array(
          'value' => kw_wkic_markup_default(),
          'format' => 'un_modified_html',
        );
      }
      $block['content'] = array(
        '#markup' => check_markup($array['value'], $array['format'])
      );
      break;
    case 'kw_mediregs_carousel':
      // TODO: Make these configurable
      $slides = _kw_admin_product_mediregs_slides();
      $block['content'] = array(
        '#theme' => 'kw_admin_slider',
        '#slides' => $slides,
      );
      break;
    case 'kw_medi_slider':
      // TODO: Make these configurable
      $slides = _kw_admin_front_slides();
      $block['content'] = array(
        '#theme' => 'kw_admin_slider',
        '#slides' => $slides,
      );
      break;
  }
  return $block;
}

/**
 * Helper function to return homepage slides
 * This should really be controlled by the CMS
 */
function _kw_admin_front_slides() {
  // TODO: Make these configurable
  $slides = array();
  $slides[] = array(
    'link' => '/health/product/coding-suite',
    'img_src' => '/health/sites/all/themes/mediregs/images/1_WKWebBanner_Coding_02.jpg',
  );
  $slides[] = array(
    'link' => '/health/product/compliance-suite',
    'img_src' => '/health/sites/all/themes/mediregs/images/2_WKWebBanner_Compliance_02.jpg',
  );
  $slides[] = array(
    'link' => '/health/product/complytrack',
    'img_src' => '/health/sites/all/themes/mediregs/images/3_WKWebBanner_ComplyTrack_02.jpg',
  );
  $slides[] = array(
    'link' => '/health/product/life-sciences-suites',
    'img_src' => '/health/sites/all/themes/mediregs/images/4_WKWebBanner_LifeSciences_02.jpg',
  );
  $slides[] = array(
    'link' => '/health/product/publications-data',
    'img_src' => '/health/sites/all/themes/mediregs/images/5_WKWebBanner_PubsData_02.jpg',
  );
  return $slides;
}

/**
 * Helper function to return product/mediregs slides
 * This should really be controlled by the CMS
 */
function _kw_admin_product_mediregs_slides() {
  // TODO: Make these configurable
  $slides = array();
  $slides[] = array(
    'link' => '/health/product/coding-suite',
    'img_src' => '/health/sites/all/themes/mediregs/images/1_WKWebBanner_Coding_02.jpg',
  );
  $slides[] = array(
    'link' => '/health/product/compliance-suite',
    'img_src' => '/health/sites/all/themes/mediregs/images/2_WKWebBanner_Compliance_02.jpg',
  );
  $slides[] = array(
    'link' => '/health/product/life-sciences-suites',
    'img_src' => '/health/sites/all/themes/mediregs/images/4_WKWebBanner_LifeSciences_02.jpg',
  );
  return $slides;
}