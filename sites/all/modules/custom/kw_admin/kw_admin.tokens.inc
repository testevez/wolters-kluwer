<?php

/**
 * Implements hook_token_info().
 */
function kw_admin_token_info() {
  $info['tokens']['site']['current_year'] = array(
    'name' => t('HDMS: Current year'),
    'description' => t('Returns the current year)'),
  );
  $info['tokens']['site']['elqsiteid'] = array(
    'name' => t('elqSiteID'),
    'description' => t('The elqSiteID.'),
  );
  $info['tokens']['site']['phone_js_path'] = array(
    'name' => t('JS path re: phone'),
    'description' => ('Path the the JS for phone number validation'),
  );
  $info['tokens']['site']['page_title'] = array(
    'name' => t('JS path re: phone'),
    'description' => ('Path the the JS for phone number validation'),
  );
  $info['tokens']['site']['page_url'] = array(
    'name' => t('JS path re: phone'),
    'description' => ('Path the the JS for phone number validation'),
  );
  return $info;

}

/**
 * Implements hook_tokens().
 */
function kw_admin_tokens($type, $tokens, array $data = array(), array $options = array()) {
  $replacements = array();
  if ($type == 'site') {
    foreach ($tokens as $name => $original) {
      switch ($name) {
        case 'current_year':
          $timestamp = time();
          $year = date('Y', $timestamp);
          $replacements[$original] = $year;
          break;
        case 'elqsiteid':
          $replacements[$original] = variable_get('kw_admin_elqSiteID', '1654');
          break;
        case 'phone_js_path':
          $replacements[$original] = '/health/'. drupal_get_path('module', 'kw_admin') .'/js/EloquaPhoneNumberValidation.js';
          break;
        case 'page_title':
          $replacements[$original] = drupal_get_title();
          break;
        case 'page_url':
          $replacements[$original] =  'http://'. $_SERVER['HTTP_HOST'] .'/health/'. drupal_get_path_alias();
          break;
      }
    }
  }
  return $replacements;
}
