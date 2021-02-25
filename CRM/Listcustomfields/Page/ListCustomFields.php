<?php
use CRM_Listcustomfields_ExtensionUtil as E;

class CRM_Listcustomfields_Page_ListCustomFields extends CRM_Core_Page {

  public function run() {
    $customFields = [];

    try {
      $cg = civicrm_api3('CustomGroup', 'get', [
        'options' => ['limit' => 0, 'sort' => 'extends ASC, title ASC'],
      ]);

      foreach ($cg['values'] as $group) {
        $fields = [];
        $flds = civicrm_api3('CustomField', 'get', [
          'custom_group_id' => $group['id'],
          'options' => ['limit' => 0, 'sort' => 'label ASC'],
        ]);

        foreach ($flds['values'] as $fld) {
          $fields[$fld['name']] = $fld['id'].': '.$fld['label'];
        }

        $customFields[$group['extends']][$group['title']] = [
          'id' => $group['id'],
          'title' => $group['title'],
          'name' => $group['name'],
          'table' => $group['table_name'],
          'fields' => $fields,
        ];
      }
    }
    catch (CiviCRM_API3_Exception $e) {
      Civi::log()->debug(__FUNCTION__, ['$e' => $e]);
    }

    //Civi::log()->debug(__FUNCTION__, ['customFields' => $customFields]);
    $this->assign('customFields', $customFields);

    parent::run();
  }

}
