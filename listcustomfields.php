<?php

require_once 'listcustomfields.civix.php';
use CRM_Listcustomfields_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function listcustomfields_civicrm_config(&$config) {
  _listcustomfields_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function listcustomfields_civicrm_install() {
  _listcustomfields_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function listcustomfields_civicrm_enable() {
  _listcustomfields_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 */
function listcustomfields_civicrm_navigationMenu(&$menu) {
  _listcustomfields_civix_insert_navigation_menu($menu, 'Administer/Customize Data and Screens', [
    'label' => E::ts('List Custom Field Structure'),
    'name' => 'list_custom_field_structure',
    'url' => 'civicrm/listcustomfields',
    'permission' => 'administer CiviCRM',
    'operator' => 'OR',
    'separator' => 0,
  ]);
  _listcustomfields_civix_navigationMenu($menu);
}
