<?php

/**
 * Custom settings form
 */

function kw_admin_forms_settings($form, $form_state) {
  $form['kw_admin_elqSiteID'] = array(
    '#type' => 'textfield',
    '#title' => t('elqSiteID'),
    '#default_value' => variable_get('kw_admin_elqSiteID', '1654'),
    '#size' => 10,
    '#maxlength' => 10,
    '#required' => TRUE,
    '#description' => t('Updates the elqSiteID value.')
  );
  // complytrack
  $form['complytrack'] = array(
    '#type' => 'fieldset',
    '#title' => t('ComplyTrack (HTML form name: WKmediregs-ct-isam)'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $default_val = variable_get('kw_complytrack_markup', FALSE);
  if (!$default_val) {
    $default_val = array(
      'value' => kw_complytrack_markup_default(),
      'format' => 'un_modified_html',
    );
  }
  $form['complytrack']['kw_complytrack_markup'] = array(
    '#type' => 'text_format',
    '#title' => t('Markup for the ComplyTrack form'),
    '#default_value' => $default_val['value'],
    '#format' => $default_val['format'],
  );
  // WKMediregsCodeComp
  $form['codecomp'] = array(
    '#type' => 'fieldset',
    '#title' => t('Code compliance (HTML form name: WKMediregsCodeComp)'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $default_val = variable_get('kw_codecomp_markup', FALSE);
  if (!$default_val) {
    $default_val = array(
      'value' => kw_codecomp_markup_default(),
      'format' => 'un_modified_html',
    );
  }
  $form['codecomp']['kw_codecomp_markup'] = array(
    '#type' => 'text_format',
    '#title' => t('Markup for the WKMediregsCodeComp form'),
    '#default_value' => $default_val['value'],
    '#format' => $default_val['format'],
  );

  // IntelliConnect /  wkic
  $form['wkic'] = array(
    '#type' => 'fieldset',
    '#title' => t('IntelliConnect (HTML form name: wkic)'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $default_val = variable_get('kw_wkic_markup', FALSE);
  if (!$default_val) {
    $default_val = array(
      'value' => kw_wkic_markup_default(),
      'format' => 'un_modified_html',
    );
  }
  $form['wkic']['kw_wkic_markup'] = array(
    '#type' => 'text_format',
    '#title' => t('Markup for the wkic form'),
    '#default_value' => $default_val['value'],
    '#format' => $default_val['format'],
  );

  // Image Carousel for the product/mediregs page
  $form['mediregs_carousel'] = array(
    '#type' => 'fieldset',
    '#title' => t('Image Carousel for the product/mediregs page'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $default_val = variable_get('kw_mediregs_carousel_markup', FALSE);
  if (!$default_val) {
    $default_val = array(
      'value' => kw_mediregs_carousel_markup_default(),
      'format' => 'un_modified_html',
    );
  }
  $form['mediregs_carousel']['kw_mediregs_carousel_markup'] = array(
    '#type' => 'text_format',
    '#title' => t('Markup for the mediregs_carousel'),
    '#default_value' => $default_val['value'],
    '#format' => $default_val['format'],
  );


  return system_settings_form($form);
}