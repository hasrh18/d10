<?php

namespace Drupal\employee_registration\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure example settings for this site.
*/
class Add extends ConfigFormBase {

  /** 
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'employee_registration.add.settings';

  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'employee_registration_add_settings';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /** 
   * {@inheritdoc}
   */

   
   public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS)->get('datas');

    $data_row = [];

    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('first_name'),
    ];  

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('last_name'),
    ];  


    if(!empty($config)){
        foreach ($config as $key => $value) {
            $data_row[$key] = [
                'first_name' => $value['first_name'],
                'last_name' => $value['last_name'] 
            ];
        }
    }
    
    $form['employee_data'] = [
            '#type' => 'table',
            '#caption' => $this
              ->t('Employee Data table'),
            '#header' => [
              $this
                ->t('first_name'),
              $this
                ->t('last_name'),
            ],
            '#rows' => $data_row,
            '#empty' => $this
              ->t('No entries available.'),
          ];
    

    return parent::buildForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $config = $this->config(static::SETTINGS)->get('datas');

    // foreach ($config as $key => $value) {
        
    // }
    $data_row = [];
    if(!empty($config)){
        foreach ($config as $key => $value) {
            // dump($value['first_name'],$form_state->getValue('first_name'));
            if($value['first_name'] != $form_state->getValue('first_name') &&  $value['last_name'] != $form_state->getValue('last_name')){
                $data_row[$key] = [
                    'first_name' => $form_state->getValue('first_name'),
                    'last_name' => $form_state->getValue('last_name') 
                ];
            }
            else{
                $data_row[$key] = [
                    'first_name' => $value['first_name'],
                    'last_name' => $value['last_name'] 
                ];
            }
        }
    }
    // else{
        $data_row[] = [
            'first_name' => $form_state->getValue('first_name'),
            'last_name' => $form_state->getValue('last_name')
        ];  
    // }
    // die();
    
     
    
    
    
    
    // Retrieve the configuration.
    $this->config(static::SETTINGS)
      // Set the submitted configuration setting.
      ->set('datas', $data_row)
      ->save();

    parent::submitForm($form, $form_state);
  }

}